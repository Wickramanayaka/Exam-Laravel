@extends('layouts.app')

@section('content')
<div class="container">
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12 text-center">
            <h3 class="h3 font-weight-bold text-danger">Login</h3>
            <br><br>
            {{--@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif--}}
            <form method="POST" action="{{ route('login') }}" onsubmit="(function(){$('#submit').attr('disabled',true); return true;})();">
                @csrf

                    <div class="form-group">
                        <label for="formGroupExampleInput"><h5>ජංගම දුරකථන අංකය ( Mobile Phone Number ) </h5></label>
                        <input type="text" class="form-control @error('telephone') is-invalid @enderror" placeholder="ජංගම දුරකථන අංකය Eg: 0771234567" name="telephone" id="telephone" value="{{old('telephone')}}" autofocus required autocomplete="off">
                        @error('telephone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput"><h5>මුරපදය ( Password ) </h5></label>
                        <input type="password" class="form-control @error('telephone') is-invalid @enderror" placeholder="මුරපදය" name="password" id="password" required autocomplete="off">
                        @error('telephone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col">
                      <button class="btn btn-danger btn-lg" type="submit" id="submit">මාගේ ගිණුමට ප්‍රවේශ වීමට</button>
                    </div>
                
            </form>
            <h3><a href="{{url('/register')}}">ලියාපදිංචි නොවූ සිසුන් දැන්ම ලියාපදිංචි වන්න</a></h3>
            <hr>
            <h3><b><a href="{{url('/forgotpassword')}}">මුර පදය අමතක නම් මෙතන Click කරන්න.</a></b></h3>
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
