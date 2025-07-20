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
    Route::get('/ex', function(){
        return redirect(url('/exam'));
    });
    Route::get('/exam/c/{id}', 'ProactiveAnts\Exam\ExamCourseController@view');
});

Route::group(['middleware' => ['web','auth','verified']], function () {
    Route::get('/exam/c/{c}/p/{id}', 'ProactiveAnts\Exam\ExamPaperController@view')->name('paper_view');
    Route::get('/exam/c/{c}/p/{id}/begin', 'ProactiveAnts\Exam\ExamPaperController@begin')->name('begin');
    Route::get('/exam/p/tryout/{id}', 'ProactiveAnts\Exam\ExamPaperController@result');
    // AJAX
    Route::post('/exam/question/get', 'ProactiveAnts\Exam\QuestionController@getQuestion');
    Route::post('/exam/question/answer', 'ProactiveAnts\Exam\QuestionController@postAnswer');
    Route::post('/exam/paper/submit', 'ProactiveAnts\Exam\ExamPaperController@submit');
    Route::post('/exam/paper/complete', 'ProactiveAnts\Exam\ExamPaperController@complete');
    Route::post('/exam/paper/review', 'ProactiveAnts\Exam\ExamPaperController@review');
    Route::post('/exam/paper/updatetime', 'ProactiveAnts\Exam\ExamPaperController@updatetime');
    Route::post('/exam/paper/mark', 'ProactiveAnts\Exam\ExamPaperController@viewPaperMark');
});