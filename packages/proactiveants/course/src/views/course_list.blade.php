@extends('layouts.app')
@section('content')
    @foreach ($teachers as $teacher)
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <img src="{{url('/course/teacher/store_image/fetch_image')}}/{{$teacher->id}}" alt="" class="img-fluid">
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="card-deck">
                        @php
                            $i=0;
                        @endphp
                        @foreach ($teacher->courses as $course)
                            @if ($course->publish==1)
                                <div class="card hilight">
                                    <div class="card-body">
                                    <p class="card-title text-center"><a href="{{url('/course/teacher')}}/{{$teacher->slang}}"><b>{{$course->name}}</b></a></p>
                                    </div>
                                </div>
                                @php
                                    $i++;
                                    if($i%5==0){
                                        echo "</div><br><div class='card-deck'>";
                                    }
                                @endphp
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <br>
        </div>
    @endforeach
@endsection