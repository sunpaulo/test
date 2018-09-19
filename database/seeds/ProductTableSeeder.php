<?php

use App\Models\Product;

class ProductTableSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, self::PRODUCTS_COUNT)->create()->each(function (Product $product) {
            // Attaching a different number of categories
            $end = rand(0, 3);
            if ($end > 1) {
                $product->categories()->attach(range(1, $end));
            }
        });
    }
}
