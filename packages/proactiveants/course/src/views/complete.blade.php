@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-sm-12 text-center">
                <div class="card" style="width: 36rem;">
                    <img class="card-img-top" src="{{asset('images/thank_you.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                      <h3 class="card-title">කාඩ් පත් ගෙවීම සාර්ථකයි</h3>
                        <p class="card-text">
                            ඔබගේ කාඩ්පත් ගෙවීම සාර්ථකයි. පංතිය ඇතුළට යාමට කරුණාකර පහත බොත්තම ක්ලික් කරන්න
                        </p>
                      <a href="{{url('/course')}}/{{$payment->course->slang}}" class="btn btn-primary">Go to Class</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection