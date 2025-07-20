@extends('admin::layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Exams</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <a href="{{url('/adm/ex/paper')}}" class="btn btn-sm btn-outline-secondary"> <span data-feather="paperclip"> </span>
                  Exam Papers
              </a>
            </div>
            </button>
          </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>{{$paper->name}}</h5>
        </div>
        <div class="col-auto">
            <h6>{{$paper->course->name}}</h6>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col">
            @foreach ($paper->questions as $question)
                <div class="card mb-3">
                    <div class="card-body">
                    <h5 class="card-title text-right">#{{$question->pivot->question_number}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted text-right">{{$question->pivot->mark}} point(s)</h6>
                    <p class="card-text">{!! $question->question !!}</p>
                    @foreach ($question->answers as $answer)
                        <p class="ml-5">
                            {{$answer->answer_number}}. {!! $answer->answer !!}
                            @if ($answer->is_correct==1)
                                <span data-feather="check" class="text-success"></span>
                            @endif
                        </p>
                    @endforeach
                    <form action="{{url('adm/ex/paper/removeQuestion')}}" method="POST" onsubmit="return confirm('Do you want to delete?');">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$question->pivot->id}}">
                        <p class="text-right"><button type="submit" class="btn btn-link card-link text-danger"><span data-feather="trash-2"></span> Remove</button>
                        <a href="#" class="card-link"><span data-feather="edit"></span> Edit</a>
                        <a href="{{url('adm/ex/paper/up').'/'.$question->pivot->id}}" class="card-link text-success"><span data-feather="arrow-up-circle"></span> Move UP</a>
                        <a href="{{url('adm/ex/paper/down').'/'.$question->pivot->id}}" class="card-link text-success"><span data-feather="arrow-down-circle"></span> Move DOWN</a></p>
                    </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row justify-content-md-center mb-5">
        <div class="col-md-auto">
            <button class="btn btn-primary" data-toggle="modal" data-target="#createQuestionModal"><span data-feather="plus-circle"></span> New Question</button>
            &nbsp; or 
            <a href="{{url('/adm/ex/paper').'/'.$paper->id.'/addQuestion'}}" class="btn btn-link"><span data-feather="database"></span> Add Existing</a>
        </div>
    </div>
</div>
@include('admin::exams.partials.create_question')
@endsection
@section('javascript')
    <script>
        $(document).ready(function(){
            $('#summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear','strikethrough', 'superscript', 'subscript']],
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