<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Services\Logical\AuctionManagement;
use Illuminate\Http\Request;
use DB;
use Auth;

class AuctionController extends Controller
{
    public function index()
    {
        $auctions = Auction::orderByDesc('id')->where('customer_id', Auth::id())->with(['product', 'rates']);
        return view('customer.auctions.index', [
            'auctions' => $auctions->paginate(Auction::COUNT_ON_PAGE)
        ]);
    }

    public function participation()
    {
        $auctions = AuctionManagement::getCurrentUserAuctions();

        // pagination is also included
        return view('seller.auctions.index', [
            'auctions' => $auctions
        ]);
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

    /**
     * @param Auction $auction
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request, Auction $auction)
    {
        try {
            DB::beginTransaction();

            AuctionManagement::updateFromRequest($request, $auction);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect()->route('customer.auction.index');
    }
}
