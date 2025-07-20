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
        <div class="row align-items-center">
            <div class="col-md-6 col-sm-12 ">
                <a href="{{url('/course')}}/{{$course->slang}}/payment/method" class="btn btn-outline-danger btn-lg"><h3>මුදල් ගෙවීමේ ක්‍රම තෝරා ගැනීමට</h3></a>
            </div>
            <div class="col-md-6 col-sm-12">
                <p style="font-size:1.5rem;">
                   <b>මෙම පන්තිය සඳහා ලියාපදිංචි වීමට අදාළ මාසය සඳහා තිරයේ දිස්වන මුදල් ප්‍රමාණය ගෙවිය යුතුය.</b><br><br>
                    ඔබට මුදල් ගෙවීම් සදහා ක්‍රම රැසක් ම තිබේ.</p>
                    <ol style="font-size:1.25rem;">
                        <li>ඔබේ බැංකු කාඩ්පත මගින් (Visa/Master)</li>
                        <li>ගිණුමට මුදල් තැන්පත් කර රිසිට් පත upload කිරිම මගින්</li>
                    </ol>
                    <p style="font-size:1.25rem;">සුදුසු ක්‍රමයක් තොර ගැනීමට "මුදල් ගෙවීමේ ක්‍රම තෝරා ගැනීම" බටනය මත Click කරන්න.</p>
                </p>
            </div>
        </div>
    </div>
@endsection