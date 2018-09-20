<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Seller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'categories' => Category::lastCategories(5),
            'products' => Product::lastProducts(5),
            'categories_count' => Category::count(),
            'products_count' => Product::count(),
            'sellers_count' => Seller::count(),
            'customers_count' => Customer::count(),
        ]);
    }
}
