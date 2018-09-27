<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Services\Logical\OrderManagement;
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

    public function store(CreateOrderRequest $request)
    {
        $order = OrderManagement::createFromRequest($request);

        return redirect()->route('offer');
    }

    public function destroy(Order $order)
    {
        OrderManagement::remove($order);

        return redirect()->route('customer.order.index');
    }
}
