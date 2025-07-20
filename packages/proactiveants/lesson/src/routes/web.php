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
Route::post('/lsn/subscription/ipg/notify', 'ProactiveAnts\Lesson\IPGController@notify');

Route::group(['middleware' => ['web']], function () {
    Route::get('/lsn/gs/{id}', 'ProactiveAnts\Lesson\LessonController@getUnit');
    Route::get('/lsn/vdo/{video}', 'ProactiveAnts\Lesson\VideoController@getVideo');
});

Route::group(['middleware' => ['web', 'auth', 'verified']], function () {
    Route::get('/lsn/subscription/ipg/return', 'ProactiveAnts\Lesson\IPGController@return');
    Route::get('/lsn/subscription/ipg/cancel', 'ProactiveAnts\Lesson\IPGController@cancel');
    Route::get('/lsn/gs/{id}/buy', 'ProactiveAnts\Lesson\SubscriptionController@buy');
    Route::get('/lsn/sub/history', 'ProactiveAnts\Lesson\SubscriptionController@history');
});