<?php

namespace ProactiveAnts\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function history()
    {
        $user = Auth::user();
        $orders = Order::where('user_id',$user->id)->whereIn('status',['DISPATCHED','PAID', 'CHECKEDOUT','CANCELED'])->orderBy('date','desc')->get();
        return view('store::user_order_list', compact('orders'));
    }
}