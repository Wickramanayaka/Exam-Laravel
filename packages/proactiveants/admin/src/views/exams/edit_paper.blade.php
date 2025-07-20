@extends('admin::layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Exams</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{url('adm/ex/paper')}}" class="btn btn-sm btn-outline-secondary"><span data-feather="paperclip"></span> 
                Exam Paper
            </a>
          </div>
          </button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Exam Paper Edit</h5>
        </div>
        <div class="col-auto">
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="table-responsive">
            <form action="{{url('adm/ex/paper/update')}}" method="POST">
                @csrf
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Alias</th>
                        <th>Course</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                            <input type="text" readonly class="form-control-plaintext" id="id" name="id" value="{{$paper->id}}">
                        </td>
                        <td>
                            <input class="form-control" type="text" name="name" id="name" value="{{$paper->name}}" required>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="slang" id="slang" value="{{$paper->slang}}" required>
                        </td>
                        <td>
                            <input type="text" readonly class="form-control-plaintext" name="grade_subject" id="grade_subject" value="{{$paper->course->name}}">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Exam Paper Question List</h5>
        </div>
        <div class="col-auto">
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="table-responsive">
            <form action="{{url('adm/ex/paper/question/update')}}" method="POST">
                @csrf
                <table class="table table-striped table-bordered table-sm">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Question Number</th>
                    <th>Duration</th>
                    <th>Point</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paper->questions as $item)
                        <tr>
                            <td>
                                <input type="text" readonly class="form-control-plaintext" id="id" name="id[]" value="{{$item->pivot->id}}">
                            </td>
                            <td>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="question_number[]" id="question_number" value="{{$item->pivot->question_number}}" aria-describedby="basic-addon2" required>
                                </div>
                            </td>
                            <td>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="duration[]" id="duration" value="{{$item->pivot->duration}}" aria-describedby="basic-addon2" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">min</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="mark[]" id="mark" value="{{$item->pivot->mark}}" aria-describedby="basic-addon2" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">pts</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</div>
@endsection