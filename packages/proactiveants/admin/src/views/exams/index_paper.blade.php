@extends('admin::layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Exams</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#createPaper"><span data-feather="plus-circle"></span> 
                New Exam Paper
            </button>
            <a href="{{url('adm/ex/que')}}" class="btn btn-sm btn-outline-secondary"><span data-feather="archive"></span> 
                Questions
            </a>
          </div>
          </button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Exam Paper List</h5>
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
                  <th>Course</th>
                  <th>Free</th>
                  <th>Published</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($papers as $paper)
                      <tr>
                          <td>{{$paper->id}}</td>
                          <td>{{$paper->name}}</td>
                          <td>{{$paper->course->name}}</td>
                          <td>{{$paper->is_free==1?"Yes":"No"}}</td>
                          <td><a href="{{url('adm/ex/paper').'/'.$paper->id.'/publish'}}">{{$paper->published==1?"Yes":"No"}}</a></td>
                          <td>
                            <form onsubmit="return confirm('Are you sure to delete?');" action="{{ url('adm/ex/paper/delete') }}" method="POST">
                                @csrf
                                <a href="{{url('/adm/ex/paper').'/'.$paper->id.'/view'}}" class="p-1 font-weight-bold"><span data-feather="eye"></span> View</a>
                                <a href="{{url('/adm/ex/paper').'/'.$paper->id.'/edit'}}" class="p-1 font-weight-bold"><span data-feather="edit"></span> Edit</a>
                                <button type="submit" class="btn btn-link p-1 font-weight-bold text-danger"><span data-feather="trash-2"></span> Delete</button>
                                <input type="hidden" name="id" value="{{$paper->id}}">
                            </form>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
            {{ $papers->appends(['keyword'=>$keyword])->render() }}
        </div>
    </div>
</div>
@include('admin::exams.partials.create_paper')
@endsection