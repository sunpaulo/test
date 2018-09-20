<?php

use App\Models\Product;
use App\Models\Category;

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
            $cat = Category::inRandomOrder()->take(rand(0, 3))->get();
            $product->categories()->attach($cat);
        });
    }
}
