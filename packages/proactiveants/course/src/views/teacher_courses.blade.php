@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <img src="{{url('/course/teacher/store_image/fetch_image')}}/{{$teacher->id}}" alt="" class="img-fluid">
            </div>
            <div class="col-md-8 col-sm-12">
                <h5>{{$teacher->name}}</h5>
                {!! $teacher->description !!}
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h3>ඔබගේ පන්තිය තෝරා ගන්න</h3>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card-deck">
                    @php
                        $i=0;
                    @endphp
                    @foreach ($teacher->courses as $course)
                        @if ($course->publish==1)
                            <div class="card hilight">
                                <div class="card-header">
                                    <p class="card-title text-center"><a href="{{url('/course')}}/{{$course->slang}}"><b>{{$course->name}}</b></a></p>
                                </div>
                                <div class="card-body text-center">
                                    <p>{{$course->day}}<br>{{$course->time}}</p>
                                    <a href="{{url('/course')}}/{{$course->slang}}" class="stretched-link"></a>
                                </div>
                                <div class="card-footer text-center">
                                    <p>රු. {{$course->fee}}</p>
                                </div>
                            </div>
                            @php
                                $i++;
                                if($i%6==0){
                                    echo "</div><br><div class='card-deck'>";
                                }
                            @endphp
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection