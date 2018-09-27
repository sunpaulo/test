<?php

use Faker\Generator as Faker;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Offer;

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'seller_id' => Seller::inRandomOrder()->first(),
        'product_id' => Product::inRandomOrder()->first(),
        'price' => $faker->randomFloat('2',0, 10**4),
    ];
});
