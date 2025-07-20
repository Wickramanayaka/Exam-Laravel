@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-12">
                <img src="{{url('/course/teacher/store_image/fetch_image')}}/{{$course->teacher->id}}" alt="" width="150">
            </div>
            <div class="col-md-10 col-sm-12">
                <h5>{{$course->teacher->name}}</h5>
                {!! $course->teacher->description !!}
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{url('/course/teacher')}}/{{$course->teacher->slang}}" class="btn btn-outline-danger btn-lg"><h3>නැවතත් පන්ති තෝරා ගැනීම වෙත</h3></a>
                <br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <table class="table table-bordered text-center">
                    <tr style="font-size:1rem;">
                        <td>{{$course->name}}</td><td>{{$course->day}}<br>{{$course->time}}</td><td>රු. {{$course->fee}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-10 offset-md-1 col-sm-12">
                <table class="table table-borderless">
                    <tr>
                        <td class="align-middle">
                            <a href="{{url('/course')}}/{{$course->slang}}/payment/cards" class="btn btn-outline-danger btn-lg btn-block"><h3>කාඩ්පත මගින් <br>මුදල් ගෙවන්න</h3></a>
                        </td>
                        <td>
                            <img src="{{asset('/images/payments/cards.jpg')}}" class="img-fluid" alt="">
                        </td>
                    </tr>
                    {{--<tr>
                        <td class="align-middle">
                            <a href="#" class="btn btn-outline-danger btn-lg btn-block"><h3>M Cash</h3></a>
                        </td>
                        <td>
                            <h5>0712408287 (Chathuranga Abewardhana)</h5>
                        </td>
                    </tr>--}}
                    <tr>
                        <td class="align-middle">
                            <a href="{{url('/course')}}/{{$course->slang}}/payment/deposit" class="btn btn-outline-danger btn-lg btn-block"><h3>Bank Deposit / Online Transfer / පංති කාඩ්පත්</h3></a>
                        </td>
                        <td>
                            {{--<h5>79746186 | P.V.G.C.Abewardhna |BOC – Ratnapura</h5>--}}
                        </td>
                    </tr>
                    {{--<tr>
                        <td class="align-middle">
                            <a href="#" class="btn btn-outline-danger btn-lg btn-block"><h3>ඔබට මුදල් ගෙවා ලියාපදිංචි විය හැකි ආයතන</h3></a>
                        </td>
                        <td>
                            <ul>
                                <li>නිව් සිග්මා - රත්නපුර (බණ්ඩාරනායක මාවත) | 071 615 9759</li>
                                <li>සිසුල්යා - රත්නපුර (බණ්ඩාරනායක මාවත) | 071 297 1717</li>
                                <li>විස්නි - ඇහැළියගොඩ (කොත්විල පාර) | 077 659 4374</li>
                                <li>සිසුල්යා - කුරුවිට (Food City උඩුමහල) | 071 520 1717</li>
                                <li>නැණෙක් - පැල්මඩුල්ල (ඔරලෝසු කනුව අසල) | 071 226 5515</li>
                                <li>සිප්වින් - කහවත්ත (කෙලින් විදිය) | 071 941 8969</li>
                                <li>ස්මාර්ට් - නිවිතිගල (ලංකා බැංකුව ඉදිරිපිට) | 070 489 0625</li>
                            </ul>
                        </td>
                    </tr>--}}
                    {{--<tr>
                        <td class="align-middle">
                            <img src="{{asset('images/adm/qr.jpg')}}" alt="" class="img-fluid" width="250">
                        </td>
                        <td>
                            <h3>QR code</h3>
                            <h5>මෙම ක්‍රමය මගින් මුදල් ගෙවා එහි Scheen shot  ලබාගෙන එය ඉහත සඳහන් " බැංකු තැන්පතු " යටතේ උඩුගත කරන්න</h5>
                        </td>
                    </tr>--}}
                </table>
            </div>
        </div>
        <br>
        
    </div>
@endsection