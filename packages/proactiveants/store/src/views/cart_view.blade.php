@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" id="container">
        <div class="col-md-12 text-center">
            <h4 class="display-4 font-weight-bold">පොත් හල</h4>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-12">
            <div class="card bg-primary text-white text-center">
                <h4>ඇනවුම් සාරාංශය</h4>
            </div>
            <br>
            <table class="table table-sm font-weight-bold">
                <tr>
                    <td>Value/ වටිනාකම</td><td class="text-right">රු. {{number_format($order->products->sum('amount'),2)}}</td>
                </tr>
                <tr>
                    <td>Quantity/ ප්‍රමාණය</td><td class="text-right">{{$order->products->sum('quantity')}}</td>
                </tr>
                <tr>
                    <td>Delivery Charge/ බෙදාහැරීම් ගාස්තු</td><td class="text-right" id="delivery-charge"></td>
                </tr>
                <tr class="bg-warning text-dark" style="font-size:1rem;">
                    <td>Total/ එකතුව</td><td class="text-right" id="total"></td>
                </tr>
            </table>
            <h5 class="lead">Items/ අඩංගු දේ</h5>
            <br>
            @if (!$order==null)
                @foreach ($order->products as $product)
                    <div class="media" id="{{$product->id}}">
                        <img src="{{url('bookshop/store_image/fetch_image')}}/{{$product->product->id}}" class="align-self-start mr-3" alt="..." width="75">
                        <div class="media-body">
                        <p>{{$product->product->name}}</p>
                        <div class="row">
                            <div class="col">
                                @if($product->discount>0)
                                    <span class="text-secondary"><strike>{{$product->price}}</strike></span>
                                    @endif
                                රු. {{number_format($product->price - ($product->price*$product->discount/100),2)}}
                            </div>
                            <div class="col-3">
                                Qty. {{$product->quantity}}
                            </div>
                        </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            @endif
        </div>
        <div class="col-md-8 col-sm-12 border-left">
            <form method="POST" action="{{url('bookshop/cart/checkout')}}">
                @csrf
                <div class="card card-sm bg-primary text-white text-center" style="width: 15rem">
                    <h4>ලබන්නාගේ  විස්තර</h4>
                </div>
                <br>
                <div class="form-group row">
                    <label for="first_name" class="col-sm-4 col-form-label required">First Name/ මුල් නම</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="last_name" class="col-sm-4 col-form-label required">Last Name/ අවසන් නම</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="last_name" name="last_name" required value="{{$user->last_name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label required">Email/ විද්‍යුත් තැපෑල</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" required value="{{$user->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telephone" class="col-sm-4 col-form-label required">Phone number / දුරකථන අංකය </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="telephone" name="telephone" required value="{{$user->telephone}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address_line" class="col-sm-4 col-form-label required">Address/ ලිපිනය</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="address_line" name="address_line" required value="{{$user->address_line}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="street" class="col-sm-4 col-form-label">Street/ වීදිය</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="street" name="street" value="{{$user->street}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="city" class="col-sm-4 col-form-label required">City/ ආසන්නතම නගරය</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="city" name="city" required value="{{$user->city}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="district" class="col-sm-4 col-form-label">District/ දිස්ත්‍රික්කය</label>
                    <div class="col-sm-8">
                        <select name="district" id="district" class="form-control">
                            <option value='Ampara' {{$user->district=="Ampara"?"selected":""}}>Ampara</option>
                            <option value='Anuradhapura' {{$user->district=="Anuradhapura"?"selected":""}}>Anuradhapura</option>
                            <option value='Badulla' {{$user->district=="Badulla"?"selected":""}}>Badulla</option>
                            <option value='Batticaloa' {{$user->district=="Batticaloa"?"selected":""}}>Batticaloa</option>
                            <option value='Colombo' {{$user->district=="Colombo"?"selected":""}}>Colombo</option>
                            <option value='Galle' {{$user->district=="Galle"?"selected":""}}>Galle</option>
                            <option value='Gampaha' {{$user->district=="Gampaha"?"selected":""}}>Gampaha</option>
                            <option value='Hambantota' {{$user->district=="Hambantota"?"selected":""}}>Hambantota</option>
                            <option value='Jaffna' {{$user->district=="Jaffna"?"selected":""}}>Jaffna
                            <option value='Kalutara' {{$user->district=="Kalutara"?"selected":""}}>Kalutara</option>
                            <option value='Kandy' {{$user->district=="Kandy"?"selected":""}}>Kandy</option>
                            <option value='Kegalle' {{$user->district=="Kegalle"?"selected":""}}>Kegalle</option>
                            <option value='Kilinochchi' {{$user->district=="Kilinochchi"?"selected":""}}>Kilinochchi
                            <option value='Kurunegala' {{$user->district=="Kurunegala"?"selected":""}}>Kurunegala</option>
                            <option value='Mannar' {{$user->district=="Mannar"?"selected":""}}>Mannar
                            <option value='Matale' {{$user->district=="Matale"?"selected":""}}>Matale</option>
                            <option value='Matara' {{$user->district=="Matara"?"selected":""}}>Matara</option>
                            <option value='Monaragala' {{$user->district=="Monaragala"?"selected":""}}>Monaragala</option>
                            <option value='Mullaitivu' {{$user->district=="Mullaitivu"?"selected":""}}>Mullaitivu</option>
                            <option value='Nuwara Eliya' {{$user->district=="Nuwara Eliya"?"selected":""}}>Nuwara Eliya</option>
                            <option value='Polonnaruwa' {{$user->district=="Polonnaruwa"?"selected":""}}>Polonnaruwa</option>
                            <option value='Puttalam' {{$user->district=="Puttalam"?"selected":""}}>Puttalam</option>
                            <option value='Ratnapura' {{$user->district=="Ratnapura"?"selected":""}}>Ratnapura</option>
                            <option value='Trincomalee' {{$user->district=="Trincomalee"?"selected":""}}>Trincomalee</option>
                            <option value='Vavuniya' {{$user->district=="Vavuniya"?"selected":""}}>Vavuniya</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8">
                        <label for="" class="text-danger">* පිරවීම සඳහා අනිවාර්ය ක්ෂේත්‍රය</label>
                    </div>
                </div>
                <br>
                <div class="card card-sm bg-primary text-white text-center" style="width: 20rem">
                    <h4>ඇනවුම ලබා ගන්නා ආකාරය</h4>
                </div>
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="delivery" id="delivery-pickup" value="pickup" checked>
                    <label class="form-check-label" for="pickup">
                        රු. 0.00 - Pickup - පොත් හලට පැමිණ රැගෙන යාම (වලංගු කාලය දින 7යි.)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="delivery" id="delivery-courier" value="courier">
                    <label class="form-check-label" for="courier">
                        රු. {{number_format($fee,2)}} - Courier - නිවසටම ලබා ගැනීම (වලංගු කාලය දින 7යි.)
                    </label>
                </div>
                <br>
                <div class="card card-sm bg-primary text-white text-center" style="width: 20rem">
                    <h4>ගෙවීම් කරන ආකාරය</h4>
                </div>
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment" id="payment-card" value="card" checked>
                    <label class="form-check-label" for="pickup">
                        අන්තර්ජාලය හරහා මුදල් ගෙවීමට (ඔබට මෙහි සඳහන් ඕනෑම ක්‍රෙඩිට් කාඩ් පතකින් හෝ eZCash/MCash මගින් මුදල් ගෙවිය හැක.)
                    </label>
                </div>
                <div class="form-check">
                    <input disabled class="form-check-input" type="radio" name="payment" id="payment-code" value="cod">
                    <label class="form-check-label" for="courier">
                        Cash On Delivery - භාන්ඩ නිවසට ගෙන ආ විට මුදල් ගෙවීම
                    </label>
                </div>
                <br>
                <div class="row">
                    <div class="col text-center">
                        <button class="btn btn-primary btn-lg" type="submit">මුදල් ගෙවීමට/ Payment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            $(".media").hover(function(){
            var id = $(this).attr('id');
            var url = "<a href='{{url("bookshop/cart/delete")}}/" + id + "#container'><i class='fa fa-times-circle fa-fw text-danger h4'></i></a>";
            $(this).append($(url));
            
            },function(){
                $(this).find("a").last().remove();
            });
            $("#total").html("රු. {{number_format($order->products->sum('amount'),2)}}");
            $('.form-check-input').click(function(){
                if($("#delivery-courier").is(':checked')){
                    $("#delivery-charge").html("රු. {{number_format($fee,2)}}");
                    $("#total").html("රු. {{number_format(($order->products->sum('amount') + 250),2)}}");
                    $("#payment-code").prop('disabled', false);
                }
                else{
                    $("#delivery-charge").html("රු.0.00");
                    $("#total").html("රු. {{number_format($order->products->sum('amount'),2)}}");
                    $("#payment-code").prop('disabled', true);
                    $("#payment-card").prop('checked', true);
                }
            });
        });
        
    </script>
@endsection