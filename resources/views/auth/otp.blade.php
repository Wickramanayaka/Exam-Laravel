@extends('layouts.app')

@section('content')
<div class="container">
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12 text-center">
            <h3 class="h3 font-weight-bold text-danger">මුර පදය වෙනස් කිරීමට</h3>
            <br><br>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('password_reset') }}">
                @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput"><h5>SMS මාර්ගයෙන් ඔබට ලැබී ඇති OTP කේතය ඇතුළත් කරන්න.</h5></label>
                        <input type="text" class="form-control @error('otp') is-invalid @enderror" placeholder="OTP Code" name="otp" id="otp" value="{{old('otp')}}" autofocus required autocomplete="off">
                        @error('otp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                          <label for="password"><h5>නව මුරපදය (Password)</h5></label>
                          <input type="text" name="password" id="password" class="form-control" required autocomplete="password" placeholder="Password">
                          <small class="form-text text-muted" id="password">මෙම මුරපදය ඔබ විසින් දරුවාට පහසුවන පරිදි යොදා ගන්න මෙය හොඳින් මතක තබා ගත යුතු අතර එය දැමීමට පෙර හොඳින් නිරීක්ෂණය කරන්න.</small>
                    </div>
                    <input type="hidden" name="username" value="{{$username}}">
                    <div class="form-group col">
                      <button id="submit" class="btn btn-danger btn-lg" type="submit">මුර පදය වෙනස් කරන්න</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- Advertisement Bottom -->
<div class="container mt-5">
    <div class="row justify-content-center">
        @foreach ($advertisement as $item)
            @if ($item->adv_category_id==2)
                <div class="col-md-3 col-sm-12 p-2">
                    <img src="{{url('/avt/store_image/fetch_image')}}/{{$item->id}}" class="img-fluid" alt="">
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection
