@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cashiers</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#createCashierModal"><span data-feather="plus-circle"></span> 
                  New Cashier
              </button>
            </div>
            </button>
          </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Cashier List</h5>
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Password</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($cashiers as $item)
                      <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->name}}</td>
                          <th>{{$item->email}}</th>
                          <td><a href="{{url('adm/cashier')}}/{{$item->id}}/view">UPDATE</a></td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@include('admin::cashiers.partials.create')
@endsection