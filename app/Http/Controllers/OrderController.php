<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Order;
use App\Services\Logical\OrderManagement;
use Auth;
use Illuminate\Http\Request;
use DB;
use Exception;

class OrderController extends Controller
{
    public function customerIndex()
    {
        $orders = Order::orderByDesc('id')->where('customer_id', Auth::id());

        return view('customer.orders.index', [
            'orders' => $orders->paginate(Order::COUNT_ON_PAGE),
        ]);
    }

    public function sellerIndex()
    {
        $orders = Order::orderByDesc('id')->where('seller_id', Auth::id());

        return view('seller.orders.index', [
            'orders' => $orders->paginate(Order::COUNT_ON_PAGE),
        ]);
    }

    public function create(Request $request)
    {
        $auction = Auction::find($request->input('auction'));

        return view('customer.orders.create', [
            'auction' => $auction
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception $e
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            OrderManagement::createFromRequest($request);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect()->route('customer.order.index');
    }
}
