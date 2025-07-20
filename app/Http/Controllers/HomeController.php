<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ProactiveAnts\Advertisement\Advertisement;
use ProactiveAnts\Course\Course;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the exams page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getExam()
    {
        $courses = Course::where('publish',1)->get();
        return view('exams', compact('courses'));
    }

    /**
     * Show the bookshop page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getBookshop()
    {
        return view('bookshop');
    }

    /**
     * Show the lessons page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getLesson()
    {
        return view('lessons');
    }

    /**
     * Show the seminars page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getSeminar()
    {
        return view('seminars');
    }

    /**
     * Show the about us page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getAboutUs()
    {
        return view('about_us');
    }

    /**
     * Show the contact us page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getContactUs()
    {
        return view('contact_us');
    }

}
