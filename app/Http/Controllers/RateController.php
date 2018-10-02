<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRateRequest;
use App\Models\Auction;
use App\Models\Rate;
use App\Services\Logical\RateManagement;
use Illuminate\Http\Request;
use Auth;

class RateController extends Controller
{
    public function edit(Request $request)
    {
        /** @var Auction $auction */
        $auction = Auction::find($request->input('auction-id'));
        $competitorsPrices = $auction->rates()
            ->where('seller_id', '<>', Auth::id())
            ->orderBy('value')
            ->take(10)
            ->pluck('value')
            ->implode(', ');

        return view('seller.auctions.edit', [
            'auction' => $auction,
            'competitorsPrices' => $competitorsPrices,
            'myRate' => Rate::ownRate($auction->getId())->first()
        ]);
    }

    public function update(UpdateRateRequest $request, Rate $rate)
    {
        RateManagement::updateFromRequest($request, $rate);

        return redirect()->route('seller.auction.index');
    }
}