<?php

namespace App\Http\Controllers\App;

use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Stripe\Customer;
use Stripe\Stripe;
use Stripe\StripeClient;

class BillingPaymentMethodController extends Controller
{
    public function __construct()
    {
        // Set Stripe API key
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    }
    public function all()
    {
        $PaymentMethods = PaymentMethod::all();
        return response()->json([
            'status' => true,
            'payment_methods' => $PaymentMethods
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'stripeToken' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $ThisCustomer = User::where('id', Auth::id())->first();

        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));
        $customer = $stripe->customers->create([
            'description' => 'Update Card',
            'email' => $ThisCustomer->email,
            //'payment_method' => 'pm_card_visa',
        ]);

        $defaultPaymentMethod = PaymentMethod::where('user_id', $ThisCustomer->id)->where('is_default', 1)->get();

        if ($defaultPaymentMethod) {
            $defaultPaymentMethod->update([
                'is_default' => 0
            ]);
        }

        try {
            $StripeCustomer = Customer::create([
                'email' => $ThisCustomer->email,
                'source' => $request['stripeToken'],
                'name' => $ThisCustomer->name
            ]);

            if (!empty($StripeCustomer->id)) {
                PaymentMethod::create([
                    'user_id' => $ThisCustomer->id,
                    'payment_method_customer_id' => $StripeCustomer->id,
                    'customer_card_id' => $StripeCustomer->default_source,
                    'payment_method' => 'stripe',
                    'is_default' => 1
                ]);

                return response()->json([
                    'status' => true,
                    'message' => 'Card Create Successfully'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Sorry, unable to create card'
                ]);
            }

        } catch (\Exception $exception) {
            $exception->getMessage();
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function makeDefault(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'method_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        PaymentMethod::where('is_default', 1)->update([
            'is_default' => 0
        ]);

        $PaymentMethod = PaymentMethod::where('id', $request->method_id)->first();

        $PaymentMethod->update([
            'is_default' => 1
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Card make Default successfully'
        ]);
    }

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $PaymentMethod = PaymentMethod::where('id', $request->id)->where('is_default', 1)->first();

        if ($PaymentMethod) {
            return response()->json([
                'status' => false,
                'message' => 'You are using this card default. Please remove from default'
            ]);
        }

        PaymentMethod::where('id', $request->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Card delete successfully'
        ]);

    }

    public function calculateOrderAmount($items)
    {
        // Replace this constant with a calculation of the order's amount
        // Calculate the order total on the server to prevent
        // people from directly manipulating the amount on the client
        return 1400;
    }

    public function createPaymentIntent(Request $request)
    {
        $items = $request->input('items');

        try {
            // Create a PaymentIntent with the order amount and currency
            $paymentIntent = PaymentIntent::create([
                'amount' => $this->calculateOrderAmount($items),
                'currency' => 'usd',
                'payment_method_types' => ['cashapp'],
            ]);

            return response()->json([
                'clientSecret' => $paymentIntent->client_secret,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
