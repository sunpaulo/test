<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRateRequest;
use App\Models\Auction;
use App\Models\Rate;
use App\Services\Logical\RateManagement;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function edit(Request $request)
    {
        list($auction, $competitorsPrices, $myRate) = RateManagement::getFormForUpdate($request);

        return view('seller.auctions.edit', [
            'auction' => $auction,
            'competitorsPrices' => $competitorsPrices,
            'myRate' => $myRate
        ]);
    }

    public function update(UpdateRateRequest $request, Rate $rate)
    {
        RateManagement::updateFromRequest($request, $rate);

        return redirect()->route('seller.auction.index');
    }
}