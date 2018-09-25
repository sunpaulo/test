<?php

namespace App\Services\Logical;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryManagement
{
    public static function createFromRequest(CreateCategoryRequest $request)
    {
        $category = Category::create($request->all());

        return $category;
    }

    public static function updateFromRequest(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        return $category;
    }
}