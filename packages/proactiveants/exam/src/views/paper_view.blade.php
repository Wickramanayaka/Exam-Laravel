@extends('layouts.app')

@section('content')
<div class="container" id="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-sm-12 text-right">
            <img src="{{asset('images/exam/paper_left.jpg')}}" alt="" class="img-fluid">
        </div>
        <div class="col-md-6 col-sm-12 text-center align-self-center">
            <h4>{{$course->name}}</h4>
            <h5>{{$paper->name}}</h5>
            <h5>කාල සීමාව : <span class="text-danger">මිනිත්තු {{$paper->questions->sum('pivot.duration')}}</span></h5>
            <h5>ප්‍රශ්න ගණන : <span class="text-danger">{{$paper->questions->count()}}</span></h5>
            <h5>ලකුණු : <span class="text-danger">{{$paper->questions->sum('pivot.mark')}}</span></h5>
            <a href="{{url('exam/c/'.$course->id.'/p/'.$paper->id.'/begin')}}#container" class="btn btn-primary">දැන් පටන් ගන්න</a>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        @if(auth()->check()){
            $('.add-to-cart').on('click',function(){addToCart(this);});
        }
        @else{
            $('.add-to-cart').on('click',function(){$('#need-to-login').modal('show');});
        }
        @endif
        function addToCart(event){
            //console.log(event.id);
            $.post('{{url("bookshop/cart/add")}}',
            {
                id: event.id,
                qty: 1,
            },
            function(data, status){
                $('#added-to-cart').modal('show');
            })
            .fail(function(response){
                window.location.href = "/email/verify#container";
            });
        }
    </script>
@endsection