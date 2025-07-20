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
            <h5>Teacher</h5>
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="table-responsive">
            <form action="{{url('adm/teacher')}}/{{$teacher->id}}/update" method="POST" enctype="multipart/form-data">
                @csrf  
                <div class="form-group">
                    <label for="name">Name</label>
                    <input required type="text" class="form-control" id="name" name="name" autocomplete="off" value="{{$teacher->name}}">
                  </div>
                  <div class="form-group">
                    <label for="name">Alias</label>
                    <input required type="text" class="form-control" id="slang" name="slang" autocomplete="off" value="{{$teacher->slang}}">
                    <small id="emailHelp" class="form-text text-muted">Alias should be unique and doesn't contain any special characters or space.</small>
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="summernote" name="description">{!! $teacher->description !!}</textarea>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Thumbnail</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" accept="image/*" class="custom-file-input" id="image" name="image" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="rank">Rank</label>
                    <input required type="number" class="form-control" id="rank" name="rank" autocomplete="off" value="{{$teacher->rank}}">
                  </div>
                  <input type="hidden" name="id" value="{{$teacher->id}}">
                  <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</div>
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