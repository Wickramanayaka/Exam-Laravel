<?php

namespace ProactiveAnts\Seminar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ProactiveAnts\Library\Category;
use Storage;
use Image;
use Illuminate\Support\Facades\Response;
use ProactiveAnts\Seminar\Seminar;
use ProactiveAnts\Seminar\Host;
use ProactiveAnts\Seminar\Location;
use ProactiveAnts\Seminar\SeminarBooking;

class SeminarController extends Controller
{
    public function index()
    {
        $seminars = Seminar::where('active',1)->get();
        $hosts = Host::where('active',1)->get();
        $locations = Location::where('active',1)->get();
        $bookings = SeminarBooking::where('confirmed',1)->get();
        return view('seminar::index', compact('seminars','hosts','locations','bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'date' => 'required'
        ]);
        // Check the availability
        $found = SeminarBooking::where('sem_host_id',$request->host)->where('date', $request->date)->count();
        if($found>0){
            return redirect(url('sem/booking/error'));
        }
        $data = [
            'name'=> $request->name,
            'sem_seminar_id' => $request->seminar,
            'sem_host_id' => $request->host,
            'requester_name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'date' => $request->date,
            'sem_location_id' => $request->location
        ];
        SeminarBooking::create($data);
        return redirect(url('sem/booking/complete'));
    }

    public function getHostBySeminar($id)
    {
        $seminar = Seminar::findOrFail($id)->hosts()->get();
        return $seminar;
    }
}
