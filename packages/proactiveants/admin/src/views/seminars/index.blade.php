@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Seminars</h1>
    </div>
    <div class="row">
        <div class="col">
            <h5>Seminar List</h5>
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
            <table class="table table-striped table-bordered table-lg">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Seminar</th>
                  <th>Host</th>
                  <th>Requester</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Location</th>
                  <th>Date</th>
                  <th>Confirmed</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($bookings as $item)
                      <tr>
                          <td>{{$item->id}}</td>
                          <td><h5>{{$item->seminar->name}}</h5></td>
                          <td>{{$item->host->name}}</td>
                          <td class="text-primary">{{$item->requester_name}}</td>
                          <td>{{$item->mobile}}</td>
                          <td class="text-secondary">{{$item->email}}</td>
                          <td class="text-success">{{$item->location->name}}</td>
                          <td>{{$item->date}}</td>
                          <th><a href="{{url('adm/sem/confirmed').'/'.$item->id}}"><span class="badge badge-primary" style="font-size: 1rem;">{{$item->confirmed}}</span></a></th>
                          <td>
                            <form onsubmit="return confirm('Do you really want to delete?');" action="{{ url('adm/sem/delete') }}" method="POST">
                              @csrf
                              <input type="hidden" name="id" value="{{$item->id}}">
                              <button type="submit" class="btn btn-link p-1 font-weight-bold text-danger"><span data-feather="trash-2"></span> Delete</button>
                            </form>
                          </td>

                      </tr>
                  @endforeach
              </tbody>
            </table>
            {{ $bookings->appends(['keyword' => $keyword])->render() }}
        </div>
    </div>
</div>
@include('admin::library.partials.create_material')
@endsection