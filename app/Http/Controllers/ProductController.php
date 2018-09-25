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
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderByDesc('id');
        if ($request->input('type') == 'offered') {
            $products->ownProductOffers(Auth::id());
        }

        return view('seller.products.index', [
            'products' => $products->paginate(20),
        ]);
    }
}
