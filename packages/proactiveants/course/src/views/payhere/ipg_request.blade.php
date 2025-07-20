<html>
<body>
<form method="post" action="{{Config::get('course.sandbox')}}" id="ext-merchant-frm" style="display: none">   
    <input type="hidden" name="merchant_id" value="{{Config::get('course.merchant_id')}}">
    <input type="hidden" name="return_url" value="{{Config::get('course.return')}}">
    <input type="hidden" name="cancel_url" value="{{Config::get('course.cancel')}}">
    <input type="hidden" name="notify_url" value="{{Config::get('course.notify')}}">  
    {{--<input type="hidden" name="hash" value="{{hash}}"> --}}
    <br><br>Item Details<br>
    <input type="text" name="order_id" value="{{$payment->id}}">
    <input type="text" name="items" value="{{$payment->id}}"><br>
    <input type="text" name="currency" value="LKR">
    <input type="text" name="amount" value="{{$payment->amount}}">  
    <br><br>Customer Details<br>
    <input type="text" name="first_name" value="{{$payment->user->first_name}}">
    <input type="text" name="last_name" value="{{$payment->user->last_name}}"><br>
    <input type="text" name="email" value="{{$payment->user->email}}">
    <input type="text" name="phone" value="{{$payment->user->telephone}}"><br>
    <input type="text" name="address" value="{{$payment->user->address_line}}">
    <input type="text" name="city" value="{{$payment->user->city}}">
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

    
