@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col text-center">
            <h1 class="font-weight-bold">{{$category->name}}</h1>
            <hr>
            <div class="row row-cols-1 row-cols-6">
                @foreach ($category->materials as $item)
                <div class="col mb-4">
                    <div class="card h-100">
                        <img src="{{url('lib/store_image/fetch_image')}}/{{$item->id}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->name}}</h5>
                            <p class="card-text">{{$item->description}}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{url('lib/m').'/'.$item->id}}" class="btn btn-primary btn-block">Download</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection