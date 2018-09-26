<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Enums\RoleEnum;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $roles = [RoleEnum::SELLER, RoleEnum::CUSTOMER];
    return [
        'name' => $faker->firstName . ' ' . $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => 'secret', // secret
        'role' => $roles[array_rand($roles)],
    ];
});
