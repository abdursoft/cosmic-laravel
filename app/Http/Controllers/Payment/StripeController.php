<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Mail\SubscriptionCancel;
use App\Mail\SubscriptionMail;
use App\Models\Issue;
use App\Models\IssueSequence;
use App\Models\SubscriptionTier;
use App\Models\UserGif;
use App\Models\UserMagazine;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Stripe\Exception\SignatureVerificationException;

class StripeController extends Controller
{
    private $pay;
    private $stripe;

    public function __construct()
    {
        $this->pay    = new \Stripe\StripeClient(env("STRIPE_API_KEY"));
        $this->stripe = \Stripe\Stripe::setApiKey(env('STRIPE_API_KEY'));
    }

    public function customerCreate($name, $email)
    {
        $customer = $this->pay->customers->create([
            'name'  => $name,
            'email' => $email,
        ]);
        return $customer;
    }

    public function customerList()
    {
        return $this->pay->customers->all(['limit' => 3]);
    }

    public function customerRetrieve($customer)
    {
        return $this->pay->customers->retrieve($customer, []);
    }

    public function customerDelete($customer)
    {
        return $this->pay->customers->delete($customer, []);
    }

    public function productCreate($title, $description, $price)
    {
        $product = $this->pay->products->create([
            'name'        => "$title $price",
            'description' => $description,
        ]);
        return $product;
    }

    public function productPrice(string $id, int | float $price, string $currency, $interval = 'year')
    {
        $setPrice = $this->pay->prices->create(
            [
                'product'     => $id,
                'unit_amount' => $price * 100,
                'currency'    => $currency,
                'recurring'   => ['interval' => $interval],
            ]
        );
        return $setPrice;
    }

    public function productRetrievePrice(string $id)
    {
        return $this->pay->prices->retrieve($id, []);
    }

    public function productRetrieve(string $id)
    {
        $retrieve = $this->pay->products->retrieve(
            $id,
            []
        );
        return $retrieve;
    }

    public function productDelete($product)
    {
        $this->pay->products->delete($product, []);
    }

    public function productSubscription($customer_id, $price_id,$coupon=null)
    {
        return $this->pay->subscriptions->create([
            'customer'         => $customer_id,
            'items'            => [['price' => $price_id]],
            'payment_behavior' => 'default_incomplete',
            'payment_settings' => ['save_default_payment_method' => 'on_subscription'],
            'expand'           => ['latest_invoice.payment_intent'],
            'discounts'        => $coupon ? [['coupon' => $coupon]] : []
        ]);
    }

    public function subscriptionCreate(string $customer_id, string | array $items, array $data)
    {
        return $this->pay->subscriptions->create([
            'customer'         => $customer_id,
            'items'            => [$items],
            'payment_behavior' => 'default_incomplete',
            'payment_settings' => ['save_default_payment_method' => 'on_subscription'],
            'expand'           => ['latest_invoice.payment_intent'],
        ]);
    }

    public function subscriptionCancel(string $subscription_id)
    {
        return $this->pay->subscriptions->cancel($subscription_id, []);
    }

    public function subscriptionResume(string $subscription_id)
    {
        return $this->pay->subscriptions->resume(
            $subscription_id,
            ['billing_cycle_anchor' => 'now']
        );
    }

    public function payment(string $email, int | float $amount, string $currency, string $name, array $data, $trans_id)
    {
        $checkout_session = $this->pay->checkout->sessions->create([
            'success_url'                => route('payment.stripe.callback', $trans_id),
            'cancel_url'                 => route('payment.stripe.callback', $trans_id),
            'customer_email'             => $email,
            'submit_type'                => 'pay',
            'payment_method_types'       => ['card'],
            'line_items'                 => [[
                'price_data' => [
                    'currency'     => $currency,
                    'unit_amount'  => $amount * 100,
                    'product_data' => [
                        'name'   => $name,
                        'images' => ['https://i.imgur.com/EHyR2nP.png'],
                    ],
                ],
                'quantity'   => 1,
            ]],
            'metadata'                   => $data,
            'mode'                       => 'payment',
            'billing_address_collection' => 'required',
        ]);
        return $checkout_session;
    }

    public function paymentRetrieve(string $paymentID)
    {
        return $this->pay->checkout->sessions->retrieve(
            $paymentID,
            []
        );
    }

    public function paymentRetrieveAll(int $limit)
    {
        return $this->pay->checkout->sessions->all(['limit' => $limit]);
    }

    public function refund(string $charge_id)
    {
        return $this->pay->refunds->create(['charge' => $charge_id]);
    }

    public function refundUpdate(string $refund_id, array $data)
    {
        return $this->pay->refunds->update(
            $refund_id,
            ['metadata' => $data]
        );
    }

    public function refundRetrieve(string $id)
    {
        return $this->pay->refunds->retrieve($id, []);
    }

    public function refundRetrieveAll(int $limit)
    {
        return $this->pay->refunds->all(['limit' => $limit]);
    }

    public function refundCancel(string $id)
    {
        return $this->pay->refunds->cancel($id, []);
    }

    public function createPayout(int | float $amount, string $id, string $currency)
    {
        $payout = $this->pay->transfers->create([
            'amount'         => $amount * 100,
            'currency'       => $currency,
            'destination'    => $id,
            'transfer_group' => 'payout_from_' . env('SITE_NAME'),
        ]);
        return $payout;
    }

