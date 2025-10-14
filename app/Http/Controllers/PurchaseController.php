<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Payment\StripeController;
use App\Models\Package;
use App\Models\ShoppingCart;
use App\Models\UserMagazine;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class PurchaseController extends Controller
{

    /**
     * Show the cart list
     */
    public function cartView(Request $request)
    {

        $carts = $this->carts($request);
        $total=0;
        $packages = [];

        return view('cart',compact('carts','total','packages'));
    }

    /**
     * user purchase system
     */
    public function purchase(Request $request){
        $carts = $this->carts($request);
        $user    = auth()->user();
        $stripe  = new StripeController();

        if (empty($user->customer_id)) {
            $customer = $stripe->customerCreate($user->name, $user->email);
            if ($customer) {
                $user->customer_id = $customer['id'] ?? $customer->id;
                $user->save();
            }
        }

        try {
            DB::beginTransaction();
            foreach($carts as $key => $magazines){
                $package = Package::find($key);

                $subscribe = $stripe->productSubscription($user->customer_id, $package->price_id);

                $subscription = UserSubscription::create([
                    'user_id'         => $user->id,
                    'package_id'      => $package->id,
                    'status'          => 'pending',
                    'price'           => $package->price,
                    'subscription_id' => $subscribe->id,
                ]);

                foreach($magazines as $magazine){
                    UserMagazine::create([
                        'user_id' => $user->id,
                        'magazine_id' => $magazine,
                        'user_subscription_id' => $subscription->id,
                        'status' => 'inactive'
                    ]);
                }

                ShoppingCart::where(function ($query) use ($request) {
                    if ($request->user()) {
                        $query->where('user_id', $request->user()->id);
                    }
                    $query->orWhere('session_id', $request->cookie('purchase_session'));
                })->where('package_id',$key)->delete();
            }
            DB::commit();
            return redirect()->away($subscribe->latest_invoice->hosted_invoice_url);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
            return back()->with('error','Couldn\'t process your purchase');
        }
    }

    /**
     * Shopping cart functionalities
     */
    public function shoppingCart(Request $request)
    {
        $package = Package::find($request->package);

        ShoppingCart::where(function ($query) use ($request) {
            if ($request->user()) {
                $query->where('user_id', $request->user()->id);
            }
            $query->orWhere('session_id', $request->cookie('purchase_session'));
        })->where('package_id','!=',$request->package)->delete();

        $exists = ShoppingCart::where(function ($query) use ($request) {
            if ($request->user()) {
                $query->where('user_id', $request->user()->id);
            }
            $query->orWhere('session_id', $request->cookie('purchase_session'));
        })->where('magazine_id',$request->magazine_id)->where('package_id', $request->package)->count();


        // check if magazine exists
        if ( $exists) {
            return response()->json([
                'code' => 'ALREADY_EXISTS',
                'message' => 'Magazine already exists in your cart'
            ], 200);
        }

        // Fetch user or session-based cart
        $magazine = ShoppingCart::where(function ($query) use ($request) {
            if ($request->user()) {
                $query->where('user_id', $request->user()->id);
            }
            $query->orWhere('session_id', $request->cookie('purchase_session'));
        })->where('package_id',$request->package)->get();

        // Check allowed magazine count
        if ($magazine->count() >= $package->allowed_magazine) {
             return response()->json([
                'code' => 'MAGAZINE_OVER',
                'message' => "You couldn't add more than {$package->allowed_magazine} magazines",
            ], 422);
        }

        try {
            ShoppingCart::create([
                'session_id' => $request->cookie('purchase_session'),
                'user_id' => optional($request->user())->id,
                'magazine_id' => $request->magazine_id,
                'package_id' => $package->id
            ]);

            return response()->json([
                'code' => 'CART_ADDED',
                'message' => 'Magazine successfully added in your cart'
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'code' => 'INTERNAL_ERROR',
                'message' => 'Magazine couldn\'t added into your cart',
                'error' => $th->getMessage()
            ], 422);
        }
    }

    /**
     * Magazine remove from cart
     */
    public function removeCart(Request $request){
        try {
            ShoppingCart::where(function ($query) use ($request) {
                if ($request->user()) {
                    $query->where('user_id', $request->user()->id);
                }
                $query->orWhere('session_id', $request->cookie('purchase_session'));
            })->where('magazine_id',$request->magazine)->where('package_id', $request->package)->delete();

            return response()->json([
                'code' => 'CART_REMOVED',
                'message' => 'Magazine successfully remove from your cart'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 'INTERNAL_ERROR',
                'message' => 'Magazine couldn\'t remove from your cart'
            ], 500);
        }
    }


    /**
     * Package remove from cart
     */
    public function removePackage(Request $request){
       try {
            ShoppingCart::where(function ($query) use ($request) {
                if ($request->user()) {
                    $query->where('user_id', $request->user()->id);
                }
                $query->orWhere('session_id', $request->cookie('purchase_session'));
            })->where('package_id', $request->package)->delete();

            return response()->json([
                'code' => 'PACKAGE_REMOVED',
                'message' => 'Package successfully remove from your cart'
            ], 200);
       } catch (\Throwable $th) {
            return response()->json([
                'code' => 'INTERNAL_ERROR',
                'message' => 'Package couldn\'t remove from your cart'
            ], 500);
       }
    }

    /**
     * Get shopping carts
     */
    public function carts(Request $request){
        $cookie = $request->cookie('purchase_session');
        $userId = optional($request->user())->id;

        $carts = ShoppingCart::where(function ($query) use ($userId, $cookie) {
                if ($userId) {
                    $query->where('user_id', $userId);
                }

                if ($cookie) {
                    if ($userId) {
                        $query->orWhere('session_id', $cookie);
                    } else {
                        $query->where('session_id', $cookie);
                    }
                }
            })
            ->select('package_id', 'magazine_id')
            ->get()
            ->groupBy('package_id')
            ->map(function ($items) {
                return $items->pluck('magazine_id')->unique()->values();
            });
        return $carts;
    }

}
