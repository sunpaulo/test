<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const USERS_COUNT = 100;
    const CATEGORIES_COUNT = 20;
    const PRODUCTS_COUNT = 100;
    const OFFERS_COUNT = 200;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             UserTableSeeder::class,
             CategoryTableSeeder::class,
             ProductTableSeeder::class,
             OfferTableSeeder::class,
         ]);
    }
}
