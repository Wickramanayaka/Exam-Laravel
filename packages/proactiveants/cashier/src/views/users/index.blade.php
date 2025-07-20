@extends('cashier::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
    </div>
    <div class="row">
        <div class="col">
            <h5>User List</h5>
        </div>
        <div class="col-auto">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
    
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Telephone</th>
                  <th>Institute</th>
                  <th>Active</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($users as $item)
                      <tr>
                          <td>{{$item->reg_number}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->telephone}}</td>
                          <td>{{$item->tuition_class}}</td>
                          <td>{{$item->active==1?"Yes":"No"}}</td>
                          <td>
                            <a class="btn-link" href="{{url('cashier/usr')}}/{{$item->id}}/view"><b><span data-feather="edit"></span> View</b></a>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
            {{ $users->appends(['keyword'=>$keyword])->render() }}
        </div>
    </div>
</div>
@endsection