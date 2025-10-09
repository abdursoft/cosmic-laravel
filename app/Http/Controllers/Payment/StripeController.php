<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Mail\SubscriptionCancel;
use App\Mail\SubscriptionMail;
use App\Models\UserGif;
use App\Models\UserMagazine;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function productSubscription($customer_id, $price_id)
    {
        return $this->pay->subscriptions->create([
            'customer'         => $customer_id,
            'items'            => [['price' => $price_id]],
            'payment_behavior' => 'default_incomplete',
            'payment_settings' => ['save_default_payment_method' => 'on_subscription'],
            'expand'           => ['latest_invoice.payment_intent'],
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
     * subscription event update and confirmation
     */
    public function subscriptionEvent($subscription_id, $status, $mag_status)
    {
        $subscription = UserSubscription::where('subscription_id', $subscription_id)->update([
            'status' => $status,
        ]);



        if($subscription->tier && $status == 'active'){

            UserMagazine::where('user_id', $subscription->user_id)->where('subscription_id',$subscription->id)->delete();

            $subscription->tier->status = $status;
            $subscription->tier->save();

            if($subscription->subscription_id != $subscription->tier->sub_id){
                $this->subscriptionCancel($subscription->subscription_id);
            }

            $subscription->subscription_id = $subscription->tier->sub_id;
            $subscription->package_id = $subscription->tier->package_id;
            $subscription->save();

            $magazines = explode(',',$subscription->tier->magazines);

            foreach($magazines as $mag){
                UserMagazine::create([
                    'user_subscription_id' => $subscription->id,
                    'magazine_id' => $mag,
                    'user_id' => $subscription->user_id,
                    'status' => 'active',
                ]);
            }
        }

        UserMagazine::where('user_subscription_id', $subscription_id)->update([
            'status' => $mag_status,
        ]);



        if($status == 'updated' || $status == 'resumed'){
            Mail::to($subscription->user->email)->send(new SubscriptionMail($subscription));
        }else{
            Mail::to($subscription->user->email)->send(new SubscriptionCancel($subscription));
        }
    }

    public function subscriptionEvents(Request $request)
    {
        $endpoint_secret = env('STRIPE_END_POINT');

        $payload    = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event      = null;

        $event = \Stripe\Webhook::constructEvent(
            $payload,
            $sig_header,
            $endpoint_secret
        );

        switch ($event->type) {
            case 'customer.subscription.created':
                $subscription = $event->data->object;
            case 'customer.subscription.deleted':
                $subscription = $event->data->object;
                $this->subscriptionEvent($subscription->id, 'cancelled', 'inactive');
            case 'customer.subscription.paused':
                $subscription = $event->data->object;
                $this->subscriptionEvent($subscription->id, 'paused', 'inactive');
            case 'customer.subscription.resumed':
                $subscription = $event->data->object;
                $this->subscriptionEvent($subscription->id, 'active', 'active');
            case 'customer.subscription.updated':
                $subscription = $event->data->object;
                $this->subscriptionEvent($subscription->id, 'active', 'active');
            default:
                true;
        }
        http_response_code(200);
    }
}
