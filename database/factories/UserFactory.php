<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Enums\Role;

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
    $roles = [Role::SELLER, Role::CUSTOMER];
    $role = $roles[array_rand($roles)];

    $name = $faker->firstName . ' ' . $faker->lastName;
    if ($role === Role::SELLER) {
        $name = $faker->company;
    }

    return [
        'name' => $name,
        'email' => $faker->unique()->safeEmail,
        'password' => 'secret', // secret
        'role' => $role,
    ];
});
