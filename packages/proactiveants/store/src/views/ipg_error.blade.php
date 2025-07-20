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
        <div class="col-md-4 col-sm-12 text-center">
            <div class="card">
                <img src="{{asset('images/icons/payment-cancel.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Your payment did not go well</h5>
                  <p class="card-text text-secondary">Looks like something went wrong.</p>
                  <a href="{{url('bookshop/cart')}}" class="btn btn-danger">Back to Cart</a>
                  <p class="card-text text-danger pt-3"><small>Check what we've got for you</small></p>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection