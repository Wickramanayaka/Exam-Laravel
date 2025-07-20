@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Advertisements</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#createAdvertisementModal"><span data-feather="plus-circle"></span> 
                New Advertisement
            </button>
          </div>
          </button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Advertisement List</h5>
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
                  <th>&nbsp;</th>
                  <th>Position#</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Publish</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($ads as $item)
                      <tr>
                          <td><img src="{{url('adm/adv/store_image/fetch_image')}}/{{$item->id}}" alt="" class="img-thumbnail" width="100"></td>
                          <td>{{$item->position}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->category->name}}</td>
                          <td><a href="{{url('adm/adv')}}/{{$item->id}}/activate">{{$item->publish==1?"Yes":"No"}}</a></td>
                          <td>
                            <form onsubmit="return confirm('Are you sure to delete?');" action="{{ url('adm/adv/delete') }}" method="POST">
                              @csrf
                              <a href="#" class="btn btn-link p-1 font-weight-bold text-primary"><span data-feather="edit"></span> Edit</a>
                              <button type="submit" class="btn btn-link p-1 font-weight-bold text-danger"><span data-feather="trash-2"></span> Delete</button>
                              <input type="hidden" name="id" value="{{$item->id}}">
                            </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@include('admin::advertisements.partials.create_advertisement')
@endsection
@section('javascript')
<script>
    $(".custom-file-input").on('change', function(){
        var fileName = $(this).val();
        fileName = fileName.replace('C:\\fakepath\\','');
        $(this).next('.custom-file-label').html(fileName);
    });
</script>
@endsection