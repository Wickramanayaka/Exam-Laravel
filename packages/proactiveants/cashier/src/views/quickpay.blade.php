@extends('cashier::layouts.app')
@php
    function checkPayment($enroll)
    {
        $pay = ProactiveAnts\Course\Payment::where('user_id', $enroll->user_id)->where('co_course_id', $enroll->co_course_id)->where('status','PAID')->where('payment_for_month',date('n'))->where('payment_for_year',date('Y'))->first();
        if($pay){
            return url(asset('images/icons/ok.png'));
        }
        return url(asset('images/icons/no.png'));
    }
    function checkPaymentForPayButton($enroll)
    {
        $pay = ProactiveAnts\Course\Payment::where('user_id', $enroll->user_id)->where('co_course_id', $enroll->co_course_id)->where('status','PAID')->where('payment_for_month',date('n'))->where('payment_for_year',date('Y'))->first();
        if($pay){
            return 'disabled';
        }
        return '';
    }
    if(!isset($user))
    {
        $user = new App\User();
    }
@endphp
@section('content')
<div class="container">
    <br>
    <form method="GET" action="#">
        <div class="input-group mb-3">
            <input autofocus type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" type="search" name="reg_number" placeholder="Search">
            <div class="input-group-append">
            <button class="btn btn-outline-success" type="submit"><span data-feather="search"></span> Search</button>
            </div>
        </div>
    </form>
</div>

<hr>
<div class="container">
    <div class="row">
        <div class="col-md-7 col-sm-12">
            <h5>Course Enroll</h5>
            <div class="card">
                <div class="card-body">
                  <p class="text-right">Payment for <b>{{date('F')}}</b> month</p>
                  <table class="table table-bordered">
                      @foreach ($user->enrolls as $enroll)
                      <tr>
                            <td>{{$enroll->course->name}}</td>
                            <td>
                                <img src="{{checkPayment($enroll)}}" alt="" width="30">
                            </td>
                            <td>
                                <form id="FormAtten" method="POST" action="{{url('cashier/course/quickpay/checkin')}}"
                                onsubmit="if(!confirm('Are you sure to make a check in?')){return false}">
                                    @csrf
                                    <input type="hidden" value="{{$enroll->co_course_id}}" name="course">
                                    <input type="hidden" value="{{$enroll->user_id}}" name="user">
                                    <button type="submit" class="btn btn-danger">Check in</button>
                                </form>
                            </td>
                            <td>
                                <form id="formPay" method="POST" action="{{url('cashier/course/quickpay/pay')}}"
                                onsubmit="if(!confirm('Are you sure to make a payment?')){return false}">
                                    @csrf
                                    <input type="hidden" value="{{$enroll->co_course_id}}" name="course">
                                    <input type="hidden" value="{{$enroll->user_id}}" name="user">
                                    <button type="submit" class="btn btn-primary" {{checkPaymentForPayButton($enroll)}}>Pay now</button>
                                </form>
                            </td>
                        </tr>
                      @endforeach
                  </table>
                  
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-12">
            <h5>Personal Details</h5>
            <div class="card bg-primary text-light">
                <div class="card-body">
                  <h5 class="card-title">Full Name : </h5>
                  <p class="card-text">{{$user->name}}</p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item bg-primary text-light">Reg Number : {{$user->reg_number}}</li>  
                  <li class="list-group-item bg-primary text-light">Address : {{$user->address_line}}</li>
                  <li class="list-group-item bg-primary text-light">Telephone : {{$user->telephone}}</li>
                  <li class="list-group-item bg-primary text-light">School : {{$user->school}}</li>
                </ul>
                <div class="card-body">
                  <a href="{{url('cashier/usr/'.$user->id.'/view')}}" class="btn btn-danger btn-block">More info...</a>
                </div>
              </div>
        </div>
    </div>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col-12">
            
            @php
                $period = \Carbon\CarbonPeriod::create(\Carbon\Carbon::now()->startOfMonth(),\Carbon\Carbon::now()->endOfMonth());
            @endphp
            <div class="table-responsive">
                <table class="table table-bordered table-dark">
                    <tr>
                        <td>Attendance for <b>{{date('F')}}</b></td>
                        @foreach ($period as $date)
                            
                            @php
                                $color = "dark";
                                foreach ($user->monthAttendances as $checkin) {
                                   if($date->format('Y-m-d')==$checkin->check_in->format('Y-m-d')){
                                    $color = "primary";
                                   }
                                }
                            @endphp
                            <td class="bg-@php echo $color; @endphp text-center">{{$date->format('d')}}<br>{{$date->format('D')}}</td>
                        @endforeach
                    </tr>
                </table>
            <div class="table-responsive">
        </div>
    </div>
</div>
<br><br>
@endsection