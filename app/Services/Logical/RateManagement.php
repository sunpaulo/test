<?php

namespace App\Services\Logical;

use App\Http\Requests\UpdateRateRequest;
use App\Models\Auction;
use App\Models\Offer;
use App\Models\Rate;
use Illuminate\Http\Request;
use Auth;

class RateManagement
{
    public static function create(Offer $offer, Auction $auction)
    {
        $offers = Offer::whereBetween('price', self::selectAuctionParticients($offer->getPrice()))
            ->where('product_id', $offer->getProductId())
            ->get();

        /** @var Offer $offer */
        foreach ($offers as $offer) {
            $rate = new Rate();
            $rate->setAuctionId($auction->getId())
                ->setSellerId($offer->getSellerId())
                ->setValue($offer->getPrice())
                ->save();
        }

        return;
    }

    public static function selectAuctionParticients($price, $percents = 20)
    {
        $part = $percents/100;

        return [(1-$part)*$price, (1+$part)*$price];
    }

    public static function updateFromRequest(UpdateRateRequest $request, Rate $rate)
    {
        $rate->auction->touch();
        $rate->update($request->only('value'));

        return;
    }

    public static function getFormForUpdate(Request $request)
    {
        /** @var Auction $auction */
        $auction = Auction::findOrFail($request->input('auction'));
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