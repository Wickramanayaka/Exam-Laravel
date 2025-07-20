@extends('admin::layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Exams</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{url('adm/ex/paper')}}" class="btn btn-sm btn-outline-secondary" ><span data-feather="paperclip"> </span>
                Exam Papers
            </a>
          </div>
          </button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Exam Question List</h5>
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
                  <th>Question</th>
                  <th>Answer</th>
                  <th>Grade and Subject</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($questions as $question)
                      <tr>
                          <td>{{$question->id}}</td>
                          <td>{!! $question->question !!}</td>
                          <td>
                              @foreach ($question->answers as $answer)
                              {{ $answer->answer_number }}. {!! $answer->answer !!} @if ($answer->is_correct==1) <span data-feather="check" class="text-success"></span> @endif<br>
                              @endforeach
                          </td>
                          <td>{{$question->course->name}}</td>
                          <td>
                            <form onsubmit="return confirm('Are you sure to delete?');" action="{{ url('adm/ex/que/delete') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link p-1 font-weight-bold text-danger"><span data-feather="trash-2"></span> Delete</button>
                                <input type="hidden" name="id" value="{{$question->id}}">
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
@endsection