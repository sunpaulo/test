<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $products = Product::orderByDesc('id');

        return view('seller.products.index', [
            'products' => $products->paginate(Product::COUNT_ON_PAGE),
        ]);
    }
}
