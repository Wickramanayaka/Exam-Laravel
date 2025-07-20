@extends('cashier::layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="row">
        <div class="col">
            Welcome <u>{{Auth::user()->name}}</u> to <b>{{config('app.name')}}</b>.
        </div>
    </div>
</div>
@endsection