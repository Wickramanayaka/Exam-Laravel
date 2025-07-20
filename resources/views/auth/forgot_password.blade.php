@extends('layouts.app')

@section('content')
<div class="container">
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12 text-center">
            <h3 class="h3 font-weight-bold text-danger">මුර පදය අමතක වී ඇත (Forgot Password)</h3>
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
            <form method="POST" action="{{ route('otp') }}">
                @csrf

                <div class="form-group">
                    <label for="formGroupExampleInput"><h5>ජංගම දුරකථන අංකය (Mobile Number)</h5></label>
                    <input type="text" class="form-control @error('telephone') is-invalid @enderror" placeholder="Telephone Number Eg: 0771234567" name="telephone" id="telephone" value="{{old('telephone')}}" autofocus required autocomplete="off">
                    @error('telephone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col">
                  <button id="submit" class="btn btn-danger btn-lg" type="submit">යොමු කරන්න</button>
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
