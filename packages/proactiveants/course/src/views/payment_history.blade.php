@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h3>ගෙවීම් ඉතිහාසය </h3>
                <br>
                <table class="table table-bordered">
                    <tr>
                        <th>Course</th><th>Date</th><th>Payment</th><th>Method</th><th>Slip</th>
                    </tr>
                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{$payment->course->name}}</td>
                            <td>{{$payment->date}}</td>
                            <td>{{$payment->amount}}</td>
                            <td>{{$payment->method}}</td>
                            <td>
                                @if ($payment->method=="Online" || $payment->method=="Deposit")
                                    <a href="{{url('/adm/course/payment/download')}}/{{$payment->id}}">download</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection    