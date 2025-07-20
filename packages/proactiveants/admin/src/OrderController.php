<?php

namespace ProactiveAnts\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use ProactiveAnts\Store\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::where('status','<>','OPEN')->orderBy('date', 'desc')->paginate(50);
        $keyword = '';
        if($request->has('keyword')){
            $orders = Order::where('status','<>','OPEN')->orderBy('date', 'desc')
            ->where('id',$request->keyword)
            ->orWhere('date',$request->keyword)
            ->paginate(50);
            $keyword = $request->keyword;
        }
        return view('admin::store.order_list', compact('orders','keyword'));
    }

    /**
     * AJAX call return with view
     */
    public function view($id)
    {
        $order = Order::findOrFail($id);
        return (string) view('admin::store.partials.view_order', compact('order'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:store_orders,id'
        ]);
        $order = Order::findOrFail($request->id);
        $order->status = $request->status;
        $order->save();
        return redirect()->back();
    }
}