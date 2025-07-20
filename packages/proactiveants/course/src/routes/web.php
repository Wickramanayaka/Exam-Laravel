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
    Route::get('/course', 'ProactiveAnts\Course\CourseController@index');
    Route::get('/course/teacher/store_image/fetch_image/{id}', 'ProactiveAnts\Course\TeacherController@fetchImage');
    Route::get('/course/teacher/{id}', 'ProactiveAnts\Course\TeacherController@getCourseByTeacher');
});

Route::group(['middleware' => ['web', 'auth', 'verified']], function () {
    Route::get('/course/payment/ipg/return', 'ProactiveAnts\Course\IPGController@return');
    Route::get('/course/payment/ipg/cancel', 'ProactiveAnts\Course\IPGController@cancel');
    Route::post('/course/payment', 'ProactiveAnts\Course\CoursePaymentController@payment');
    Route::get('/course/{id}', 'ProactiveAnts\Course\CourseController@getCourse');
    Route::get('/course/{id}/payment/method', 'ProactiveAnts\Course\CoursePaymentController@paymentMethod');
    Route::get('/course/{id}/payment/cards', 'ProactiveAnts\Course\CoursePaymentController@cards');
    Route::get('/course/{id}/payment/online', 'ProactiveAnts\Course\CoursePaymentController@online');
    Route::get('/course/{id}/payment/ezcash', 'ProactiveAnts\Course\CoursePaymentController@ezcash');
    Route::get('/course/{id}/payment/deposit', 'ProactiveAnts\Course\CoursePaymentController@deposit');
    Route::post('/course/payment/upload', 'ProactiveAnts\Course\CoursePaymentController@upload');
    Route::get('/course/{id}/payment/card/pay', 'ProactiveAnts\Course\CoursePaymentController@genie');
    Route::get('/course/payment/history', 'ProactiveAnts\Course\CoursePaymentController@history');
});

// Payhere
Route::post('/course/payment/ipg/notify', 'ProactiveAnts\Course\IPGController@notify');

// Genie
Route::get('/course/genie/success','ProactiveAnts\Course\GenieController@ipgSuccess')->name('genie.success');
Route::get('/course/genie/error','ProactiveAnts\Course\GenieController@ipgError')->name('genie.error');