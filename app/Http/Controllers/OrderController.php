<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Auth;

class OrderController extends Controller
{
    public function customerIndex()
    {
        $orders = Order::orderByDesc('created_at')->where('customer_id', Auth::id());

        return view('customer.orders.index', [
            'orders' => $orders->paginate(Order::COUNT_ON_PAGE),
        ]);
    }

    public function sellerIndex()
    {
        $orders = Order::orderByDesc('created_at')->where('seller_id', Auth::id());

        return view('seller.orders.index', [
            'orders' => $orders->paginate(Order::COUNT_ON_PAGE),
        ]);
    }
}
