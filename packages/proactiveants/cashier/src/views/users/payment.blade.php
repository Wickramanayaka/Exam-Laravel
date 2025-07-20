@php
    function checkPayment($enroll)
    {
        $pay = ProactiveAnts\Course\Payment::where('user_id', $enroll->user_id)->where('co_course_id', $enroll->co_course_id)->where('status','PAID')->where('payment_for_month',date('n'))->where('payment_for_year',date('Y'))->first();
        if($pay){
            return url(asset('images/icons/ok.png'));
        }
        return url(asset('images/icons/no.png'));
    }
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <link rel="icon" href="{{asset('images/favicon.jpg')}}" type="image/jpeg" sizes="16x16">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row pt-2">
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="{{asset('images/logo.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$user->name}}</h5>
                      <hr>
                      <p>Payment for <b>{{date('F')}}</b> month</p>
                      <table class="table table-bordered">
                          @foreach ($user->enrolls as $enroll)
                          <tr>
                                <td>{{$enroll->course->name}}</td>
                                <td>
                                    <img src="{{checkPayment($enroll)}}" alt="" width="30">
                                </td>
                            </tr>
                          @endforeach
                      </table>
                      <a href="{{url('cashier/course/quickpay?id=').$user->slang}}" class="btn btn-primary">Goto cashier</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</body>
</html>