<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Admin panel and dashboard for EDU application.">
    <meta name="author" content="Chamal Ayesh Wickramanayaka">
    <link rel="icon" href="{{asset('images/icons/dashboard.png')}}" type="image/png" sizes="16x16">
    <meta name="generator" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('summernote-0.8.18-dist/summernote.min.css') }}" rel="stylesheet">
    <link href="{{ asset('select2-4.0.13/dist/css/select2.min.css') }}" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Admin Panel</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="{{route('admin.logout')}}">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::segment(2)=="dashboard"?"active":""}}" href="{{url('adm/dashboard')}}">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::segment(2)=="lib"?"active":""}}" href="{{url('adm/lib')}}">
              <span data-feather="book"></span>
              Library
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::segment(2)=="lsn"?"active":""}}" href="{{url('adm/lsn')}}">
              <span data-feather="video"></span>
              Lesson
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::segment(2)=="course"?"active":""}}" href="{{url('adm/course')}}">
              <span data-feather="headphones"></span>
              Courses
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::segment(2)=="teacher"?"active":""}}" href="{{url('adm/teacher')}}">
              <span data-feather="user"></span>
              Teachers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::segment(2)=="adv"?"active":""}}" href="{{url('adm/adv')}}">
              <span data-feather="briefcase"></span>
              Advertisement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::segment(2)=="usr"?"active":""}}" href="{{url('adm/usr')}}">
              <span data-feather="user"></span>
              Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::segment(2)=="cashier"?"active":""}}" href="{{url('adm/cashier')}}">
              <span data-feather="inbox"></span>
              Cashiers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::segment(2)=="sms"?"active":""}}" href="{{url('adm/sms')}}">
              <span data-feather="send"></span>
              SMS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::segment(2)=="ex"?"active":""}}" href="{{url('adm/ex/paper')}}">
              <span data-feather="award"></span>
              Exam
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>OTHER LINKS</span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="{{url('adm/course/payment')}}">
              <span data-feather="headphones"></span>
              Course Payments
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" id="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        @if ($errors->any())
          <div class="modal" id="errorModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header  bg-danger text-light">
                  <h5 class="modal-title">Something went wrong.</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                  @endforeach
                  <br>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        @endif
        @yield('content')
    </main>
  </div>
</div>
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/Chart.js/2.7.3/Chart.min.js') }}"></script>
    <script src="{{ asset('summernote-0.8.18-dist/summernote.min.js') }}"></script>
    <script src="{{ asset('select2-4.0.13/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script></body>
    @yield('javascript')
    <script>
      $('#errorModal').modal('show');
    </script>
    <script>
      function printContent(){
        var content = document.getElementById('main').innerHTML;
        var original = document.body.innerHTML;
        document.body.innerHTML = content;
        window.print();
        document.body.innerHTML = original;
      }
    </script>
</html>
