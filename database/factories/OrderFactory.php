<?php

use Faker\Generator as Faker;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Offer;

$factory->define(Order::class, function (Faker $faker) {
    $customerId = Customer::inRandomOrder()->first();
    do {
        $offerId = Offer::inRandomOrder()->first();
    } while (Order::where('offer_id', $offerId)->where('customer_id', $customerId)->exists());

    return [
        'offer_id' => $offerId,
        'customer_id' => $customerId,
    ];
});
