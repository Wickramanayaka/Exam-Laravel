@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h4 class="display-4 font-weight-bold">{{$grade_subject->grade->name}} - {{$grade_subject->subject->name}}</h4>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-4" style="overflow-y: scroll; height:750px;">
            <div class="row">
                <div class="col">
                    <div class="card bg-primary text-light">
                        <div class="card-body text-center">
                            <h1>විෂය සාරාංශය</h1>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body  bg-danger text-light">
                            <h4 class="card-title text-center">මිල රු. {{$units->sum('price')}} පමණයි</h4>
                            <h6 class="card-subtitle text-center">මෙම විෂය සඳහා පාඩම් {{count($units)}} ක් ඇතුළත් වේ</h6>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($units as $item)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <h5 style="margin-bottom: 0px;">{{$item->number}}. {{$item->name}}</h5>
                                        </div>
                                    </div>

                                    @foreach ($item->videos as $v)
                                        <div class="row">
                                            <div class="col ml-4" style="margin-bottom: -20px;">
                                                <p><a href="{{url('lsn/vdo').'/'.$v->slang}}#player" class="play"><i class="fas fa-video fa-fw"></i> {{$v->name}}</a>
                                                    @if ($v->free==1) 
                                                        <span class="badge badge-primary pt-1">FREE</span>
                                                    @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </li>
                            @endforeach
                        </ul>
                        <div class="card-body">
                          <a href="{{url('lsn/gs/'.$grade_subject->slang.'/buy')}}" class="btn btn-orange btn-block btn-lg buy">මිලදි ගන්නට</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @if(isset($video))
                @include('lesson::partials.video_player')
            @else
                @include('lesson::partials.lesson_intro')
            @endif
        </div>
    </div>
</div>
@include('lesson::partials.need_to_logging_toast')
@include('lesson::partials.need_to_purchase_toast')
@endsection
@section('javascript')
    <script>
        @if(auth()->check()){
        
        }
        @else{
            $('.buy').on('click',function(event){event.preventDefault(); $('#need-to-login').modal('show');});
            $('.play').on('click',function(event){event.preventDefault(); $('#need-to-login').modal('show');});
        }
        @endif
        @if(Session::has('purchse_required'))
        $(document).ready(function(){
            $("#need-to-purchase").modal('show');
        });
        @endif

    </script>
    
@endsection