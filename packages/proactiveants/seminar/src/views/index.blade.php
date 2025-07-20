@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h4 class="display-4 font-weight-bold">වැඩමුළු හා සම්මන්ත්‍රණ</h4>
        </div>
    </div>
    <br>
    <div class="jumbotron">
        <h1 class="display-4">Advertistment</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-3 col-sm-12">
        <iframe height="300" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
      </div>
      <div class="col-md-3 col-sm-12">
        <iframe height="300" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
      </div>
      <div class="col-md-3 col-sm-12">
        <iframe height="300" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
      </div>
      <div class="col-md-3 col-sm-12">
        <iframe height="300" src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
      </div>
    </div>
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-12 text-dark text-justify">
            <h4>ප්‍රාථමික අධ්‍යාපනය පිළිබද උනන්දුවක් දක්වන පාර්ශවයන් වෙනුවෙන් සකස් කරන ලද අධ්‍යාපනික සම්මන්ත්‍රණ සහ වැඩමුළු ඔබගේ පාසලට/ ආයතනයට/ ප්‍රදේශයට ලබාගැනීමට පහතින් අයදුම් කළ හැක.</h4>
        </div>
    </div>
    <br><br>
    <div class="row bg-light">
        <div class="col-md-8 col-sm-12 border-right">
            <div class="container theme-showcase">
              <div id="holder" class="row" style="background-color: #EEE"></div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <h5 class="bg-secondary text-light p-2">වැඩමුළුව සහ සම්මන්ත්‍රණය වෙන් කර ගැනීම</h5>
          <br>
          <form method="POST" action="{{url('sem/store')}}">
            @csrf
            <div class="form-group">
              <label for="seminar">වැඩමුළුව / සම්මන්ත්‍රණය (Seminar Type)</label>
              <select class="form-control" id="seminar" name="seminar" aria-describedby="emailHelp">
                <option disabled selected value>වැඩමුළුව / සම්මන්ත්‍රණය තෝරන්න</option>
                @foreach ($seminars as $seminar)
                    <option value="{{$seminar->id}}">{{$seminar->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="host">සම්පත් දායකත්වය (Host)</label>
              <select class="form-control" id="host" name="host" aria-describedby="emailHelp">
              </select>
            </div>
            <div class="form-group">
              <label for="name">ඔබගේ නම (Name)</label>
              <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
              <label for="email">විද්යුත් තැපෑල (Email Address)</label>
              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
              <label for="mobile">දුරකථන අංකය (Mobile)</label>
              <input type="text" class="form-control" id="mobile" name="mobile" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
              <label for="location">වැඩමුළුව පැවැත් වීමට අවශ්‍ය නගරය (Location)</label>
              <select class="form-control" id="location" name="location" aria-describedby="emailHelp">
                @foreach ($locations as $location)
                    <option value="{{$location->id}}">{{$location->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="date">වැඩමුළුව පැවැත් වීමට අවශ්‍ය දිනය (Date)</label>
              <input autocomplete="off" type="text" class="form-control datepicker" id="date" name="date" aria-describedby="emailHelp" required>
            </div>
            <button type="submit" class="btn btn-danger btn-block btn-lg">වෙන් කර ගැනීම (Book Now)</button>
          </form>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col">
            <h1>සිසු තරු උදානය</h1>
            <h4>සිසුන් සඳහා වැඩමුළු</h4>
            <div class="row justify-content-center bg-light">
                <div class="col text-center">
                    <br>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    <br>
                </div>
            </div>
            <div class="row justify-content-center bg-light">
              <div class="col-md-4 text-center">
                <img src="{{asset('images/lecturers/person-1.jpg')}}" alt="Person 1" class="img-fluid rounded-circle" width="150">
                <br><br>
                <h5>Company Name</h5>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
            </div>
            <div class="col-md-4 text-center">
              <img src="{{asset('images/lecturers/person-2.jpg')}}" alt="Person 1" class="img-fluid rounded-circle" width="150">
              <br><br>
              <h5>Company Name</h5>
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
            </div>
            <div class="col-md-4 text-center">
              <img src="{{asset('images/lecturers/person-3.jpg')}}" alt="Person 1" class="img-fluid rounded-circle" width="150">
              <br><br>
              <h5>Company Name</h5>
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
            </div> 
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col">
            <h1>සිසු දිවියට දෙගුරු සවිය</h1>
            <h4>දෙමාපිය වැඩමුළු</h4>
            <div class="row justify-content-center bg-light">
                <div class="col text-center">
                    <br>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    <br>
                </div>
            </div>
            <div class="row justify-content-center bg-light">
              <div class="col-md-4 text-center">
                <img src="{{asset('images/lecturers/person-1.jpg')}}" alt="Person 1" class="img-fluid rounded-circle" width="150">
                <br><br>
                <h5>Company Name</h5>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
            </div>
            <div class="col-md-4 text-center">
              <img src="{{asset('images/lecturers/person-2.jpg')}}" alt="Person 1" class="img-fluid rounded-circle" width="150">
              <br><br>
              <h5>Company Name</h5>
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
            </div>
            <div class="col-md-4 text-center">
              <img src="{{asset('images/lecturers/person-3.jpg')}}" alt="Person 1" class="img-fluid rounded-circle" width="150">
              <br><br>
              <h5>Company Name</h5>
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
            </div>  
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col">
            <h1>සුහුරු ගුරු</h1>
            <h4>ගුරුවරුන් සඳහා මාර්ගෝපදේශන වැඩමුළු</h4>
            <div class="row justify-content-center bg-light">
                <div class="col text-center">
                    <br>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    <br>
                </div>
            </div>
            <div class="row justify-content-center bg-light">
              <div class="col-md-4 text-center">
                <img src="{{asset('images/lecturers/person-1.jpg')}}" alt="Person 1" class="img-fluid rounded-circle" width="150">
                <br><br>
                <h5>Company Name</h5>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
            </div>
            <div class="col-md-4 text-center">
              <img src="{{asset('images/lecturers/person-2.jpg')}}" alt="Person 1" class="img-fluid rounded-circle" width="150">
              <br><br>
              <h5>Company Name</h5>
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
            </div>
            <div class="col-md-4 text-center">
              <img src="{{asset('images/lecturers/person-3.jpg')}}" alt="Person 1" class="img-fluid rounded-circle" width="150">
              <br><br>
              <h5>Company Name</h5>
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
            </div> 
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col">
            <h1>තරු මං පෙත</h1>
            <h4>නායකත්ව සහ පෞරුෂ සංවර්ධන වැඩමුළු</h4>
            <div class="row justify-content-center bg-light">
                <div class="col text-center">
                    <br>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    <br>
                </div>
            </div>
            <div class="row justify-content-center bg-light">
                <div class="col-md-4 text-center">
                    <img src="{{asset('images/lecturers/person-1.jpg')}}" alt="Person 1" class="img-fluid rounded-circle" width="150">
                    <br><br>
                    <h5>Company Name</h5>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                </div>
                <div class="col-md-4 text-center">
                  <img src="{{asset('images/lecturers/person-2.jpg')}}" alt="Person 1" class="img-fluid rounded-circle" width="150">
                  <br><br>
                  <h5>Company Name</h5>
                  <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                </div>
                <div class="col-md-4 text-center">
                  <img src="{{asset('images/lecturers/person-3.jpg')}}" alt="Person 1" class="img-fluid rounded-circle" width="150">
                  <br><br>
                  <h5>Company Name</h5>
                  <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                </div> 
            </div>
        </div>
    </div>    
</div>
@endsection
@section('javascript')
@include('seminar::calendar')
<script>
  $("#seminar").on('change', function(){
    var seminar = $("#seminar").val(); 
    $("#host").html("");
    $.get({
      url: "{{url('/sem/getHostBySeminar/')}}/" + seminar,
      success: function(result){
        result.forEach(element => {
          //console.log(element.id);
          $("#host").append("<option value='"+element.id+"'>"+element.name+"</option>")
        });
      }
    })
  });
</script>
@endsection