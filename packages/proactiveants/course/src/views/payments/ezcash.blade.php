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
                <a href="{{url('/course/teacher')}}/{{$course->teacher->slang}}" class="btn btn-outline-danger btn-lg"><h3>නැවතත් කාලසටහන වෙතට</h3></a>
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
            <div class="col text-center">
                <h3>Ez Cash / M Cash</h3>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 col-sm-12 text-center">
                <h5>Instruction image</h5>
            </div>
            <div class="col-md-6 col-sm-12 text-center">
                <h5>Instruction video</h5>
            </div>
        </div>
        <br>
        <div class="row align-items-center">
            <div class="col-md-12 col-sm-12 text-center">
                <a href="{{url('/course/teacher')}}/{{$course->teacher->slang}}" class="btn btn-outline-danger btn-lg"><h3>ගෙවන්න</h3></a>
            </div>
        </div>
    </div>
@endsection