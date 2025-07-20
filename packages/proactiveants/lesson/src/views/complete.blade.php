@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" id="container">
        <div class="col-md-12 text-center">
            <h4 class="display-4 font-weight-bold">පාඩම්</h4>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-12 text-center">
            <div class="card">
                <img src="{{asset('images/thank-you.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">අප සමඟ ව්‍යාපාර කිරීම ගැන ඔබට ස්තූතියි.</h5>
                  <p class="card-text text-secondary">ඔබගේ දායකත්වය දැන් සක්‍රිය කර ඇත.</p>
                  <a href="{{url('lsn/subscription/history')}}" class="btn btn-danger">දායකත්වය බැලීමට කරුණාකර මෙහි ක්ලික් කරන්න</a>
                  <p class="card-text text-danger pt-3"><small>Check what we've got for you</small></p>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
