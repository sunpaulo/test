<?php

use Faker\Generator as Faker;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Offer;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'offer_id' => Offer::inRandomOrder()->first(),
        'customer_id' => Customer::inRandomOrder()->first(),
    ];
});
