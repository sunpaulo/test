<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderByDesc('id');

        return view('seller.products.index', [
            'products' => $products->paginate(20),
        ]);
    }
}
