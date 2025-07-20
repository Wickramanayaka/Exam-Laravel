@component('mail::message')
Dear {{$order->user->first_name}},<br>
Here is your order invoice from {{config('app.name')}}.<br>
<hr>
Order Date: {{$order->date}}<br>
Order #: {{$order->id}}
@component('mail::table')
| Item                          | Qty                     | Amount                 |
| ----------------------------- | -----------------------:| ----------------------:|
@foreach ($order->products as $item)
| {{$item->product->name}}      | {{$item->quantity}}     | {{$item->price}}       |    
@endforeach 
@endcomponent
@component('mail::table')
|               |                                                                           |
| -------------:| -------------------------------------------------------------------------:|
| Sub Total:    | {{$order->products->sum('amount')}}                                       |
| Delivery Fee: | {{$order->delivery->amount}}                                              |
| Total:        | {{$order->products->sum('amount') + $order->delivery->amount}}            | 

@endcomponent
<hr>
Thanks,<br>
{{ config('app.name') }}
@endcomponent