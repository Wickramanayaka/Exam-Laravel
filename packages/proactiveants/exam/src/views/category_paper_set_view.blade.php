@extends('layouts.app')

@section('content')
<div class="container" id="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 text-center">
            <h4 class="display-4 font-weight-bold">විභාග</h4>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-3 col-sm-12">
            @include('exam::partials.left_side_paper_set')
        </div>
        <div class="col-md-9 col-sm-12 text-center border-left">
            <h3 class="h3 font-weight-bold">{{$category->name}}</h3>
            <br>
            <p><b>උත්සාහ කිරීමට ප්‍රශ්න පත්‍රය මත ක්ලික් කරන්න.</b></p>
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