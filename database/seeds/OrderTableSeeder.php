<?php

use App\Models\Order;

class OrderTableSeeder extends DatabaseSeeder
{
    public function run()
    {
        factory(Order::class, self::ORDERS_COUNT)->create();
    }
}
