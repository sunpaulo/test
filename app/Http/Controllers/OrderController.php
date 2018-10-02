<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderByDesc('created_at')->where('customer_id', Auth::id());

        return view('customer.orders.index', [
            'orders' => $orders->paginate(Order::COUNT_ON_PAGE),
        ]);
    }
}
