<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/bookshop/cart/ipg/notify', 'ProactiveAnts\Store\IPGController@notify');

Route::group(['middleware' => ['web']], function () {
    Route::get('/bookshop', 'ProactiveAnts\Store\StoreController@index');
    Route::get('/bookshop/c/{id}', 'ProactiveAnts\Store\StoreController@viewProductByCategory');
    Route::get('/bookshop/p/{id}', 'ProactiveAnts\Store\StoreController@viewProduct');
    Route::get('/bookshop/store_image/fetch_image/{id}', 'ProactiveAnts\Store\StoreController@fetchImage');
});

Route::group(['middleware' => ['web','auth','verified']], function () {
    Route::get('/bookshop/cart', 'ProactiveAnts\Store\CartController@index');
    Route::get('/bookshop/cart/delete/{id}', 'ProactiveAnts\Store\CartController@removeFromCart');
    Route::post('/bookshop/cart/checkout', 'ProactiveAnts\Store\CartController@checkout');
    Route::get('/bookshop/cart/complete', 'ProactiveAnts\Store\CartController@complete');
    Route::get('/bookshop/cart/ipg/return', 'ProactiveAnts\Store\IPGController@return');
    Route::get('/bookshop/cart/ipg/cancel', 'ProactiveAnts\Store\IPGController@cancel');
    Route::get('/bookshop/order/history', 'ProactiveAnts\Store\OrderController@history');
    
    // AJAX
    Route::post('/bookshop/cart/add', 'ProactiveAnts\Store\CartController@addToCart');
});