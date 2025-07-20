<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use ProactiveAnts\Seminar\SeminarBooking;

class SeminarController extends Controller
{
    public function index(Request $request)
    {
        $bookings = SeminarBooking::orderBy('id','desc')->paginate(25);
        $keyword = '';
        if($request->has('keyword')){
            $bookings = SeminarBooking::where('requester_name','like','%'.$request->keyword.'%')
            ->orWhere('mobile','like','%'.$request->keyword.'%')
            ->orWhere('email','like','%'.$request->keyword.'%')
            ->orWhere('date','like','%'.$request->keyword.'%')
            ->orderBy('id','desc')->paginate(25);
            $keyword = $request->keyword;
        }
        return view('admin::seminars.index', compact('bookings','keyword'));
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $booking = SeminarBooking::findOrFail($request->id);
        $booking->delete();
        return redirect()->back();
    }

    public function confirmed($id)
    {
        $booking = SeminarBooking::findOrFail($id);
        $currentValue = $booking->confirmed=="No"?0:1;
        $booking->confirmed = 1 - intval($currentValue);
        $booking->save();
        return redirect()->back();
    }

}
