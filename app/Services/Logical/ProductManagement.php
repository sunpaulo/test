<?php

namespace App\Services\Logical;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductManagement
{
    public static function createFromRequest(CreateProductRequest $request)
    {
        $product = new Product($request->all());
        $product->save();

        if ($request->input('categories')) {
            $product->categories()->attach($request->input('categories'));
        }

        return $product;
    }

    public static function updateFromRequest(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());

        // Categories
        $product->categories()->detach();
        if ($request->input('categories')) {
            $product->categories()->attach($request->input('categories'));
        }

        return $product;
    }

    public static function delete(Product $product)
    {
        $product->categories()->detach();
        $product->delete();

        return;
    }
}