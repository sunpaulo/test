<?php

namespace App\Services\Logical;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Order;

class OrderManagement
{
    public static function createFromRequest(CreateOrderRequest $request)
    {
        $order = Order::create($request->all());

        return $order;
    }
}