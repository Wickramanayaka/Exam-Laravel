@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-12">
                <img src="{{url('/course/teacher/store_image/fetch_image')}}/{{$course->teacher->id}}" alt="" width="150">
            </div>
            <div class="col-md-6 col-sm-12">
                <h5>{{$course->teacher->name}}</h5>
                <h6><b>{{$course->name}}</b></h6>
                <p>{{$course->day}} - {{$course->time}}</p>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
                <h3><b>වීඩියෝ නැරඹීම</b></h3>
            </div>
        </div>
        <div class="row">
            @foreach ($c_videos as $video)
            <div class="col-md-3 mt-2">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">{{$video->video->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">වීඩියෝ කාලය: {{$video->video->duration}}min</h6>
                    @php
                        $month = ['January','February','March','April','May','June','July','August','September','October','November','December'];
                    @endphp
                    <a href="#" class="btn btn-primary btn-block play" data-url='{{$video->video->url}}'><i class='fa fa-fw fa-play-circle'></i> Play</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
                <h3><b>online සැසියට සහභාගි වීම</b></h3>
                <br>
                <table class="table">
                    @foreach ($course->links as $item)
                        <tr>
                            <td class="text-left">{{$item->description}}</td><td><a href="{{$item->link}}&uname={{Auth::user()->reg_number.' - '.Auth::user()->name}}" target="_blank" class="btn btn-danger">Join meeting</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center">
                <h3><b>Materials</b></h3>
                <br>
                <table class="table">
                    @foreach ($course->materials as $item)
                        @if ($item->pivot->valid_for_month==date('m') && $item->pivot->valid_for_year==date('Y'))
                            <tr>
                                @if ($item->category->slang=="link")
                                    <td class="text-left">{{$item->name}}</td><td>{{$item->category->name}}</td><td>Valid for {{$item->pivot->valid_for_month}}/{{$item->pivot->valid_for_year}}</td><td><a href="{{$item->description}}" class="text-primary" target="_blank">link</a></td>
                                @else
                                    <td class="text-left">{{$item->name}}</td><td>{{$item->category->name}}</td><td>Valid for {{$item->pivot->valid_for_month}}/{{$item->pivot->valid_for_year}}</td><td><a href="{{url('lib/m')}}/{{$item->id}}" class="text-primary">download</a></td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
        <hr>
    </div>
    @include('course::partials.watch_video')
@endsection
@section('javascript')
<script>
   $('.play').on('click', function(e){
        e.preventDefault();
        var button = $(this);
        var url = button.data('url');
        console.log(url);
        var modal = $('#watch-video');
        $('#iframe').attr('src',url);
        modal.modal({
            show: true,
            keyboard: false,
            backdrop: 'static'
        });
   }); 
</script>
@endsection