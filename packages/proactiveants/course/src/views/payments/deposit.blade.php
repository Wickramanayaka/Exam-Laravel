@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-12">
                <img src="{{url('/course/teacher/store_image/fetch_image')}}/{{$course->teacher->id}}" alt="" width="150">
            </div>
            <div class="col-md-10 col-sm-12">
                <h5>{{$course->teacher->name}}</h5>
                {!! $course->teacher->description !!}
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{url('/course/teacher')}}/{{$course->teacher->slang}}" class="btn btn-outline-danger btn-lg"><h3>නැවතත් කාලසටහන වෙතට</h3></a>
                <br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <table class="table table-bordered text-center">
                    <tr style="font-size:1.0rem;">
                        <td>{{$course->name}}</td><td>{{$course->day}}<br>{{$course->time}}</td><td>රු. {{$course->fee}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <div class="row align-items-center">
            <div class="col text-center">
                <h3>Bank Deposit / Online Transfer / පංති කාඩ්පත්</h3>
            </div>
        </div>
        <br>
        <div class="row" style="background-color: #333; padding: 16px; color: #FFF;">
            <div class="col-md-6 col-sm-12 text-center">
                <h5>
                    <b>BOC</b><br>
                    Account No: 87737717<br>
                    Bank Account Name: H.M.T.P Anuhara<br>
                    Branch:  Bank of Ceylon, Super Grade Branch, Ratnapura
                </h5>
            </div>
            <div class="col-md-6 col-sm-12 text-center">
                <h5>
                    <b>BOC</b><br>
                    Account No: 87736103<br>
                    Bank Account Name: M.D.S.S. Dissanayaka<br>
                    Branch:  Bank of Ceylon, Super Grade Branch, Ratnapura
                </h5>
            </div>
        </div>
        <br>
        <div class="row align-items-center">
            <div class="col-md-12 col-sm-12 text-center">
                <br>
                <h3>ඔබේ ගෙවීම් පිටපත අනිවාර්යෙන්ම මෙම ස්ථානයේ  upload කරන්න </h3>
                <br>
                <form action="{{url('/course/payment/upload')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form row">
                        <div class="input-group mb-3 col-md-6 offset-md-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">පිටපත</span>
                            </div>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="image" name="image">
                              <label class="custom-file-label" for="inputGroupFile01">ගොනුව තෝරන්න</label>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <input type="hidden" name="method" value="Deposit">
                    <input type="hidden" name="month" value="{{date('m')}}">
                    <input type="hidden" name="year" value="{{date('Y')}}">
                    <button type="submit" id="submit" disabled class="btn btn-outline-danger btn-lg"><h3>පිටපත upload කරන්න</h3></button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $(".custom-file-input").on('change', function(){
            var fileName = $(this).val();
            fileName = fileName.replace('C:\\fakepath\\','');
            $(this).next('.custom-file-label').html(fileName);
            $('#submit').attr('disabled', false);
        });
    })
</script>
@endsection