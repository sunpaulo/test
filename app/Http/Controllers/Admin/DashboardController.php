<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'categories' => Category::lastCategories(5),
            'products' => Product::lastProducts(5),
            'categories_count' => Category::count(),
            'products_count' => Product::count(),
        ]);
    }
}
