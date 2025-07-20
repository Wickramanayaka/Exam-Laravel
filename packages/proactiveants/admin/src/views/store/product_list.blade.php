@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bookstore</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#createMaterialModal"><span data-feather="plus-circle"></span> 
                New Product
            </button>
            <a type="button" class="btn btn-sm btn-outline-secondary" href="{{url('adm/bst/category')}}">Category</a>
          </div>
          {{--<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>--}}
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Product List</h5>
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
                  <th>#</th>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Publish</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($products as $product)
                      <tr>
                        <td><img src="{{url('adm/bst/store_image/fetch_image')}}/{{$product->id}}" alt="" class="img-thumbnail" width="50"></td>
                        <td>{{$product->id}}</td>
                        <td>{{$product->code}}</td>
                        <td class="text-truncate" style="max-width: 250px;">{{$product->name}}</td>
                        <td>{{$product->category->name}} ({{$product->category->parents->name}})</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td><a href="{{url('adm/bst/product/publish').'/'.$product->id}}" class="font-weight-bold">{{$product->published}}</a></td>
                        <td>
                            <form onsubmit="return confirm('Are you sure to delete?');" action="{{ url('adm/bst/product/delete') }}" method="POST">
                              @csrf
                              <a href="{{url('adm/bst/product').'/'.$product->id}}" class="p-1 font-weight-bold"><span data-feather="edit"></span> View</a>
                              <button type="submit"  class="btn btn-link p-1 font-weight-bold text-danger"><span data-feather="trash-2"></span> Delete</button>
                              <input type="hidden" name="id" value="{{$product->id}}">
                            </form>
                        </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
            {{ $products->appends(['keyword' => $keyword])->render() }}
        </div>
    </div>
    {{--<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>--}}
</div>
@include('admin::store.partials.create_product')
@endsection