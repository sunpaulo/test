<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'DashboardController@dashboard')->name('admin.index');
    Route::resource('/category', 'CategoryController', ['as' => 'admin']);
    Route::resource('/product', 'ProductController', ['as' => 'admin']);
});

Route::group(['middleware' => ['auth', 'seller']], function () {
    Route::get('/personal-area', 'PersonalController@sellerArea')->name('seller.index');
    Route::resource('/offer', 'OfferController', ['as' => 'seller']);
    Route::resource('/product', 'ProductController', ['as' => 'seller']);
});