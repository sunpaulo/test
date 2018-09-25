<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Services\Logical\OrderManagement;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(CreateOrderRequest $request)
    {
        $order = OrderManagement::createFromRequest($request);

        return redirect()->route('offer');
    }
}
