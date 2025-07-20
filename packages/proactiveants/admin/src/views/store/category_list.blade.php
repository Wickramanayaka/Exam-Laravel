@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bookstore</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#createCategoryModal"><span data-feather="plus-circle"></span> 
                New Category
            </button>
            <a type="button" class="btn btn-sm btn-outline-secondary" href="{{url('adm/bst/product')}}"><span data-feather="book"></span> Product</a>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Category List</h5>
        </div>
    </div>    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-lg">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Parent Category</th>
                  <th>Published</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($categories as $category)
                      <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->parents->name}}</td>
                        <td><a href="{{url('adm/bst/category/publish').'/'.$category->id}}" class="font-weight-bold {{$category->published=="Yes"?"text-success":"text-secondary"}}">{{$category->published}}</a></td>
                        <td>
                          <form onsubmit="return confirm('Are you sure to delete?');" action="{{ url('adm/bst/category/delete') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link p-1 font-weight-bold text-danger"><span data-feather="trash-2"></span> Delete</button>
                            <input type="hidden" name="id" value="{{$category->id}}">
                          </form>
                        </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
            
        </div>
    </div>
</div>
@include('admin::store.partials.create_category')
@endsection