<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProactiveAnts\Library\Material;
use ProactiveAnts\Seminar\SeminarBooking;
use ProactiveAnts\Course\Payment;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        // Get upcoming 5 bookings
        $payments = Payment::orderBy('id','desc')->take(5)->get();
        // Last 10 days payments
        $p = Payment::selectRaw("SUM(amount) as total, date")->groupBy('date')->orderBy('date','desc')->take(10);
        $amounts = $p->pluck('total');
        $labels = $p->pluck('date');
        // Course wise payment
        $cp = Payment::join('co_courses','co_courses.id','=','co_payments.co_course_id')->selectRaw("SUM(amount) as total, co_course_id, name")->groupBy(['co_course_id','name'])->orderBy('co_course_id');
        $c_amounts = $cp->pluck('total');
        $c_labels = $cp->pluck('name');
        // Recent user
        $users = User::orderBy('id','desc')->take(5)->get();
        return view('admin::dashboard', compact('amounts','labels','c_labels','c_amounts','users','payments'));
    }
}
