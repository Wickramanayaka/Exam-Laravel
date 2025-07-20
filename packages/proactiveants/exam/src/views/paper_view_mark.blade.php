@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 offset-md-1">
            <h4 class="text-center">{{$tryouts->first()->paper->course->name}} - {{$tryouts->first()->paper->name}}</h4>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>උත්සාහයන්</th><th>තත්ත්වය</th><th>ලකුණු/100</th><th>සමාලෝචනය</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tryouts as $key => $tryout)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>සම්පූර්ණ කළා, {{$tryout->end_at}}</td>
                            <td>
                                {{$tryout->userAnswers->sum('mark')}}
                            </td>
                            <td>
                                <button onclick="review({{$tryout->id}})" class="btn btn-link">සමාලෝචනය</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{url('exam/c').'/'.$tryouts->first()->paper->course->id}}" class="btn btn-primary">ආපසු යන්න</a>
        </div>
    </div>
</div>
@endsection