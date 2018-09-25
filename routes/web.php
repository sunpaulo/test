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
    Route::resource('/offer', 'OfferController', ['as' => 'seller']);
    Route::resource('/product', 'ProductController', ['as' => 'seller']);
});

Route::get('/product', 'ProductController@getAll')->name('product');
Route::get('/offer', 'OfferController@getAll')->name('offer');

Route::group(['prefix' => 'customer', 'middleware' => ['auth', 'customer']], function () {
    Route::get('/personal-area', 'PersonalController@personalArea')->name('customer.index');
    Route::post('/order', 'OrderController@store')->name('customer.order.store');
});