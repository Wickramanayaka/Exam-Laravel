@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-bottom: -50px; margin-top:-25px; height:550px; background-image: url('{{asset('images/coming_soon/lesson.png')}}'); background-size: 100% 100%;">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <div style="margin-top: 250px; font-size: 50px; color:white;" id="demo" ></div>
        </div>
    </div>
    {{--<div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h4 class="display-4 font-weight-bold">පාඩම්</h4>
            <h3 class="text-primary font-weight-bold">ප්‍රාථමික අධ්‍යාපනයේ නව විෂය නිර්දේශයන්ට අනුකූලව සියලුම විෂයන් සඳහා <br>සකස් කරන ලද පාඩම් මාලාව</h3>
            <br>
            <iframe width="500" height="300" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
        </div>
    </div>
    <br><br>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h4><b>පළමුවන ශ්‍රේණිය</b></h4>
                </div>
                <ul class="list-group list-group-flush">
                  <a href="{{url('lsn/gs/first-grade-sinhala')}}"><li class="list-group-item"><h3>සිංහල</h3></li></a>
                  <a href="{{url('lsn/gs/first-grade-maths')}}"><li class="list-group-item"><h3>ගණිතය</h3></li></a>
                  <a href="{{url('lsn/gs/first-grade-environment-related-activities')}}"><li class="list-group-item"><h3>පරිසරය ආශ්‍රිත ක්‍රියාකාරකම්</h3></li></a>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h4><b>දෙවන ශ්‍රේණිය</b></h4>
                </div>
                <ul class="list-group list-group-flush">
                  <a href="{{url('lsn/gs/second-grade-sinhala')}}"><li class="list-group-item"><h3>සිංහල</h3></li></a>
                  <a href="{{url('lsn/gs/second-grade-maths')}}"><li class="list-group-item"><h3>ගණිතය</h3></li></a>
                  <a href="{{url('lsn/gs/second-grade-environment-related-activities')}}"><li class="list-group-item"><h3>පරිසරය ආශ්‍රිත ක්‍රියාකාරකම්</h3></li></a>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h4><b>තුන්වන ශ්‍රේණිය</b></h4>
                </div>
                <ul class="list-group list-group-flush">
                  <a href="{{url('lsn/gs/third-grade-sinhala')}}"><li class="list-group-item"><h3>සිංහල</h3></li></a>
                  <a href="{{url('lsn/gs/third-grade-maths')}}"><li class="list-group-item"><h3>ගණිතය</h3></li></a>
                  <a href="{{url('lsn/gs/third-grade-environment-related-activities')}}"><li class="list-group-item"><h3>පරිසරය ආශ්‍රිත ක්‍රියාකාරකම්</h3></li></a>
                  <a href="{{url('lsn/gs/third-grade-english')}}"><li class="list-group-item"><h3>English</h3></li></a>
                  <a href="{{url('lsn/gs/third-grade-tamil')}}"><li class="list-group-item"><h3>දෙමළ</h3></li></a>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="card" >
                <div class="card-header bg-primary text-light">
                    <h4><b>හතරවන ශ්‍රේණිය</b></h4>
                </div>
                <ul class="list-group list-group-flush">
                  <a href="{{url('lsn/gs/fourth-grade-sinhala')}}"><li class="list-group-item"><h3>සිංහල</h3></li></a>
                  <a href="{{url('lsn/gs/fourth-grade-maths')}}"><li class="list-group-item"><h3>ගණිතය</h3></li></a>
                  <a href="{{url('lsn/gs/fourth-grade-environment-related-activities')}}"><li class="list-group-item"><h3>පරිසරය ආශ්‍රිත ක්‍රියාකාරකම්</h3></li></a>
                  <a href="{{url('lsn/gs/fourth-grade-english')}}"><li class="list-group-item"><h3>English</h3></li></a>
                  <a href="{{url('lsn/gs/fourth-grade-tamil')}}"><li class="list-group-item"><h3>දෙමළ</h3></li></a>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h4><b>පස්වන ශ්‍රේණිය</b></h4>
                </div>
                <ul class="list-group list-group-flush">
                  <a href="{{url('lsn/grd/5/sbj/fifth-grade-sinhala')}}"><li class="list-group-item"><h3>සිංහල</h3></li></a>
                  <a href="{{url('lsn/grd/5/sbj/fifth-grade-maths')}}"><li class="list-group-item"><h3>ගණිතය</h3></li></a>
                  <a href="{{url('lsn/grd/5/sbj/fifth-grade-environment-related-activities')}}"><li class="list-group-item"><h3>පරිසරය ආශ්‍රිත ක්‍රියාකාරකම්</h3></li></a>
                  <a href="{{url('lsn/grd/5/sbj/fifth-grade-english')}}"><li class="list-group-item"><h3>English</h3></li></a>
                  <a href="{{url('lsn/grd/5/sbj/fifth-grade-tamil')}}"><li class="list-group-item"><h3>දෙමළ</h3></li></a>
                </ul>
            </div>
        </div>
    </div>--}}
</div>
@endsection
@section('javascript')
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Nov 15, 2020 08:00:00").getTime();
    
    // Update the count down every 1 second
    var x = setInterval(function() {
    
      // Get today's date and time
      var now = new Date().getTime();
    
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
    
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
      // Display the result in the element with id="demo"
      document.getElementById("demo").innerHTML = days + " දින " + hours + " පැය "
      + minutes + " මිනිත්තු " + seconds + " තත්පර ";
    
      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
      }
    }, 1000);
    </script>
@endsection