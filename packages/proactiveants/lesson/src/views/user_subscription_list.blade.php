@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" id="container">
        <div class="col-md-12 text-center">
            <h4 class="display-4 font-weight-bold">පාඩම්</h4>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card bg-primary text-white p-2">
                <h5>ඔබගේ දායකත්වයන් ඉතිහාසය</h5>
            </div>
            <br><br>
            <table class="table">
                <tr>
                    <th>Subscribed on</th><th>Date</th><th>Amount</th><th>Status</th>
                </tr>
                @foreach ($subs as $item)
                    <tr>
                        <td><a href="{{url('/lsn/gs').'/'.$item->gradeSubject->slang}}"><i class="fa fa-video fa-fw"></i> {{$item->gradeSubject->grade->name.'-'.$item->gradeSubject->subject->name}}</a></td>
                        <td>{{$item->date}}</td>
                        <td>{{$item->amount}}</td>
                        <td><span class="badge {{$item->status=='ACTIVE'?'badge-success':'badge-danger'}}">{{$item->status}}</span></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection