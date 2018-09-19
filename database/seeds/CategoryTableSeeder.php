<?php

use App\Models\Category;

class CategoryTableSeeder extends DatabaseSeeder
{
    public function run()
    {
        factory(Category::class, self::CATEGORIES_COUNT)->create()->each(function (Category $category) {
            if ($category->id > 10) {
                $category->update(['parent_id' => rand(1, 10)]);
            }
        });
    }
}
