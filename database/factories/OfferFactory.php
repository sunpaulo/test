<?php

use Faker\Generator as Faker;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Offer;

$factory->define(Offer::class, function (Faker $faker) {
    $sellerId = Seller::inRandomOrder()->first();
    do {
        $productId = Product::inRandomOrder()->first();
    } while (Offer::where('seller_id', $sellerId)->where('product_id', $productId)->exists());

    return [
        'seller_id' => $sellerId,
        'product_id' => $productId,
        'price' => $faker->randomFloat('2',0, 10**4),
    ];
});
