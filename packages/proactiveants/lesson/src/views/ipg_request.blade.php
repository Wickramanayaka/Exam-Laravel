<html>
<body>
<form method="post" action="{{Config::get('lesson.sandbox')}}" id="ext-merchant-frm" style="display: none">   
    <input type="hidden" name="merchant_id" value="{{Config::get('lesson.merchant_id')}}">
    <input type="hidden" name="return_url" value="{{Config::get('lesson.return')}}">
    <input type="hidden" name="cancel_url" value="{{Config::get('lesson.cancel')}}">
    <input type="hidden" name="notify_url" value="{{Config::get('lesson.notify')}}">  
    {{--<input type="hidden" name="hash" value="{{hash}}"> --}}
    <br><br>Item Details<br>
    <input type="text" name="order_id" value="{{$subscription->id}}">
    <input type="text" name="items" value="{{$subscription->id}}"><br>
    <input type="text" name="currency" value="LKR">
    <input type="text" name="amount" value="{{$subscription->amount}}">  
    <br><br>Customer Details<br>
    <input type="text" name="first_name" value="{{$subscription->user->first_name}}">
    <input type="text" name="last_name" value="{{$subscription->user->last_name}}"><br>
    <input type="text" name="email" value="{{$subscription->user->email}}">
    <input type="text" name="phone" value="{{$subscription->user->telephone}}"><br>
    <input type="text" name="address" value="{{$subscription->user->address_line}}">
    <input type="text" name="city" value="{{$subscription->user->city}}">
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

    
