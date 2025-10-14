<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Payment\StripeController;
use App\Models\Issue;
use App\Models\IssueSequence;
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
                $exists = UserMagazine::where('user_id', $user->id)
                    ->where('magazine_id', $magazine)
                    ->first();

                if($exists){
                    $exists->next_sub = $subscription->id;
                    $exists->save();
                }else{
                    $exists = UserMagazine::create([
                        'user_id' => $user->id,
                        'magazine_id' => $magazine,
                        'user_subscription_id' => $subscription->id,
                        'status' => 'inactive',
                        'sequence_date' => null,
                        'issue_sequence_index' => null,
                    ]);
                }
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
        $subscribe = UserSubscription::where('id',$id)->where('user_id',auth()->user()->id)->first();
        if (! $subscribe->user_id == auth()->user()->id) {
            return back()->with('error', 'Unauthorized subscription access');
        }

        try {
            $stripe = new StripeController();
            $stripe->subscriptionCancel($subscribe->subscription_id);

            $subscribe->status = 'canceled';
            $subscribe->save();
            $subscribe->userMagazine()->issueSequence()->update(['status' => 'archived']);
            $subscribe->userMagazine()->update(['status' => 'inactive']);
            return back()->with('success', 'Your subscription has been canceled');
        } catch (\Throwable $th) {
            $subscribe->status = 'canceled';
            $subscribe->save();
            $subscribe->userMagazine()->issueSequence()->update(['status' => 'archived']);
            $subscribe->userMagazine()->update(['status' => 'inactive']);
            return back()->with('error', $th->getMessage());
        }
    }


    // cancel subscription
    public function adminSubscribeCancel(Request $request, $id)
    {
        $subscribe = UserSubscription::findOrFail($id);

        $stripe = new StripeController();

        try {
            $stripe->subscriptionCancel($subscribe->subscription_id);
            $subscribe->status = 'canceled';
            $subscribe->save();

            $subscribe->userMagazine()->issueSequence()->update(['status' => 'archived']);
            $subscribe->userMagazine()->update(['status' => 'inactive']);
        } catch (\Throwable $th) {
            $subscribe->status = 'canceled';
            $subscribe->save();

            $subscribe->userMagazine()->issueSequence()->update(['status' => 'archived']);
            $subscribe->userMagazine()->update(['status' => 'inactive']);
            return back()->with('error', 'Subscription couldn\'t cancel');
        }

        return back()->with('success', 'Your subscription has been canceled');
    }

    /**
     * Admin subscription cancel
     */
    public function subscribeDelete(Request $request, $id){
        $subscribe = UserSubscription::find($id);
        if($subscribe){
            $subscribe->userMagazine()->delete();
            if($subscribe->status == 'active'){
                $stripe = new StripeController();
                try {
                    $stripe->subscriptionCancel($subscribe->subscription_id);
                } catch (\Throwable $th) {
                    $subscribe->delete();
                    return back()->with('error',$th->getMessage());
                }
            }
        }
        $subscribe->userMagazine()->issueSequence()->delete();
        $subscribe->userMagazine()->delete();
        $subscribe->delete();
        return back()->with('success','Subscription has been deleted');
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

    /**
     * Approved subscription
     */
    public function subscribeApprove(Request $request, $id){
        $subscription = UserSubscription::where('id',$id)->where('status','pending')->first();

        DB::beginTransaction();
        if($subscription){
            $subscription->status = 'active';
            $subscription->save();

            try {
                foreach($subscription->userMagazine as $mag){
                    $issue = Issue::where('magazine_id',$mag->magazine_id)->orderBy('issue_index','asc')->first();


                    $mag->issue_sequence_index = $issue ? $issue->issue_index : null;
                    $mag->sequence_date = now();
                    $mag->status = 'active';

                    $mag->user_subscription_id = !empty($mag->next_sub) ? $mag->next_sub : $mag->user_subscription_id;
                    $mag->save();

                    $issueExists = IssueSequence::where('issue_id',$issue->id)->where('magazine_id',$mag)->where('user_id',$mag->user_id)->first();

                    if(!$issueExists){
                        IssueSequence::create([
                            'user_id' => $subscription->user_id,
                            'magazine_id' => $mag->magazine_id,
                            'issue_id' => $issue ? $issue->id : null,
                            'status' => 'active',
                            'user_magazine_id' => $mag->id,
                        ]);
                    }else{
                        $issueExists->status = 'active';
                        $issueExists->save();
                    }
                }
                DB::commit();
            }catch (\Exception $e) {
                DB::rollBack();
                return back()->with('error', 'Subscription couldn\'t approve');
            }
        }
        return back()->with('success','Subscription approved');
    }
}
