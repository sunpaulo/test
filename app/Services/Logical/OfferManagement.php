<?php

namespace App\Services\Logical;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferManagement
{
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