<?php

namespace App\Services\Logical;

use App\Enums\Role;
use Auth;
use App\Models\Auction;
use App\Models\Offer;
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
            ->setCustomerId(Auth::id())
            ->save();

        // create rates while initing auction
        RateManagement::create($offer, $auction);

        return $auction;
    }

    public static function getCurrentCustomerAuctions()
    {
        $auctions = Auction::orderByDesc('updated_at')->where([
            ['customer_id', Auth::id()],
            ['is_hidden', false],
            ])->with(['product', 'rates']);

        return $auctions->paginate(Auction::COUNT_ON_PAGE);
    }

    public static function getCurrentSellerAuctions()
    {
        $auctions = Auction::whereHas('rates', function ($query) {
            $query->where([
                ['seller_id', Auth::id()],
                ['hidden_auction', false]
            ]);
        })->orderByDesc('updated_at')->paginate(Auction::COUNT_ON_PAGE);

        foreach ($auctions as &$auction) {
            $auction->myRate = Rate::ownRate($auction->id)->value('value');
        }

        return $auctions;
    }

    public static function hideAuction(Auction $auction)
    {
        if (Auth::user()->getRole() === Role::CUSTOMER) {
            $auction->setIsHidden(true)->save();
        } else {
            $auction->rates()->where('seller_id', Auth::id())->first()->setHiddenAuction(true)->save();
        }

        return;
    }
}