@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 text-center">
            <h4 class="display-4 font-weight-bold">පොත් හල</h4>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-3 col-sm-12">
            @include('store::partials.left_side_category')
        </div>
        <div class="col-md-9 col-sm-12 text-center border-left">
            @foreach ($tags as $tag)
                <h3 class="h3 font-weight-bold bg-secondary text-light p-2">{{$tag->name}}</h3>
                <br>
                <div class="card-deck">
                    @php
                        $i=0;
                    @endphp
                    @foreach ($tag->products as $product)
                        @if($product->published=="Yes")
                            <div class="card mt-1" style="max-width: 11.5rem;">
                                <a href="{{url('bookshop/p/' .$product->slang)}}#container"><img src="{{url('bookshop/store_image/fetch_image')}}/{{$product->id}}" alt="" class="card-img-top img-thumbnail" width="100"></a>
                                <div class="card-body">
                                <p class="card-title"><a href="{{url('bookshop/p/' .$product->slang)}}#container">{{$product->name}}</a></p>
                                <p class="card-text font-weight-bold">
                                    @if($product->discount>0)
                                    <span class="text-secondary"><strike>{{$product->price}}</strike></span>
                                    @endif
                                    රු. {{number_format($product->price - ($product->price*$product->discount/100),2)}}
                                </p>
                                </div>
                                <div class="card-footer">
                                    <button id="{{$product->id}}" class="btn btn-orange btn-block {{$product->quantity?"":"disabled"}} add-to-cart">Add to Cart</button>
                                </div>
                            </div>
                       @php
                            $i++;
                           if($i%4==0){
                               echo "</div><div class='card-deck'>";
                           }
                       @endphp
                       @endif
                    @endforeach
                </div>
                <br><br>
            @endforeach
            @include('store::partials.feature')
            @include('store::partials.added_to_cart_toast')
            @include('store::partials.need_to_logging_toast')
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