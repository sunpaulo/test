<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\Auction;
use App\Services\Logical\AuctionManagement;
use Illuminate\Http\Request;
use DB;
use Auth;

class AuctionController extends Controller
{
    public function index()
    {
        if (Auth::user()->getRole() === Role::CUSTOMER) {
            $auctions = AuctionManagement::getCurrentCustomerAuctions();
        } else {
            $auctions = AuctionManagement::getCurrentSellerAuctions();
        }

        return view($this->getIndexView(), [
            'auctions' => $auctions
        ]);
    }

    public function sellerIndex()
    {
        $auctions = AuctionManagement::getCurrentSellerAuctions();

        // pagination is also included
        return view('seller.auctions.index', [
            'auctions' => $auctions
        ]);
    }

    public function getIndexRoute()
    {
        return Auth::user()->getRole() . '.auction.index';
    }

    public function getIndexView()
    {
        return Auth::user()->getRole() . '.auctions.index';
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            AuctionManagement::createFromRequest($request);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect()->route('offer');
    }

    public function update(Auction $auction)
    {
        AuctionManagement::hideAuction($auction);

        return redirect()->route($this->getIndexRoute());
    }
}
