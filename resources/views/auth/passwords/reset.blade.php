@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12 text-center">
            <br><br>
            <h3 class="h3 font-weight-bold">{{ __('මුරපදය යළි සකසන්න') }}</h3>
            <br>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">

                        <label for="email"><h5>{{ __('විද්යුත් තැපෑල') }}</h5></label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                </div>

                <div class="form-group">

                        <label for="password"><h5>{{ __('මුරපදය') }}</h5></label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <div class="form-group">

                        <label for="password-confirm"><h5>{{ __('මුරපදය තහවුරු කරන්න') }}</h5></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                </div>

                <div class="form-group">
                        <button type="submit" class="btn btn-outline-danger btn-lg">
                            {{ __('මගේ ගිණුමට ඇතුළු වන්න') }}
                        </button>
                </div>
            </form>

    </div>
</div>
<br><br>
<!-- Advertisement Bottom -->
<div class="container">
  <div class="row justify-content-center">
    @foreach ($advertisement as $item)
        @if ($item->adv_category_id==4)
            <div class="col-md-3 col-sm-12 p-2">
                <img src="{{url('/avt/store_image/fetch_image')}}/{{$item->id}}" class="img-fluid" alt="">
            </div>
        @endif
    @endforeach
  </div>
</div>
@endsection
