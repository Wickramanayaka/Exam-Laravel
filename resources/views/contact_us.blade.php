@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12" >
          <img src="{{asset('images/backgrounds/contact_inner.jpg')}}" alt="" class="img-fluid">
        </div>
        <div class="col-md-4 col-sm-12 text-center">
          <h4 class="display-4 font-weight-bold">විමසීම්</h4>
          <form method="POST" action="{{route('contact.store')}}">
            @csrf
            <div class="form-group">
              <label for="name">ඔබගේ නම (Name)</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="email">විද්යුත් තැපෑල (Email Address)</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="telephone">දුරකථන (Mobile)</label>
              <input type="text" class="form-control" id="telephone" name="telephone" required>
            </div>
            <div class="form-group">
              <label for="message">පණිවුඩය (Message)</label>
              <textarea class="form-control" id="message" name="message" required></textarea>
            </div>
            <button type="submit" class="btn btn-danger btn-block">යවන්න (Send)</button>
          </form>
        </div>
    </div>
</div>
@endsection