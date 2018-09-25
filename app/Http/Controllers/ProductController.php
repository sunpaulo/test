<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    public function getAll()
    {
        $products = Product::orderByDesc('id');

        return view('products', [
           'products' => $products->paginate(20),
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderByDesc('id');
        if (Auth::user()->getRole() === RoleEnum::SELLER && $request->input('type') == 'offered') {
            $products->ownProductOffers(Auth::id());
        }

        return view('seller.products.index', [
            'products' => $products->paginate(20),
        ]);
    }
}
