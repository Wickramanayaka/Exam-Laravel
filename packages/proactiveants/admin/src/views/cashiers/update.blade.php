@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cashiers</h1>
    </div>
    <div class="row">
        <div class="col">
            <h5>Cashier Update</h5>
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <form action="{{url('adm/cashier/update')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input required type="text" class="form-control" id="name" name="name" autocomplete="off" value="{{$cashier->name}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input required readonly type="email" class="form-control" id="email" name="email" autocomplete="off" value="{{$cashier->email}}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input required type="password" class="form-control" id="password" name="password" autocomplete="off" >
            </div>
            <input type="hidden" name="id" value="{{$cashier->id}}">
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
    </div>
</div>
@endsection