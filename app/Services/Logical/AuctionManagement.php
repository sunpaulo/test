<?php

namespace App\Services\Logical;

use App\Enums\AuctionStatus;
use Auth;
use App\Models\Auction;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Rate;
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
            ->setCustomerId(\Auth::id())
            ->save();

        $offers = Offer::whereBetween('price', [0.8*$offer->getPrice(), 1.2*$offer->getPrice()])
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

        return $auction;
    }

    public static function updateFromRequest(Request $request, Auction $auction)
    {
        $auction->setStatus(AuctionStatus::FINISHED)->save();
        /** @var Rate $rate */
        $rate = $auction->rates()->orderBy('value')->first();

        $order = new Order();
        $order->setProductId($auction->getProductId())
            ->setCustomerId(Auth::id())
            ->setSellerId($rate->getSellerId())
            ->setPrice($rate->getValue())
            ->save();

        return;
    }

    public static function getCurrentCustomerAuctions()
    {
        $auctions = Auction::orderByDesc('id')->where('customer_id', Auth::id())->with(['product', 'rates']);

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