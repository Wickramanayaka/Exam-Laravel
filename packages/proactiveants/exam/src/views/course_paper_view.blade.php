@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-12">
            <h3>{{--<span class="rounded-circle bg-danger text-light p-2 text-center">{{(int) filter_var($course->name, FILTER_SANITIZE_NUMBER_INT)}}</span> --}}{{$course->name}}</h3>
            <p>{{$course->teacher->name}}</p>
        </div>
        <div class="col-md-8 col-sm-12">
            <table class="table table-bordered bg-secondary text-light">
                @foreach ($papers as $item)
                    @if ($item->published==1)
                        <tr>
                            <td>
                                {{$item->name}}
                                @if ($item->is_free==1)
                                    <span class='badge badge-danger'>FREE</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <form action="{{url('exam/paper/mark')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="paper_id" value="{{$item->id}}">
                                    <button type="submit" class="btn btn-primary">ඔබ ලබා ඇති ලකුණු බලන්න</button>
                                </form>
                            <td class="text-center"><a href="{{route('paper_view',['c'=>$course->id, 'id'=>$item->id])}}" class="btn btn-danger">ප්‍රශ්න පත්‍රය පෙන්වන්න</a></td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
