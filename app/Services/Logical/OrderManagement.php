<?php

namespace App\Services\Logical;

use App\Enums\AuctionStatus;
use App\Models\Auction;
use App\Models\Order;
use App\Models\Rate;
use Auth;
use Illuminate\Http\Request;

class OrderManagement
{
    public static function createFromRequest(Request $request)
    {
        /** @var Auction $auction */
        $auction = Auction::find($request->input('auction'));
        $auction->setStatus(AuctionStatus::FINISHED)->save();
        $rate = $auction->rates()->where([
            ['seller_id', $request->input('seller')],
           ['auction_id', $auction->getId()],
        ])->first();

        $order = new Order();
        $order->setProductId($auction->getProductId())
            ->setCustomerId(Auth::id())
            ->setSellerId($request->input('seller'))
            ->setPrice($rate->value)
            ->save();

        return $order;
    }
}