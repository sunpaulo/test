<?php

namespace App\Services\Logical;

use App\Enums\AuctionStatus;
use Auth;
use App\Models\Auction;
use App\Models\Offer;
use App\Models\Rate;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Http\Request;

class AuctionManagement
{
    public static function createFromRequest(Request $request)
    {
        /** @var Offer $offer */
        $offer = Offer::find($request->input('offer_id'));
        $auction = new Auction();
        $auction->setProductId($offer->getProductId())
            ->setOriginPrice($offer->getPrice())
            ->setCustomerId(Auth::id())
            ->save();

        // create rates while initing auction
        RateManagement::create($offer, $auction);

        return $auction;
    }

    public static function updateFromRequest(Auction $auction)
    {
        $auction->setStatus(AuctionStatus::FINISHED)->save();
        /** @var Rate $rate */
        $rate = $auction->rates()->orderBy('value')->first();

        // create an order after the auction is closed
        OrderManagement::create($auction->getProductId(), $rate);

        return;
    }

    public static function getCurrentCustomerAuctions()
    {
        $auctions = Auction::orderByDesc('updated_at')->where('customer_id', Auth::id())->with(['product', 'rates']);

        return $auctions;
    }

    public static function getCurrentSellerAuctions()
    {
        $auctions = Auction::whereHas('rates', function ($query) {
            $query->where('seller_id', Auth::id());
        })->paginate(Auction::COUNT_ON_PAGE);

        foreach ($auctions as &$auction) {
            $auction->myRate = Rate::ownRate($auction->id)->value('value');
        }

        return $auctions;
    }
}