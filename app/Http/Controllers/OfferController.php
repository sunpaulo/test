<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOfferRequest;
use App\Http\Requests\GetProductRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Offer;
use App\Models\Product;
use App\Services\Logical\OfferManagement;
use Illuminate\Http\Request;
use Auth;

class OfferController extends Controller
{
    /**
     * Offers list
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $offers = OfferManagement::getAllOffers($request);

        return view('offers', [
            'offers' => $offers->paginate(Offer::COUNT_ON_PAGE),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOwnOffers()
    {
        $offers = OfferManagement::getPersonalOffers();

        return view('seller.offers.index', [
            'offers' => $offers->paginate(Offer::COUNT_ON_PAGE),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @param GetProductRequest $request
     */
    public function create(GetProductRequest $request)
    {
        $product = Product::where('slug', $request->input('product'))->first();

        return view('seller.offers.create', [
            'product' => $product,
            'offer' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOfferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOfferRequest $request)
    {
        OfferManagement::createFromRequest($request);

        return redirect()->route('seller.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Offer $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        return view('seller.offers.edit', [
            'offer' => $offer,
            'product' => $offer->product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateOfferRequest  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        OfferManagement::updateFromRequest($request, $offer);

        return redirect()->route('seller.offer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
