<?php

namespace App\Services\Logical;

use App\Models\Order;
use App\Models\Rate;
use Auth;

class OrderManagement
{
    public static function create(int $productId, Rate $rate)
    {
        $order = new Order();
        $order->setProductId($productId)
            ->setCustomerId(Auth::id())
            ->setSellerId($rate->getSellerId())
            ->setPrice($rate->getValue())
            ->save();

        return $order;
    }
}