<?php

namespace App\Services\Logical;

use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class OfferManagement
{
    public static function getAllOffers(Request $request)
    {
        $offers = Offer::orderByDesc('id')->with('product');

        if ($request->filled('product')) {
            $productId = Product::where('slug', $request->input('product'))->value('id');
            $offers->where('product_id', $productId);
        }
        if ($request->filled('seller-id')) {
            $offers->where('seller_id', $request->input('seller-id'));
        }

        return $offers;
    }

    public static function getPersonalOffers()
    {
        return Offer::orderByDesc('id')->where('seller_id', Auth::id())->with('product');
    }

    public static function createFromRequest(Request $request)
    {
        $offer = Offer::create($request->all());

        return $offer;
    }

    public static function updateFromRequest(Request $request, Offer $offer)
    {
        $offer->update($request->all());

        return $offer;
    }
}