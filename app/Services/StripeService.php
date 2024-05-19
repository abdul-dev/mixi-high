<?php

namespace App\Services;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\StripeClient;
use Stripe\Subscription;

class StripeService
{

    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    }

    public function subscribe(array $request)
    {

        $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));
        $customer = $stripe->customers->create([
            'description' => 'example customer',
            'email' => $request['email'],
            'payment_method' => 'pm_card_visa',
        ]);

        $subscription = Subscription::create([
            'customer' => $customer->id,
            'items' => [[
                'price' => "price_1MH33PGVGuevCqEywssuYZrY",
            ]],
            'payment_behavior' => 'default_incomplete',
            'expand' => ['latest_invoice.payment_intent'],
        ]);

        return $subscription;
    }

    public function webhook(Request $request)
    {
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;
        $payload = $request->all();
        try {
            $event = \Stripe\Webhook::constructEvent(
                json_encode($payload), $sig_header, $endpoint_secret
            );
            $myfile = fopen(public_path(date('YmdHis') . ".txt"), "w") or die("Unable to open file!");
            $txt = json_encode($event);
            fwrite($myfile, $txt);
            fclose($myfile);
            // die();
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }


        // Handle the event
        switch ($event->type) {
            case 'payment_intent.succeeded':
                $paymentIntent = $event->data->object;
            // ... handle other event types
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        http_response_code(200);
    }

    public function retrieve_card($stripe_customer_id)
    {
        if ($stripe_customer_id) {
            $customer = $this->retrieve_customer($stripe_customer_id);
            if ($customer) {
                $default_source = $customer->default_source;
                if ($default_source) {
                    $card = $customer->retrieveSource($stripe_customer_id, $default_source);
                    return $card;
                }
            }
        }
        return false;
    }

    private function retrieve_customer($stripe_customer_id)
    {
        try {
            if (empty($stripe_customer_id))
                throw new \Exception("Stripe Customer ID is missing.");
            return \Stripe\Customer::retrieve($stripe_customer_id);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function update_card($stripe_customer_id, $source_card)
    {

        try {
            if (empty($stripe_customer_id))
                throw new \Exception("Stripe Customer ID is missing.");
            // Get the customer
            $customer = \Stripe\Customer::retrieve($stripe_customer_id);

            // Add a new card to the customer
//            $card = $customer->sources->create(['source' => $source_card]);

            $card = \Stripe\Customer::createSource(
                $stripe_customer_id,
                ['source' => $source_card]
            );

            // Set the new card as the customers default card
            $customer->default_source = $card->id;
            $customer->save();

            return [
                'status' => true,
                'message' => 'Card update successful'
            ];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
