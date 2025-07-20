<?php

namespace ProactiveAnts\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Image;
use Illuminate\Support\Facades\Response;
use Auth;
use ProactiveAnts\Store\DeliveryCharge;
use ProactiveAnts\Store\Delivery;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCompleted;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        if($user==null){
            return redirect(url('login'));
        }
        $order = Order::where('user_id', $user->id)->where('status', "OPEN")->first();
        if($order==null) 
        {
            return view('store::empty_cart');
        }
        $fee = DeliveryCharge::calculate($order);
        return view('store::cart_view', compact('order','fee','user'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:store_products,id'
        ]);
        $product = Product::findOrFail($request->id);
        // Check for open cart (cart means an open order)
        $user = Auth::user();
        if($user==null){
            return redirect(url('login'));
        }
        $order = Order::where('user_id', $user->id)->where('status', "OPEN")->first();
        if($order==null){
            // Create a new order
            $order = Order::create([
                'user_id' => $user->id,
                'date' => now(),
                'status' => "OPEN",
                'delivery_type' => 'NONE',
                'payment_type' => 'NONE'
            ]);
        }
        // Add product
        OrderProduct::create([
            'store_order_id' => $order->id,
            'store_product_id' => $product->id,
            'quantity' => $request->qty,
            'price' => $product->price,
            'discount' => $product->discount,
            'amount' => ($product->price * (100 - $product->discount)) / 100 * $request->qty
        ]);
        return "OK";
    }

    public function removeFromCart($id)
    {
        $user = Auth::user();
        if($user==null){
            return redirect(url('login'));
        }
        $item = OrderProduct::findOrFail($id);
        // Check item belong to user in open cart
        $order = Order::where('id', $item->store_order_id)->where('status','OPEN')->where('user_id', $user->id)->firstOrFail();
        if($order==null){
            // Forward to unauthorized
            abort(403, 'Unauthorized action.');
        }
        $item->delete();
        return redirect()->back();
    }

    public function checkout(Request $request)
    {
        //dd($request->all());
        $request->validate([
            "first_name" => "required|max:255",
            "last_name" => "required|max:255",
            "email" => "required|email",
            "telephone" => "required",
            "address_line" => "required",
            "city" => "required",
            "district" => "required",
            "delivery" => "required|in:pickup,courier",
            "payment" => "required|in:cod,card"
        ]);
        $data = $request->all();
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('status', "OPEN")->first();
        if($order==null) 
        {
            return view('store::empty_cart');
        }
        if($data['delivery']=="pickup"){
            $order->delivery_type = "PICKUP";
        }
        else{
            $order->delivery_type = "COURIER";
        }
        if($data['payment']=="cod"){
            $order->payment_type = "COD";
            $order->status = "CHECKEDOUT";
        }
        else{
            $order->payment_type = "CARD";
        }
        // Record delivery information
        // Delete exiting delivery record
        $delivery = Delivery::where('store_order_id', $order->id)->first();
        if(!$delivery==null){
            $delivery->delete();
        }
        Delivery::create([
            'amount' => DeliveryCharge::calculate($order),
            'store_order_id' => $order->id,
            "first_name" => $data['first_name'],
            "last_name" => $data['last_name'],
            "email" => $data['email'],
            "telephone" => $data['telephone'],
            "address_line" => $data['address_line'],
            "city" => $data['city'],
            "district" => $data['district'],
            "street" => $data['street']
        ]);
        $order->save();
        if($order->payment_type=="COD"){
            // Order complete
            Mail::to(Auth::user())->queue(new OrderCompleted($order));
            return redirect(url('bookshop/cart/complete#container'));
        }
        elseif($order->payment_type=="CARD"){
            // PayHere
            $amount = $order->products->sum('amount') + $order->delivery->amount;
            $hash = strtoupper (md5 ( config('store.merchant_id') . $order->id . $amount . config('store.currency') . strtoupper(md5(config('store.secret'))) ) );
            return view('store::ipg_request', compact('order','hash'));
        }
        else{
            abort(401, 'Unauthorized access');
        }
    }

    public function complete()
    {
        return view('store::complete');
    }
}