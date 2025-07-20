<html>
<body>
<form method="post" action="{{Config::get('store.sandbox')}}" id="ext-merchant-frm" style="display: none">   
    <input type="hidden" name="merchant_id" value="{{Config::get('store.merchant_id')}}">
    <input type="hidden" name="return_url" value="{{Config::get('store.return')}}">
    <input type="hidden" name="cancel_url" value="{{Config::get('store.cancel')}}">
    <input type="hidden" name="notify_url" value="{{Config::get('store.notify')}}">  
    {{--<input type="hidden" name="hash" value="{{hash}}"> --}}
    <br><br>Item Details<br>
    <input type="text" name="order_id" value="{{$order->id}}">
    <input type="text" name="items" value="{{$order->id}}"><br>
    <input type="text" name="currency" value="LKR">
    <input type="text" name="amount" value="{{$order->products->sum('amount') + $order->delivery->amount}}">  
    <br><br>Customer Details<br>
    <input type="text" name="first_name" value="{{$order->user->first_name}}">
    <input type="text" name="last_name" value="{{$order->user->last_name}}"><br>
    <input type="text" name="email" value="{{$order->user->email}}">
    <input type="text" name="phone" value="{{$order->user->telephone}}"><br>
    <input type="text" name="address" value="{{$order->user->address_line}}">
    <input type="text" name="city" value="{{$order->user->city}}">
    <input type="hidden" name="country" value="Sri Lanka"><br><br> 
    <input type="submit" value="Buy Now">   
</form>
<script>
    window.onload = function(){
        document.getElementById("ext-merchant-frm").submit();
    }
</script>
</body>
</html>

    
