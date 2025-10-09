<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Payment\StripeController;
use App\Models\Package;
use App\Models\SubscriptionTier;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubscriptionTierController extends Controller
{
    /**
     * Display a listing of the subscription tiers.
     */
    public function index(Request $request)
    {
        $tiers = SubscriptionTier::where('user_id',$request->user()->id)->get();
        return view('auth.users.tiers', compact('tiers'));
    }

    /**
     * Open tier details with view
     */
    public function showTier(Request $request,$id){
        $subscription = UserSubscription::find($id);
        if(!$subscription || $subscription->user_id != $request->user()->id){
            return back()->with('error','Subscription not accessible');
        }
        $package = $subscription->package;
        return view('auth.users.change-tier',compact('package','subscription'));
    }

    /**
     * Cancel subscription tier
     */
    public function cancelTier(Request $request, $id){
        $tier = SubscriptionTier::find($id);
        if($tier){

            if($tier->status == 'active'){
                $stripe = new StripeController();
                $stripe->subscriptionCancel($tier->sub_id);
            }

            $tier->status = 'canceled';
            $tier->payment_url = '';
            $tier->save();
        }
        return back()->with('success','Tier has been changed');
    }

    /**
     * Show subscription magazines
     */
    public function magazineList(Request $request){
        $package = Package::find($request->package);
        $subscription = UserSubscription::where('package_id',$request->package)->where('user_id',$request->user()->id)->first();

        if(!$package){
            return "<div class='w-full h-full absolute flex items-center justify-center'><h2 class='text-xl md:text-2xl text-gray-600'>Package not found!</h2></div>";
        }

        $active = false;

        $html = "<h2 class='text-base md:text-xl text-red-500 mb-4'>You can select only {$package->allowed_magazine} magazines for $$package->price</h2>";

        $html .= '<div class="mt-5 w-full flex-col md:flex-row justify-start flex-wrap mb-8 h-auto magazine" style="display: flex;" id="activeMagazine">';

            foreach(magazines() as $key=>$magazine){
                if($subscription){
                    $active = purchasedMagazine($magazine->id,$subscription->userMagazine);
                }
                if($magazine->publish()){
                    $html .='<div class="flex flex-col p-2 w-full md:w-1/2 lg:w-1/3">
                        <div class="w-full h-full rounded-lg overflow-hidden shadow-2xl flex flex-col"><img class="h-[260px]" src="'.Storage::url($magazine->thumbnail).'" alt="'.$magazine->title.'" loading="lazy">
                            <label for="lb_check_'.$magazine->title.'" class="flex items-center justify-center bg-orange-700 p-2 gap-3">
                                <input type="checkbox"
                                value="'.$magazine->id.'" class="check_magazine" name="magazine[]" id="lb_check_'.$magazine->title.'" '.($active == true ? 'checked' : ''). ' />

                                <p class="text-white">Select</p>
                            </label>
                        </div>
                    </div>';
                }
            }
        $html .= '</div>';

        return $html;
    }

    /**
     * Process submitted tier
     */
    public function processTier(Request $request){
        $subscription = UserSubscription::find($request->subscription);
        if(!$subscription){
            return response()->json([
                'code' => 'INVALID_SUBSCRIPTION_ID',
                'message' => 'Subscription ID not found'
            ],422);
        }

        try {
            $package = Package::find($request->package);
            $magazine = '';
            foreach($request->magazines as $key=>$mag){
                if($key == 0){
                    $magazine .= $mag;
                }else{
                    $magazine .= ','.$mag;
                }
            }

            if($package->allowed_magazine < count($request->magazines)){
                return response()->json([
                    'code' => 'TO_MUCH_MAGAZINE',
                    'message' => "You can't select more than {$package->allowed_magazine} magazines"
                ],422);
            }

            $stripe = new StripeController();
            $subscribe = $stripe->productSubscription($request->user()->customer_id,$package->price_id);

            $uri = $subscribe->latest_invoice->hosted_invoice_url ?? '';

            SubscriptionTier::create([
                'sub_id' => $subscribe->id,
                'user_id' => $request->user()->id,
                'package_id' => $package->id,
                'subscription_id' => $subscription->id,
                'status' => 'pending',
                'payment_url' => $uri,
                'magazines' => $magazine,
            ]);

            return response()->json([
                'code' => 'TIER_CREATED',
                'message' => 'Subscription tier has been created',
                'payment_url' => $uri
            ],201);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 'TIER_ERROR',
                'message' => 'Subscription tier couldn\'t create',
                'error' => $th->getMessage()
            ],500);
        }
    }

    /**
     * Store a newly created subscription tier.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'subscription_id' => 'required|exists:user_subscriptions,id',
            'status' => 'required|in:pending,active,canceled',
            'payment_url' => 'nullable|string',
            'magazines' => 'required|string',
        ]);

        $tier = SubscriptionTier::create($request->all());
        return response()->json(['message' => 'Subscription Tier created successfully', 'data' => $tier], 201);
    }

    /**
     * Display a specific subscription tier.
     */
    public function show($id)
    {
        $tier = SubscriptionTier::with(['user', 'subscription'])->findOrFail($id);
        return response()->json($tier);
    }

    /**
     * Update a specific subscription tier.
     */
    public function update(Request $request, $id)
    {
        $tier = SubscriptionTier::findOrFail($id);

        $request->validate([
            'status' => 'sometimes|in:pending,active,canceled',
            'payment_url' => 'nullable|string',
            'magazines' => 'sometimes|string',
        ]);

        $tier->update($request->all());
        return response()->json(['message' => 'Subscription Tier updated successfully', 'data' => $tier]);
    }

    /**
     * Remove a specific subscription tier.
     */
    public function destroy($id)
    {
        $tier = SubscriptionTier::findOrFail($id);
        $tier->delete();

        return response()->json(['message' => 'Subscription Tier deleted successfully']);
    }
}