    public function callback($trans_id)
    {
        $payment = UserGif::where('payment_id', $trans_id)->orderBy('id', 'desc')->first();
        if ($payment) {
            $stripe = $this->paymentRetrieve($payment->txn_id);
            if ($stripe->payment_status === 'paid' || $stripe->payment_status === 'completed') {
                try {
                    $payment->update([
                        'status' => 'active',
                    ]);
                    return redirect()->route('service')->with("success", "Payment has been completed");
                } catch (\Throwable $th) {
                    return redirect()->route('service')->with("error", "Payment couldn't completed");
                }
            } else {
                return redirect()->route('service')->with("error", "Payment has been failed");
            }
        } else {
            return redirect()->route('service')->with("error", "Invalid payment ID");
        }
    }

    /**
     * Create a coupon for subscription or product
     */
    public function coupon($amount,$type='flat',$currency='USD',$cycle='once'){
        $charge = $type === 'flat' ? 'amount_off' : 'percent_off';
        return $this->pay->coupons->create([
            'duration' => $cycle,
            'currency' => $currency,
            $charge => $amount,
        ]);
    }

    /**
     * Subscription tier upgrade application
     */
    private function applyTierUpgrade($subscription,$status)
    {
        // deactivate previous tiers
        $subscription->tier()->where('status','active')->update(['status'=>'inactive']);
        $tier = $subscription->tier()->latest()->first(); // <-- Use () for relationship

        if (!$tier) {
            return;
        }

        $tier->update(['status' => $status]);

        if ($subscription->subscription_id !== $tier->sub_id) {
            $this->subscriptionCancel($subscription->subscription_id);
        }

        $subscription->update([
            'subscription_id' => $tier->sub_id,
            'package_id'      => $tier->package_id,
            'status'          => $status,
        ]);

        $this->assignMagazines($subscription, explode(',', $tier->magazines),$status);
    }


    /**
     * Update magazine statuses based on subscription events
     */
    private function assignMagazines($subscription, $magazines,$status)
    {
        // Deactivate magazines not in the new list
        $subscription->userMagazine()->whereNotIn('magazine_id', $magazines)->update(['status' => 'inactive']);

        foreach ($magazines as $mag) {
            $issue = Issue::where('magazine_id', $mag)->orderBy('issue_index', 'asc')->first();

            $uMagazine = UserMagazine::updateOrCreate(
                [
                    'user_subscription_id' => $subscription->id,
                    'magazine_id' => $mag,
                    'status' => $status,
                    'user_id' => $subscription->user_id,
                ],
                [
                    'status' => $status,
                    'issue_sequence_index' => $issue->issue_index ?? 0,
                    'sequence_date' => now(),
                ]
            );

            IssueSequence::updateOrCreate(
                [
                    'user_magazine_id' => $uMagazine->id,
                    'magazine_id' => $mag,
                    'status' => $status,
                    'user_id' => $subscription->user_id,
                ],
                [
                    'issue_id' => $issue->id ?? null,
                    'status' => $status,
                ]
            );
        }
    }


    /**
     * Subscription magazine status update
     */
    private function updateMagazineStatuses($subscription_id, $mag_status)
    {
        UserMagazine::where('user_subscription_id', $subscription_id)->get()->each(function ($magazine) use ($mag_status) {

            $magazine->status = $mag_status;
            $magazine->sequence_date = now();
            $magazine->save();

            $issue = Issue::where('magazine_id', $magazine->magazine_id)->orderBy('issue_index', 'asc')->first();

            IssueSequence::updateOrCreate(
                [
                    'user_magazine_id' => $magazine->id,
                    'magazine_id' => $magazine->magazine_id,
                    'user_id' => $magazine->user_id,
                ],
                [
                    'issue_id' => $issue->id ?? null,
                    'status' => $mag_status // previously hardcoded active
                ]
            );
        });
    }


    /**
     * subscription event update and confirmation
     */
    public function subscriptionEvent($subscription_id, $status, $mag_status)
    {
        $subscription = UserSubscription::where('subscription_id', $subscription_id)->first();

        if (empty($subscription)) {
            $subscription = SubscriptionTier::where('sub_id', $subscription_id)->latest()->first()?->subscription;
        }

        DB::beginTransaction();
        try {

            $subscription->status = $status;
            $subscription->save();

            if (!empty($subscription->tier) && $status === 'active') {
                $this->applyTierUpgrade($subscription,$mag_status);
            } else {
                $this->updateMagazineStatuses($subscription_id, $mag_status);
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            return;
        }

        // Mail sending logic (when ready)
        if (in_array($status, ['updated', 'resumed'])) {
            Mail::to($subscription->user->email)->send(new SubscriptionMail($subscription));
        } else {
            Mail::to($subscription->user->email)->send(new SubscriptionCancel($subscription));
        }
    }

    public function subscriptionEvents(Request $request)
    {

        if($request->query('sub_id')){
            $id = $request->query('sub_id');
            if($id){
                $this->subscriptionEvent($id, 'pending', 'inactive');
            }
            return response()->json(['status' => 'success'], 200);
        }

        $endpoint_secret = env('STRIPE_END_POINT');

        $payload    = $request->getContent();
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event      = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );

            switch ($event->type) {
                case 'customer.subscription.created':
                    $subscription = $event->data->object;
                    break;
                case 'customer.subscription.deleted':
                    $subscription = $event->data->object;
                    $this->subscriptionEvent($subscription->id, 'canceled', 'inactive');
                    break;
                case 'customer.subscription.paused':
                    $subscription = $event->data->object;
                    $this->subscriptionEvent($subscription->id, 'paused', 'inactive');
                    break;
                case 'customer.subscription.resumed':
                    $subscription = $event->data->object;
                    $this->subscriptionEvent($subscription->id, 'active', 'active');
                    break;
                case 'customer.subscription.updated':
                    $subscription = $event->data->object;
                    $this->subscriptionEvent($subscription->id, 'active', 'active');
                    break;
                default:
                    break;
            }
        } catch (SignatureVerificationException $e) {
            return response('Signature verification failed', 400);
        }
        http_response_code(200);
    }
}
