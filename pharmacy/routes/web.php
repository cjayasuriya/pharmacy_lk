<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/**
 * Products
 */
Route::group(['prefix' => 'products', 'as' => 'products.'], function() {
    Route::get('/create', 'Products\ProductController@showCreate');
    Route::post('/create/save', 'Products\ProductController@create');
    Route::get('/{productID}/edit', 'Products\ProductController@showEdit');
    Route::post('/{productID}/edit/update', 'Products\ProductController@edit');
    Route::get('/{productID}/delete', 'Products\ProductController@delete');
    Route::post('/{productID}/for-quotation', 'Products\ProductController@quotationProducts');
});


/**
 * Orders
 */
Route::group(['prefix' => 'orders', 'as' => 'orders.'], function() {
    Route::get('/create', 'Orders\OrderController@showCreate');
    Route::post('/create/save', 'Orders\OrderController@create');
    Route::get('/{orderID}', 'Orders\OrderController@show');
    Route::get('/{orderID}/quotation', 'Quotations\QuotationController@showCreate');
    Route::post('/{orderID}/quotation/create/save', 'Quotations\QuotationController@create');
});


/**
 * Quotations
 */
Route::group(['prefix' => 'quotations', 'as' => 'quotations.'], function() {
    Route::get('/{quotationID}', 'Quotations\QuotationController@show');
    Route::get('/{quotationID}/{statusID}', 'Quotations\CustomerQuotationController@updateStatus');
    Route::get('/{quotationID}', 'Quotations\CustomerQuotationController@show');
});
