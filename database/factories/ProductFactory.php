<?php

use Faker\Generator as Faker;
use App\Models\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->text(40),
        'slug' => 'slug',
        'creator_id' => 1 // admin
    ];
});
