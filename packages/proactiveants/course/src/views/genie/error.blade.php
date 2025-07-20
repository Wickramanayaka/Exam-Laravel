@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-sm-12 text-center">
                <div class="card" style="width: 36rem;">
                    <img class="card-img-top" src="{{asset('images/ipg_error.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                      <h3 class="card-title"><b>කාඩ් පත් ගෙවීමේ දෝෂයකි</b></h3>
                        <p class="card-text">
                            ඔබගේ කාඩ්පත් ගෙවීම නිසි පරිදි සිදු නොවීය, කරුණාකර පහත බොත්තම ක්ලික් කර නැවත උත්සාහ කරන්න
                        </p>
                      <a href="{{url('/')}}" class="btn btn-primary">Go Home</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection