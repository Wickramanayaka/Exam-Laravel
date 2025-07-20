<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/', 'HomeController@index');

Route::get('/forgotpassword', 'Auth\LoginController@forgotPassword')->name('forgot_password')->middleware(['web']);
Route::post('/otp', 'Auth\LoginController@otp')->name('otp')->middleware(['web']);
Route::post('/resetpassword', 'Auth\LoginController@reset')->name('password_reset')->middleware(['web']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/exam', 'HomeController@getExam')->name('exams');
Route::get('/lessons', 'HomeController@getLesson')->name('lessons');
Route::get('/about_us', 'HomeController@getAboutUs')->name('aboutUs');
Route::get('/contact_us', 'HomeController@getContactUs')->name('contactUs');
Route::get('/seminars', 'HomeController@getSeminar')->name('seminars');
Route::get('/library', 'HomeController@getLibrary')->name('library');
Route::get('/bookshop', function(){
    return view('bookshop');
})->name('bookshop');

Route::post('/contact', 'ContactController@store')->name('contact.store');

Route::get('/help', function(){
    return view('help');
});