<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $this->data['orders'] = Order::with(['user', 'user_delivery_address'])->latest()->get();
        return view('orders.list', $this->data);
    }
}
