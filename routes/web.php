<?php

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'DashboardController@dashboard')->name('admin.index');
    Route::resource('/category', 'CategoryController', ['as' => 'admin']);
    Route::resource('/product', 'ProductController', ['as' => 'admin']);
});

Route::group(['prefix' => 'seller','middleware' => ['auth', 'seller']], function () {
    Route::get('/personal-area', 'PersonalController@personalArea')->name('seller.index');
    Route::resource('/offer', 'OfferController', ['as' => 'seller'])->except(['index']);
    Route::get('/offer', 'OfferController@getOwnOffers')->name('seller.offer.index');
    Route::resource('/product', 'ProductController', ['as' => 'seller'])
        ->only(['index']);
    Route::get('/auction', 'AuctionController@participation')->name('seller.auction.index');
    Route::get('/rate', 'RateController@edit')->name('seller.rate.edit');
    Route::put('/rate/{rate}', 'RateController@update')->name('seller.rate.update');
    Route::get('/order', 'OrderController@sellerIndex')->name('seller.order.index');
});

Route::get('/offer', 'OfferController@index')->name('offer');

Route::group(['prefix' => 'customer', 'middleware' => ['auth', 'customer']], function () {
    Route::get('/personal-area', 'PersonalController@personalArea')->name('customer.index');
    Route::get('/order', 'OrderController@customerIndex')->name('customer.order.index');
    Route::get('/auction', 'AuctionController@index')->name('customer.auction.index');
    Route::put('/auction/{auction}', 'AuctionController@update')->name('customer.auction.update');
    Route::post('/auction', 'AuctionController@store')->name('customer.auction.store');
});