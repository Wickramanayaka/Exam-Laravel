@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <a type="button" href="{{url('adm/usr/export')}}" class="btn btn-sm btn-outline-secondary"><span data-feather="download"></span> Export</a>
            </div>
            </button>
        </div>
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
                  <th>Reg No.</th>
                  <th>Name</th>
                  <th>Telephone</th>
                  <th>Active</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($users as $item)
                      <tr>
                          <td>{{$item->id}}</td>
                          <th>{{$item->reg_number}}</th>
                          <td>{{$item->name}}</td>
                          <td>{{$item->telephone}}</td>
                          <td><a href="{{url('adm/usr')}}/{{$item->id}}/activate">{{$item->active==1?"Yes":"No"}}</a></td>
                          <td>
                            <form onsubmit="return confirm('Are you sure to delete?');" action="{{ url('adm/usr/delete') }}" method="POST">
                              @csrf
                              <a class="btn-link" href="{{url('adm/usr')}}/{{$item->id}}/view"><b><span data-feather="edit"></span> View</b></a>
                              <button type="submit" class="btn btn-link p-1 font-weight-bold text-danger"><span data-feather="trash-2"></span> Delete</button>
                              <input type="hidden" name="id" value="{{$item->id}}">
                            </form>
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