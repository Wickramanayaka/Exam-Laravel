<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use ProactiveAnts\Lesson\Subscription;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $subscriptions = Subscription::whereIn('status',['ACTIVE','INACTIVE'])->orderBy('date','desc')->paginate(50);
        $keyword = '';
        if($request->has('keyword')){
            $subscriptions = Subscription::where('status','ACTIVE')
            ->where(function($query) use ($request){
                $query->where('date',$request->keyword)
                ->orWhere('amount',$request->keyword);
            })
            ->orderBy('date','desc')->paginate(50);
            $keyword = $request->keyword;
        }
        return view('admin::lesson.listSubscription', compact('subscriptions','keyword'));
    }

    public function activate($id)
    {
        $sub = Subscription::findOrFail($id);
        if($sub->status=="ACTIVE"){
            $sub->status="INACTIVE";
        }
        else if($sub->status=="INACTIVE") {
            $sub->status="ACTIVE";
        }
        $sub->save();
        return redirect()->back();
    }
}