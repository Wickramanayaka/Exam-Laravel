@extends('admin::layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Exams</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#createPaperSetModal"><span data-feather="plus-circle"></span> 
                New Exam Paper Set
            </button>
            <a href="{{url('adm/ex/paper')}}" class="btn btn-sm btn-outline-secondary" ><span data-feather="paperclip"> </span>
                Exam Papers
            </a>
          </div>
          </button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Exam Paper Set List</h5>
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
                  <th>Category</th>
                  <th>Grade</th>
                  <th>Papers</th>
                  <th class="text-right">Price</th>
                  <th>Published</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($sets as $item)
                      <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->grade->name}}</td>
                        <td>
                          @foreach ($item->papers as $p)
                              {{$p->name}}
                              @if (!$loop->last)
                                  ,
                              @endif
                          @endforeach
                        </td>
                        <td class="text-right">{{$item->price}}</td>
                        <td>{{$item->published==1?"Yes":"No"}}</td>
                        <td>
                          <form onsubmit="return confirm('Are you sure to delete?');" action="{{url('adm/ex/delete')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{$item->id}}">
                            <button type="submit" class="btn btn-link p-1 font-weight-bold text-danger"><span data-feather="trash-2"></span> Delete</button>
                          </form>
                        </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
            {{-- $materials->appends(['keyword'=>$keyword])->render() --}}
        </div>
    </div>
</div>
@include('admin::exams.partials.create_paper_set')
@endsection
@section('javascript')
<script>
    $(document).ready(function(){
      $('.select2').select2();
    });
</script>

@endsection