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
Route::middleware(['web'])->group(function(){
    Route::get('cashier', function(){
        return redirect(url('/cashier/login'));
    });
    Route::get('cashier/login', 'ProactiveAnts\Cashier\LoginController@login')->name('cashier.login');
    Route::post('cashier/login', 'ProactiveAnts\Cashier\LoginController@postLogin');
    Route::get('cashier/logout', 'ProactiveAnts\Cashier\LoginController@logout')->name('cashier.logout');
    Route::get('cashier/payment', 'ProactiveAnts\Cashier\CashierController@viewPayment')->name('cashier.student.payment');
});

Route::prefix('cashier')->middleware(['web','auth:cashier'])->group(function () {
    Route::get('/dashboard', 'ProactiveAnts\Cashier\CashierController@index')->name('cashier.dashboard');
    /**
     * Course
     */
    Route::get('/course/quickpay', 'ProactiveAnts\Cashier\CoursePaymentController@quickpay');
    Route::post('/course/quickpay/pay', 'ProactiveAnts\Cashier\CoursePaymentController@pay');
    Route::post('/course/quickpay/checkin', 'ProactiveAnts\Cashier\CoursePaymentController@checkin');
    Route::get('/course/attendance', 'ProactiveAnts\Cashier\CashierController@attendance');
    
    Route::get('/course/payment', 'ProactiveAnts\Cashier\CoursePaymentController@index');
    Route::get('/course/payment/download/{id}', 'ProactiveAnts\Cashier\CoursePaymentController@download');
    Route::post('/course/payment/confirm', 'ProactiveAnts\Cashier\CoursePaymentController@confirmPayment');
    Route::post('/course/payment/store', 'ProactiveAnts\Cashier\CoursePaymentController@store');
    Route::post('/course/payment/search', 'ProactiveAnts\Cashier\CoursePaymentController@search');
    Route::get('/course/payment/export', 'ProactiveAnts\Cashier\CoursePaymentController@export');

    /**
     * User
     */
    Route::get('/usr', 'ProactiveAnts\Cashier\UserController@index');
    Route::get('/usr/{id}/view', 'ProactiveAnts\Cashier\UserController@view');

});