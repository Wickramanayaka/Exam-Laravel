@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Teacher</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#createTeacherModal"><span data-feather="plus-circle"></span> 
                New Teacher
            </button>
            <a href="{{url('adm/course')}}" type="button" class="btn btn-sm btn-outline-secondary"><span data-feather="headphones"></span> Course</a>
          </div>
          </button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Teacher List</h5>
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
                  <th>Name</th>
                  <th>Rank</th>
                  <th>Active</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($teachers as $item)
                      <tr>
                          <td><img src="{{url('adm/teacher/store_image/fetch_image')}}/{{$item->id}}" alt="" class="img-thumbnail" width="75"></td>
                          <td>{{$item->id}}</td>
                          <td><a href="{{url('adm/teacher')}}/{{$item->id}}/view">{{$item->name}}</a></td>
                          <td>{{$item->rank}}</td>
                          <td><a href="{{url('adm/teacher')}}/{{$item->id}}/activate">{{$item->active==1?"Yes":"No"}}</a></td>
                          <td>
                            <form onsubmit="return confirm('Are you sure to delete?');" action="{{ url('adm/lib/delete') }}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-link p-1 font-weight-bold text-danger disabled"><span data-feather="trash-2"></span> Delete</button>
                              <input type="hidden" name="id" value="{{$item->id}}">
                            </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
            {{ $teachers->appends(['keyword'=>$keyword])->render() }}
        </div>
    </div>
    {{--<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>--}}
</div>
@include('admin::teachers.partials.create_teacher')
@endsection
@section('javascript')
<script>
    $(document).ready(function(){
        $('#summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['help']]
            ]
        });
        $('.dropdown-toggle').dropdown();
    });
</script>
@endsection