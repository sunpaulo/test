<?php

use Faker\Generator as Faker;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Seller;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'product_id' => Product::inRandomOrder()->first(),
        'seller_id' => Seller::inRandomOrder()->first(),
        'customer_id' => Customer::inRandomOrder()->first(),
    ];
});
