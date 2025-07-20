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
Route::group(['middleware' => ['web','auth','verified']], function () {
    Route::get('/lib', 'ProactiveAnts\Library\MaterialController@index');
    Route::get('/lib/c/{id}', 'ProactiveAnts\Library\MaterialController@viewMaterialsByCategory');
    Route::get('/lib/m/{id}', 'ProactiveAnts\Library\MaterialController@downloadMaterial');
    Route::get('/lib/store_image/fetch_image/{id}', 'ProactiveAnts\Library\MaterialController@fetchImage');
});