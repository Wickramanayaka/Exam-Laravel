<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="AbpsEGTQMmmJzaFNIK_DAerQQ_0oouuxWtRXJ092YpI" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('images/favicon.jpg')}}" type="image/jpeg" sizes="16x16">

    <title>{{config('app.name')}}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/calendar.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/47a4af3b73.js" crossorigin="anonymous"></script>


    <style>
        html, body{
            font-family: Roboto, 'Courier New', Courier, monospace
        }
        .hilight{
            box-shadow: 0 1px 2px rgba(0,0,0,0.15);
            background-color: white;
            transition: box-shadow 0.3s ease-in-out;

        }
        .hilight:hover{
            box-shadow: 0 5px 15px rgba(0,0,0,0.8);
            background-color:#CCC;
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-172059188-2">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-172059188-2');
    </script>
</head>
<body>
    <div id="app">
        <div class="container mt-1">
            <div class="row">
                <div class="col">
                    @php
                        $home ="";
                        $course = "";
                        $home_t ="dark";
                        $course_t = "dark";
                        $about ="";
                        $about_t = "dark";
                        $help ="";
                        $help_t = "dark";
                        $exam ="";
                        $exam_t = "dark";
                        switch (Request::segment(1)) {
                            case 'course':
                                $course = 'active';
                                $course_t = "light";
                                break;
                            case 'about_us':
                                $about = 'active';
                                $about_t = "light";
                                break;
                            case 'help':
                                $help = 'active';
                                $help_t = "light";
                                break;
                            case 'exam':
                                $exam = 'active';
                                $exam_t = "light";
                                break;
                            default:
                                $home = 'active';
                                $home_t ="light";
                                break;
                        }
                    @endphp
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                          <a class="nav-link font-weight-bold border border-primary text-{{$home_t}} {{$home}}" href="{{url('/')}}"><h5>මුල් පිටුව</h5></a>
                        </li>
                        <li class="nav-item border">
                          <a class="nav-link font-weight-bold border border-primary text-{{$course_t}} {{$course}}" href="{{url('/course/teacher/examdemo')}}"><h5>පන්ති</h5></a>
                        </li>
                        <li class="nav-item border">
                            <a class="nav-link font-weight-bold border border-primary text-{{$exam_t}} {{$exam}}" href="{{url('/exam')}}"><h5>ඇගයීම</h5></a>
                          </li>
                        <li class="nav-item border">
                            <a class="nav-link font-weight-bold border border-primary text-{{$help_t}} {{$help}}" href="{{url('help')}}"><h5>උදවු</h5></a>
                        </li>
                        <li class="nav-item border">
                            <a class="nav-link font-weight-bold border border-primary text-{{$about_t}} {{$about}}" href="{{route('aboutUs')}}"><h5>ඔබගේ ගුරුවරයා ගැන</h5></a>
                        </li>
                      </ul>
                </div>
            </div>
        </div>
        @if (Auth::check())
        <div class="container" style="margin-top: 8px;">
            <div class="row">
                <div class="col text-center">
                    <div class="alert alert-secondary" role="alert">
                        Your name: <b class="text-dark">{{Auth::user()->name}}</b> | Registration No.: <b class="text-dark">{{Auth::user()->reg_number}}</b>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if (!Auth::user()==null && Auth::user()->hasVerifiedEmail()==false)
        <br>
        <div class="container-fluid">
            <div class="row p-2 bg-info text-light">
                <div class="col text-center">
                    <a href="https://gmail.com" class="text-light">ඔබගේ විද්‍යුත් තැපෑලට ගොස් ගිණුම සක්‍රිය කරන්න.</a>
                </div>
            </div>
        </div>
        @endif
        @if (Session::has('message'))
        <br>
        <div class="container-fluid">
            <div class="row p-2 bg-success text-light">
                <div class="col text-center">
                    {{Session::get('message')}}
                </div>
            </div>
        </div>
        @endif
        @if (Session::has('error'))
        <br>
        <div class="container-fluid">
            <div class="row p-2 bg-danger text-light">
                <div class="col text-center">
                    {{Session::get('error')}}
                </div>
            </div>
        </div>
        @endif
        
        <main class="py-4">
            @include('partials.message')
            @yield('content')
        </main>
        <footer>
            <div class="container-fluid bg-secondary text-light">
                <div class="row" style="padding:16px; padding-top:50px; padding-bottom:50px;">
                    <div class="col-md-3 col-sm-12">
                        <h3 style="font-weight: 700">{{config('app.name')}}</h3>
                    </div>
                    <div class="col-md-2 col-sm-12">
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <script type="text/javascript"> //<![CDATA[
                            var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
                            document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
                          //]]></script>
                          <script language="JavaScript" type="text/javascript">
                            TrustLogo("https://www.positivessl.com/images/seals/positivessl_trust_seal_lg_222x54.png", "POSDV", "none");
                        </script>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('javascript')
</body>
</html>
