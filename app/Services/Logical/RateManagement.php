<?php

namespace App\Services\Logical;

use App\Http\Requests\UpdateRateRequest;
use App\Models\Auction;
use App\Models\Rate;
use Illuminate\Http\Request;
use Auth;

class RateManagement
{
    public static function updateFromRequest(UpdateRateRequest $request, Rate $rate)
    {
        $rate->update($request->only('value'));

        return;
    }

    public static function getFormForUpdate(Request $request)
    {
        /** @var Auction $auction */
        $auction = Auction::find($request->input('auction-id'));
        $competitorsPrices = $auction->rates()
            ->where('seller_id', '<>', Auth::id())
            ->orderBy('value')
            ->take(10)
            ->pluck('value')
            ->implode(', ');

        $ownRate = Rate::ownRate($auction->getId())->first();

        return [$auction, $competitorsPrices, $ownRate];
    }
}