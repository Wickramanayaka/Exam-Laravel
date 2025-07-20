@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Library</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#createMaterialModal"><span data-feather="plus-circle"></span> 
                New Material
            </button>
            {{--<button type="button" class="btn btn-sm btn-outline-secondary">Export</button>--}}
          </div>
          </button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Material List</h5>
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
                  <th>URL</th>
                  <th>Category</th>
                  <th>Date</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($materials as $item)
                      <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->name}}</td>
                          <td>
                            @if ($item->category->slang=="link")
                              <a href="{{$item->description}}" target="_blank">view</a>
                            @else
                              <a href="{{url('adm/lib/m')}}/{{$item->id}}/download">view</a>
                            @endif
                          </td>
                          <td>{{$item->category->name}}</td>
                          <td>{{$item->created_at}}</td>
                          <td>
                            <form onsubmit="return confirm('Are you sure to delete?');" action="{{ url('adm/lib/delete') }}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-link p-1 font-weight-bold text-danger"><span data-feather="trash-2"></span> Delete</button>
                              <input type="hidden" name="id" value="{{$item->id}}">
                            </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
            {{ $materials->appends(['keyword'=>$keyword])->render() }}
        </div>
    </div>
</div>
@include('admin::library.partials.create_material_for_course')
@endsection