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
Route::group(['middleware' => ['web']], function () {
    Route::get('/sem', 'ProactiveAnts\Seminar\SeminarController@index');
    Route::post('/sem/store', 'ProactiveAnts\Seminar\SeminarController@store');
    Route::get('/sem/booking/complete',function(){
        return view('seminar::seminar_booking_completed');
    });
    Route::get('/sem/booking/error',function(){
        return view('seminar::seminar_booking_error');
    });

    // Ajax
    Route::get('/sem/getHostBySeminar/{id}', 'ProactiveAnts\Seminar\SeminarController@getHostBySeminar');
});