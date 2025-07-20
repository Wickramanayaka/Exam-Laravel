@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bookstore</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="{{url('adm/bst')}}"><span data-feather="book"></span> 
                Product
            </a>
            <a type="button" class="btn btn-sm btn-outline-secondary" href="{{url('adm/bst/category')}}">Category</a>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Product View</h5>
        </div>
        <div class="col-auto">
            <form class="form-inline my-2 my-lg-0">
              @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col border-right">
            <form action="{{url('adm/bst/product/updateInfo')}}" method="POST">
              @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="code">Code</label>
                      <input required type="text" class="form-control" id="code" name="code" value="{{$product->code}}">
                    </div>
                    <div class="form-group col">
                      <label for="name">Name</label>
                      <input required type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name">Alias</label>
                    <input required type="text" class="form-control" id="slang" name="slang" value="{{$product->slang}}">
                    <small id="emailHelp" class="form-text text-muted">Alias should be unique and doesn't contain any special characters or space.</small>
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description">{{$product->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="category">Category</label>
                    <select  class="form-control" id="store_category_id" name="store_category_id">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$category->id==$product->category->id?"selected":""}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-row">
                    <div class="form-group col">
                      <label for="author">Author</label>
                      <input required type="text" class="form-control" id="author" name="author" value="{{$product->author}}">
                    </div>
                    <div class="form-group col">
                      <label for="publisher">Publisher</label>
                      <input required type="text" class="form-control" id="publisher" name="publisher" value="{{$product->publisher}}">
                    </div>
                    <div class="form-group col">
                      <label for="published_year">Year</label>
                      <input required type="number" class="form-control" id="published_year" name="published_year" value="{{$product->published_year}}">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                  <input type="hidden" name="id" id="id" value="{{$product->id}}">
            </form>
        </div>
        <div class="col">
            <form action="{{url('adm/bst/product/updateImage')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <img src="{{url('adm/bst/store_image/fetch_image')}}/{{$product->id}}" alt="" class="img-thumbnail" width="100">
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroupFileAddon01">Thumbnail</span>
                            </div>
                            <div class="custom-file">
                              <input required type="file" accept="image/*" class="custom-file-input" id="image" name="image" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                          <input type="hidden" name="id" id="id" value="{{$product->id}}">
                    </div>
                </div>
                
            </form>

            <hr>
            <form action="{{url('adm/bst/product/updatePriceQtyWeight')}}" method="POST">
              @csrf
                <div class="form-row">
                    <div class="form-group col">
                      <label for="price">Price (LKR)</label>
                      <input required type="number" class="form-control" id="price" name="price" value="{{$product->price}}">
                    </div>
                    <div class="form-group col">
                      <label for="quantity">Quantity</label>
                      <input required type="number" class="form-control" id="quantity" name="quantity" step="1" value="{{$product->quantity}}">
                    </div>
                    <div class="form-group col">
                      <label for="weight">Weight (grams)</label>
                      <input required type="number" class="form-control" id="weight" name="weight" step="10" value="{{$product->weight}}">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                  <input type="hidden" name="id" id="id" value="{{$product->id}}">
            </form>

            <hr>
            <form action="{{url('adm/bst/product/updateTag')}}" method="POST">
              @csrf
                <div class="form-row">
                  <div class="col">
                    @foreach ($tags as $tag)
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" {{$product->tags->contains($tag)?"checked":""}} type="checkbox" id="tag" name="tag[]" value="{{$tag->id}}">
                        <label class="form-check-label" for="inlineCheckbox1">{{$tag->name}}</label>
                      </div>
                    @endforeach
                  </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Save changes</button>
                <input type="hidden" name="id" id="id" value="{{$product->id}}">
            </form>
        </div>
    </div>
    
</div>
@endsection