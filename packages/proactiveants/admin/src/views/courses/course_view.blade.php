@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Course</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{url('adm/course')}}" type="button" class="btn btn-sm btn-outline-secondary"><span data-feather="headphones"></span> 
                Courses
            </a>
            <a href="{{url('adm/teacher')}}" type="button" class="btn btn-sm btn-outline-secondary"><span data-feather="user"></span> Teacher</a>
          </div>
          </button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>{{$course->name}}</h5>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="course-tab" data-toggle="tab" href="#course" role="tab" aria-controls="course" aria-selected="true">Course</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="material-tab" data-toggle="tab" href="#material" role="tab" aria-controls="material" aria-selected="false">Materials</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="false">Videos</a>
              </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="link-tab" data-toggle="tab" href="#link" role="tab" aria-controls="link" aria-selected="false">Online meeting</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="link-tab" data-toggle="tab" href="#enroll" role="tab" aria-controls="enroll" aria-selected="false">Enroll</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
              <!-- Course basic information -->
            <div class="tab-pane fade show active pt-3" id="course" role="tabpanel" aria-labelledby="course-tab">
                @include('admin::courses.partials.course_info')
            </div>
            <!-- Materials -->
            <div class="tab-pane fade pt-3" id="material" role="tabpanel" aria-labelledby="material-tab">
                @include('admin::courses.partials.material')
            </div>
            <!-- Videos -->
            <div class="tab-pane fade pt-3" id="video" role="tabpanel" aria-labelledby="video-tab">
                @include('admin::courses.partials.video')
            </div>
            <!-- Links -->
            <div class="tab-pane fade pt-3" id="link" role="tabpanel" aria-labelledby="link-tab">
                @include('admin::courses.partials.link')
            </div>
            <!-- Enrolls -->
            <div class="tab-pane fade pt-3" id="enroll" role="tabpanel" aria-labelledby="link-tab">
                @include('admin::courses.partials.enroll')
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function(){
            $('#linkTextArea').summernote({
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
            $('.select2').select2();
        });
    </script>
@endsection