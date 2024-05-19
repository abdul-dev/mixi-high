<?php

namespace App\Http\Controllers\App;

use App\Models\BankAccount;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductDetail;
use App\Models\UserDeliveryAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $total_amount = 0;

        // Retrieve the default user delivery address
        $userDeliveryAddress = UserDeliveryAddress::where('user_id', Auth::id())
            ->where('is_default', 1)
            ->first();

        // Check if the default user delivery address is found
        if (!$userDeliveryAddress) {
            return response()->json([
                'status' => false,
                'message' => 'Default user delivery address not found'
            ]);
        }

        // Begin the database transaction
        DB::beginTransaction();

        try {
            // Create the order
            $order = Order::create([
                'user_id' => Auth::id(),
                'user_delivery_address_id' => $userDeliveryAddress->id
            ]);

            // Calculate the total amount and create order details
            foreach ($request->order_details as $detail) {
                $price = ProductDetail::find($detail['variant_id'])->unit_price ?? 0;
                $total = $detail['qty'] * $price;
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $detail['product_id'],
                    'product_detail_id' => $detail['variant_id'],
                    'qty' => $detail['qty'],
                    'total_amount' => $total,
                ]);
                $total_amount += $total;
            }

            // Update the order total and sub_total
            $order->update([
                'total' => $total_amount,
                'sub_total' => $total_amount,
            ]);

            // Charge the ACH payment
            $paymentSuccess = $this->chargeAchPayment($total_amount, $request);

            if ($paymentSuccess['status'] == false) {
                throw new \Exception($paymentSuccess['message']);
            }

            // Commit the transaction
            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Order placed successfully'
            ]);

        } catch (\Exception $e) {
            // Rollback the transaction on failure
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function chargeAchPayment($total_amount, $request)
    {

        try {
            // Set your secret key. Remember to switch to your live secret key in production.
            // See your keys here: https://dashboard.stripe.com/apikeys

            $bankAccount = BankAccount::where('user_id', Auth::id())->first();

            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

            $stripe_customer = $stripe->customers->create(['email' => Auth::user()->email]);
            $stripe->checkout->sessions->create([
                'mode' => 'payment',
                'customer' => $stripe_customer->id,
                'payment_method_types' => ['card', 'us_bank_account'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'unit_amount' => $total_amount,
                            'product_data' => ['name' => 'Product'],
                        ],
                        'quantity' => 1,
                    ],
                ],
                'success_url' => 'https://example.com/success',
                'cancel_url' => 'https://example.com/cancel',
            ]);

            // Update bank account log on success
            $bankAccount->update([
                'stripe_log' => 'success'
            ]);

            return [
                'status' => true,
                'message' => 'Success'
            ];
        } catch (\Exception $e) {
            $bankAccount->update([
                'stripe_log' => $e->getMessage()
            ]);

            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getMyOrders()
    {
        return response()->json([
            'status' => true,
            'data' => Order::with('order_details', 'order_details.product')->where('user_id', Auth::id())->get()
        ]);
    }
}
