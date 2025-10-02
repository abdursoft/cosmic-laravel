<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Payment\StripeController;
use App\Models\Package;
use App\Models\UserMagazine;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserSubscriptionController extends Controller
{
    /**
     * Display a listing of user subscriptions.
     */
    public function index()
    {
        $subscriptions = UserSubscription::with(['user', 'package'])->latest()->paginate(10);
        return response()->json($subscriptions);
    }

    /**
     * Store a new user subscription.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'status'     => 'in:active,pending,expired,canceled,pause,suspended',
            'expire_at'  => 'nullable|date',
        ]);

        $validated['user_id'] = auth()->user()->id();
        $subscription         = UserSubscription::create($validated);

        return response()->json([
            'message' => 'Subscription created successfully',
            'data'    => $subscription,
        ], 201);
    }

    /**
     * Show a specific subscription.
     */
    public function show(UserSubscription $userSubscription)
    {
        return response()->json($userSubscription->load(['user', 'package']));
    }

    /**
     * Update a subscription.
     */
    public function update(Request $request, UserSubscription $userSubscription)
    {
        $validated = $request->validate([
            'status'    => 'in:active,pending,expired,canceled',
            'expire_at' => 'nullable|date',
        ]);

        $userSubscription->update($validated);

        return response()->json([
            'message' => 'Subscription updated successfully',
            'data'    => $userSubscription,
        ]);
    }

    /**
     * Delete a subscription.
     */
    public function destroy(UserSubscription $userSubscription)
    {
        $userSubscription->delete();

        return response()->json([
            'message' => 'Subscription deleted successfully',
        ]);
    }

    // make subscription request
    public function subscribe(Request $request)
    {
        $stripe  = new StripeController();
        $package = Package::find($request->package);
        $user    = auth()->user();

        $magazine = count($request->magazine);

        if($magazine > $package->allowed_magazine){
            return back()->with('error', "You can't select more than {$package->allowed_magazine} magazines");
        }

        if (empty($user->customer_id)) {
            $customer = $stripe->customerCreate($user->name, $user->email);
            if ($customer) {
                $user->customer_id = $customer['id'] ?? $customer->id;
                $user->save();
            }
        }

        if (empty($package->price_id)) {
            return back()->with('error', 'Subscription couldn\'t proceed');
        }

        try {
            $subscribe = $stripe->productSubscription($user->customer_id, $package->price_id);

            DB::beginTransaction();
            $subscription = UserSubscription::create([
                'user_id'         => $user->id,
                'package_id'      => $package->id,
                'status'          => 'pending',
                'price'           => $package->price,
                'subscription_id' => $subscribe->id,
            ]);

            foreach($request->magazine as $magazine){
                UserMagazine::create([
                    'user_id' => $user->id,
                    'magazine_id' => $magazine,
                    'user_subscription_id' => $subscription->id,
                    'status' => 'inactive'
                ]);
            }

            DB::commit();

            return redirect()->away($subscribe->latest_invoice->hosted_invoice_url);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', "Subscription system couldn't proceed!");
        }
    }

    // cancel subscription
    public function subscribeCancel(Request $request, $id)
    {
        $subscribe = UserSubscription::findOrFail($id);
        if (! $subscribe->user_id == auth()->user()->id) {
            return back()->with('error', 'Unauthorized subscription access');
        }

        $stripe = new StripeController();

        $cancel = $stripe->subscriptionCancel($subscribe->subscription_id);
        if (! $cancel) {
            return back()->with('error', 'Subscription couldn\'t cancel, Please contact with admin');
        }

        $subscribe->status = 'canceled';
        $subscribe->save();
        return back()->with('success', 'Your subscription has been canceled');
    }

    // resume subscribe
    public function resumeSubscribe(Request $request, $id)
    {
        $subscribe = UserSubscription::findOrFail($id);
        if (! $subscribe->user_id == auth()->user()->id) {
            return back()->with('error', 'Unauthorized subscription access');
        }

        $stripe = new StripeController();

        try {
            $cancel = $stripe->subscriptionResume($subscribe->subscription_id);
            if (! $cancel) {
                return back()->with('error', 'Subscription couldn\'t resume, Please contact with admin');
            }

            $subscribe->status = 'active';
            $subscribe->save();
            return back()->with('success', 'Your subscription has been resumed');
        } catch (\Throwable $th) {
            return back()->with('error', 'Subscription couldn\'t resume, Please contact with admin');
        }
    }


    // download subscription packages and issues
    public function resumeDownload($id){
        $subscribe = UserSubscription::findOrFail($id);

        if($subscribe->status !== 'active'){
            return back()->with('error','You don\'t have permission to access this page');
        }
    }

    // user subscription page
    public function userSubscriptions(){
        $subscriptions = UserSubscription::with('package')->where('user_id',auth()->user()->id)->latest()->get();
        return view('auth.users.subscription',compact('subscriptions'));
    }
}
