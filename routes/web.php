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
});

Route::get('/offer', 'OfferController@index')->name('offer');

Route::group(['prefix' => 'customer', 'middleware' => ['auth', 'customer']], function () {
    Route::get('/personal-area', 'PersonalController@personalArea')->name('customer.index');
    Route::resource('/order', 'OrderController', ['as' => 'customer'])
        ->only(['index', 'store', 'destroy']);
});