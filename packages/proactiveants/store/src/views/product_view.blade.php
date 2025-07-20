@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" id="container">
        <div class="col-md-12 text-center">
            <h4 class="display-4 font-weight-bold">පොත් හල</h4>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-3">
            @include('store::partials.left_side_category')
        </div>
        <div class="col-9 text-center border-left">
            @if($product->published=="Yes")
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{url('bookshop/store_image/fetch_image')}}/{{$product->id}}" alt="" class="card-img-top img-thumbnail" width="100">
                    </div>
                    <div class="col text-left">
                        <h3>{{$product->name}}</h3>
                        @if ($product->quantity > 0)
                            <h4><span class="badge badge-success">In Stock</span></h4>
                        @else
                            <h4><span class="badge badge-danger">Out of Stock</span></h4>
                        @endif
                        <div class="row">
                            <div class="col">
                                @if($product->discount>0)
                                    <p class="text-secondary"><strike>රු. {{$product->price}}</strike></p>
                                @endif
                                <h3>රු. {{number_format($product->price - ($product->price*$product->discount/100),2)}}</h3>
                            </div>
                            <div class="col">
                                <div class="form-group row">
                                    <label for="quantity" class="col-sm-2 col-form-label">ප්‍රමාණය</label>
                                    <div class="col-sm-6">
                                    <input type="number" class="form-control ml-2" id="quantity" name="quantity" placeholder="1" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card font-weight-bold">
                            <div class="card-body">
                            <table class="table table-borderless table-sm">
                                <tr>
                                    <td>ISBN</td><td>{{$product->code}}</td>
                                </tr>
                                <tr>
                                    <td>වර්ගය</td><td>{{$product->category->name}}</td>
                                </tr>
                                <tr>
                                    <td>කර්තෘ</td><td>{{$product->author}}</td>
                                </tr>
                                <tr>
                                    <td>ප්‍රකාශනය</td><td>{{$product->publisher}}</td>
                                </tr>
                                <tr>
                                    <td>වර්ෂය</td><td>{{$product->published_year}}</td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col text-center">
                                @if($product->quantity)
                                    <button id="{{$product->id}}" class="btn btn-orange btn-lg add-to-cart">Add to Cart</button>
                                    <a class="btn btn-orange btn-lg" href="{{url('bookshop/cart')}}#container">View Cart</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active p-2 text-left" id="home" role="tabpanel" aria-labelledby="home-tab">{{$product->description}}</div>
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <div class="row">
                    <div class="col text-left">
                        <h4>More Products</h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-3">
                            <div class="card mt-1">
                                <img src="{{url('bookshop/store_image/fetch_image')}}/{{$product->id}}" alt="" class="card-img-top img-thumbnail" width="100">
                                <div class="card-body">
                                    <p class="card-title"><a href="{{url('bookshop/p/' .$product->slang)}}#container">{{$product->name}}</a></p>
                                    <p class="card-text font-weight-bold">රු. {{$product->price}}</p>
                                    <button id="{{$product->id}}" class="btn btn-orange btn-block btn-sm add-to-cart" {{$product->quantity?"":"disabled"}}">Add to Cart</button>    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @include('store::partials.feature')
                @include('store::partials.added_to_cart_toast')
                @include('store::partials.need_to_logging_toast')
            @endif
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
            if($("#quantity").val()>0){
                //console.log(event.id);
                $.post('{{url("bookshop/cart/add")}}',
                {
                    id: event.id,
                    qty: $("#quantity").val(),
                },
                function(data, status){
                    $('#added-to-cart').modal('show');
                })
                .fail(function(response){
                    window.location.href = "/email/verify#container";
                });
            }
            else{
                alert("ප්‍රමාණය බිංදුවට වඩා වැඩි විය යුතුය.");
            }
        }
    </script>
@endsection