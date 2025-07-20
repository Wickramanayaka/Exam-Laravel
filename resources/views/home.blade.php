@extends('layouts.app')
@section('content')
<!-- Carousel -->
{{--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('images/carousel/image-1.jpg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('images/carousel/image-2.jpg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('images/carousel/image-3.jpg')}}" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('images/carousel/image-4.jpg')}}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
--}}
<br><br>
<!-- Mid section -->
<div class="container">
      <div class="row justify-content-center">
          <div class="col-md-3 col-sm-12 text-left">
          </div>
          <div class="col-md-6 col-sm-12 align-self-center text-center">
              
              @if (Auth::check())
                  <p style="font-family:Allura; font-size:1.5rem;">Welcome back</p>
                  <div class="dropdown show">
                    <button class="btn btn-danger dropdown-toggle dropdown-toggle-split" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{Auth::user()->name}} <br> Reg.No.: {{Auth::user()->reg_number}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="{{url('course/payment/history')}}">ගෙවීම් ඉතිහාසය</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </div>
                  </div>
              @else
                <a href="{{url('register')}}" class="btn btn-danger btn-lg"><h2>Register Now</h2></a>
                <br><br>
                <a href="{{url('login')}}" class="btn btn-danger btn-lg"><h4>Login</h4></a>
              @endif
              <br><br>
              <!-- Carousel -->
              {{--
              <div id="carousel-mid" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-mid" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-mid" data-slide-to="1"></li>
                  <li data-target="#carousel-mid" data-slide-to="2"></li>
                  <li data-target="#carousel-mid" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('images/home/carousel/image-1.jpg')}}" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('images/home/carousel/image-2.jpg')}}" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('images/home/carousel/image-3.jpg')}}" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('images/home/carousel/image-4.jpg')}}" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carousel-mid" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-mid" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>--}}
          </div>
          <div class="col-md-3 col-sm-12">
          </div>
      </div>
</div>
<br>
<!-- Time table -->
{{--<div class="container-fluid  bg-primary">
  <div class="row justify-content-center">
    <div class="col p-2 text-center text-light">
      <h4>කාල සටහන බලා ගැනීමට මෙහි ඇති Button එක මත click කරන්න. <a href="{{url('/course/teacher/examdemo')}}" class="btn btn-danger">කාල සටහන වෙත යන්න</a></h4>
    </div>
  </div>
</div>--}}
<br><br>
<!-- Advertisement Bottom -->
<div class="container">
  <div class="row justify-content-center">
    @foreach ($advertisement as $item)
        @if ($item->adv_category_id==1)
            <div class="col-md-3 col-sm-12 p-2">
                <img src="{{url('/avt/store_image/fetch_image')}}/{{$item->id}}" class="img-fluid" alt="">
            </div>
        @endif
    @endforeach
  </div>
</div>
@endsection
@section('javascript')
<script>
  
</script>
@endsection
