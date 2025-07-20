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
        <div class="col">
            <div class="card bg-primary text-white p-2">
                <h5>ඔබගේ ඇණවුම් ඉතිහාසය</h5>
            </div>
            <br><br>
            <ul class="list-unstyled">
                @foreach ($orders as $order)
                    @foreach ($order->products as $item)
                        <li class="media">
                            <img class="mr-3" src="{{url('bookshop/store_image/fetch_image')}}/{{$item->product->id}}" alt="Generic placeholder image" width="150">
                            <div class="media-body">
                                <div class="row">
                                    <div class="col">
                                        <p class="mt-0 mb-1"><b>{{$item->product->name}}</b></p>
                                        <p class="small">ISBN {{$item->product->code}}</p>
                                    </div>
                                    <div class="col-3 text-right">
                                        <p class="text-success font-weight-bold">රු. {{number_format($item->amount,2)}}<br>
                                            <span class="text-danger small">- රු. {{number_format($item->price*($item->discount)/100*$item->quantity,2)}}</span><br>
                                            <span class="text-secondary small">Qty. {{$item->quantity}}</span>
                                        </p>
                                    </div>
                                    <div class="col-3 text-right">
                                        <p>
                                            Order @ {{$order->date}}<br><span class="text-primary small font-weight-bold">Status: {{$order->status}}</span><br>
                                            <span class="text-info small">Payment method:  {{$order->payment_type}}</span><br>
                                            <span class="text-secondary small">Delivery type:  {{$order->delivery_type}}</span>
                                        </p>
                                    </div>
                                </div>
                                
                            </div>
                        </li>
                        <hr>
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection