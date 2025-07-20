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
    Route::get('adm', function(){
        return redirect(url('/adm/login'));
    });
    Route::get('adm/login', 'ProactiveAnts\Admin\LoginController@login')->name('admin.login');
    Route::post('adm/login', 'ProactiveAnts\Admin\LoginController@postLogin');
    Route::get('adm/logout', 'ProactiveAnts\Admin\LoginController@logout')->name('admin.logout');
});

Route::prefix('adm')->middleware(['web','auth:admin'])->group(function () {

    Route::get('/dashboard', 'ProactiveAnts\Admin\AdminController@index')->name('admin.dashboard');
    
    /**
     * Library
     */
    Route::get('/lib', 'ProactiveAnts\Admin\LibraryController@index');
    Route::post('/lib/store', 'ProactiveAnts\Admin\LibraryController@store');
    Route::get('/lib/store_image/fetch_image/{id}', 'ProactiveAnts\Admin\LibraryController@fetchImage');
    Route::get('/lib/featured/{id}', 'ProactiveAnts\Admin\LibraryController@featured');
    Route::post('/lib/delete', 'ProactiveAnts\Admin\LibraryController@delete');
    Route::get('/lib/m/{id}/download', 'ProactiveAnts\Admin\LibraryController@downloadMaterial');
    
    /**
     * Seminar
     */
    Route::get('/sem', 'ProactiveAnts\Admin\SeminarController@index');
    Route::get('/sem/confirmed/{id}', 'ProactiveAnts\Admin\SeminarController@confirmed');
    Route::post('/sem/delete', 'ProactiveAnts\Admin\SeminarController@delete');
    
    /**
     * Lesson
     */
    Route::get('/lsn/sub', 'ProactiveAnts\Admin\SubscriptionController@index');
    Route::get('/lsn/sub/activate/{id}', 'ProactiveAnts\Admin\SubscriptionController@activate');
    Route::get('/lsn', 'ProactiveAnts\Admin\LessonController@index');
    Route::get('/lsn/{id}', 'ProactiveAnts\Admin\LessonController@viewLesson');
    Route::post('/lsn/delete', 'ProactiveAnts\Admin\LessonController@deleteLesson');
    Route::post('/lsn/store', 'ProactiveAnts\Admin\LessonController@store');
    Route::post('/lsn/vdo/store', 'ProactiveAnts\Admin\VideoController@store');
    Route::post('/lsn/vdo/delete', 'ProactiveAnts\Admin\VideoController@delete');
    Route::get('/lsn/vdo/publish/{id}', 'ProactiveAnts\Admin\VideoController@publish');
    
    /**
     * Store
     */
    Route::get('/bst', function(){
        return redirect(url('adm/bst/product'));
    });
    Route::get('/bst/product', 'ProactiveAnts\Admin\ProductController@index');
    Route::post('/bst/product/store', 'ProactiveAnts\Admin\ProductController@store');
    Route::post('/bst/product/delete', 'ProactiveAnts\Admin\ProductController@delete');
    Route::get('/bst/product/publish/{id}', 'ProactiveAnts\Admin\ProductController@publish');
    Route::get('/bst/category', 'ProactiveAnts\Admin\CategoryController@index');
    Route::post('/bst/category/store', 'ProactiveAnts\Admin\CategoryController@store');
    Route::post('/bst/category/delete', 'ProactiveAnts\Admin\CategoryController@delete');
    Route::get('/bst/category/publish/{id}', 'ProactiveAnts\Admin\CategoryController@publish');
    Route::get('/bst/store_image/fetch_image/{id}', 'ProactiveAnts\Admin\ProductController@fetchImage');
    Route::get('/bst/product/{id}', 'ProactiveAnts\Admin\ProductController@viewProduct');
    Route::post('/bst/product/updateInfo', 'ProactiveAnts\Admin\ProductController@updateInfo');
    Route::post('/bst/product/updateImage', 'ProactiveAnts\Admin\ProductController@updateImage');
    Route::post('/bst/product/updatePriceQtyWeight', 'ProactiveAnts\Admin\ProductController@updatePriceQtyWeight');
    Route::post('/bst/product/updateTag', 'ProactiveAnts\Admin\ProductController@updateTag');
    // Orders
    Route::get('/bst/order', 'ProactiveAnts\Admin\OrderController@index');
    Route::post('/bst/order/update', 'ProactiveAnts\Admin\OrderController@update');
    // AJAX
    Route::get('/bst/order/{id}', 'ProactiveAnts\Admin\OrderController@view');
    
    // Exam
    Route::get('/ex', 'ProactiveAnts\Admin\ExamController@index');
    Route::post('/ex/store', 'ProactiveAnts\Admin\ExamController@store');
    Route::post('/ex/delete', 'ProactiveAnts\Admin\ExamController@delete');
    Route::get('/ex/paper', 'ProactiveAnts\Admin\ExamPaperController@index');
    Route::post('/ex/paper/store', 'ProactiveAnts\Admin\ExamPaperController@store');
    Route::post('/ex/paper/delete', 'ProactiveAnts\Admin\ExamPaperController@delete');
    Route::get('/ex/paper/{id}/view', 'ProactiveAnts\Admin\ExamPaperController@view');
    Route::get('/ex/paper/{id}/edit', 'ProactiveAnts\Admin\ExamPaperController@edit');
    Route::get('/ex/paper/{id}/publish', 'ProactiveAnts\Admin\ExamPaperController@publish');
    Route::post('/ex/que/store', 'ProactiveAnts\Admin\QuestionController@store');
    Route::post('/ex/que/delete', 'ProactiveAnts\Admin\QuestionController@delete');
    Route::get('/ex/que', 'ProactiveAnts\Admin\QuestionController@index');
    Route::get('/ex/paper/{id}/addQuestion', 'ProactiveAnts\Admin\ExamPaperController@addQuestion');
    Route::post('/ex/paper/removeQuestion', 'ProactiveAnts\Admin\ExamPaperController@removeQuestionFromPaper');
    Route::get('/ex/paper/up/{id}', 'ProactiveAnts\Admin\ExamPaperController@up');
    Route::get('/ex/paper/down/{id}', 'ProactiveAnts\Admin\ExamPaperController@down');
    Route::post('/ex/paper/update', 'ProactiveAnts\Admin\ExamPaperController@update');
    Route::post('/ex/paper/question/update', 'ProactiveAnts\Admin\ExamPaperController@updateQuestion');
    // AJAX
    Route::post('/ex/que/ajaxList', 'ProactiveAnts\Admin\QuestionController@ajaxList');
    Route::post('/ex/que/addToPaper', 'ProactiveAnts\Admin\ExamPaperController@addToPaper');

    /**
     * Course
     */
    Route::get('/course', 'ProactiveAnts\Admin\CourseController@index');
    Route::post('/course/store', 'ProactiveAnts\Admin\CourseController@store');
    Route::get('/course/{id}/publish', 'ProactiveAnts\Admin\CourseController@publish');
    Route::get('/course/payment', 'ProactiveAnts\Admin\CoursePaymentController@index');
    Route::get('/course/payment/download/{id}', 'ProactiveAnts\Admin\CoursePaymentController@download');
    Route::post('/course/payment/confirm', 'ProactiveAnts\Admin\CoursePaymentController@confirmPayment');
    Route::post('/course/payment/delete', 'ProactiveAnts\Admin\CoursePaymentController@deletePayment');
    Route::post('/course/payment/store', 'ProactiveAnts\Admin\CoursePaymentController@store');
    Route::get('/course/{id}/view', 'ProactiveAnts\Admin\CourseController@view');
    Route::post('/course/update', 'ProactiveAnts\Admin\CourseController@update');
    Route::post('/course/link/store', 'ProactiveAnts\Admin\LinkController@store');
    Route::post('/course/material/store', 'ProactiveAnts\Admin\MaterialController@store');
    Route::post('/course/link/delete', 'ProactiveAnts\Admin\LinkController@delete');
    Route::post('/course/material/delete', 'ProactiveAnts\Admin\MaterialController@delete');
    Route::post('/course/video/store', 'ProactiveAnts\Admin\CourseVideoController@store');
    Route::post('/course/video/delete', 'ProactiveAnts\Admin\CourseVideoController@delete');
    Route::post('/course/payment/search', 'ProactiveAnts\Admin\CoursePaymentController@search');
    Route::post('/course/enroll/delete', 'ProactiveAnts\Admin\CourseController@enrollDelete');

    /**
     * Teacher
     */
    Route::get('/teacher', 'ProactiveAnts\Admin\TeacherController@index');
    Route::get('/teacher/{id}/activate', 'ProactiveAnts\Admin\TeacherController@activate');
    Route::post('/teacher/store', 'ProactiveAnts\Admin\TeacherController@store');
    Route::get('/teacher/store_image/fetch_image/{id}', 'ProactiveAnts\Admin\TeacherController@fetchImage');
    Route::get('/teacher/{id}/view', 'ProactiveAnts\Admin\TeacherController@view');
    Route::post('/teacher/{id}/update', 'ProactiveAnts\Admin\TeacherController@update');
    
    /**
     * Advertisement
     */
    Route::get('/adv', 'ProactiveAnts\Admin\AdvertisementController@index');
    Route::get('/adv/{id}/activate', 'ProactiveAnts\Admin\AdvertisementController@activate');
    Route::post('/adv/store', 'ProactiveAnts\Admin\AdvertisementController@store');
    Route::get('/adv/store_image/fetch_image/{id}', 'ProactiveAnts\Admin\AdvertisementController@fetchImage');
    Route::post('/adv/delete', 'ProactiveAnts\Admin\AdvertisementController@delete');

     /**
      * User
      */
    Route::get('/usr', 'ProactiveAnts\Admin\UserController@index');
    Route::get('/usr/{id}/activate', 'ProactiveAnts\Admin\UserController@activate');
    Route::get('/usr/{id}/view', 'ProactiveAnts\Admin\UserController@view');
    Route::post('/usr/delete', 'ProactiveAnts\Admin\UserController@delete');
    Route::get('/usr/export', 'ProactiveAnts\Admin\UserController@export');

     /**
      * Cashier
      */
      Route::get('/cashier', 'ProactiveAnts\Admin\CashierController@index');
      Route::post('/cashier/store', 'ProactiveAnts\Admin\CashierController@store');
      Route::get('/cashier/{id}/view', 'ProactiveAnts\Admin\CashierController@view');
      Route::post('/cashier/update', 'ProactiveAnts\Admin\CashierController@update');
      Route::post('/cashier/delete', 'ProactiveAnts\Admin\CashierController@delete');

    /**
     * SMS
     */
    Route::get('/sms', 'ProactiveAnts\Admin\SMSController@index');
    Route::post('/sms/send', 'ProactiveAnts\Admin\SMSController@send');

});

