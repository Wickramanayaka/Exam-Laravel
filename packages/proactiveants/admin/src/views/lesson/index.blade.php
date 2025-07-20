@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Lesson</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#createLessonModal"><span data-feather="plus-circle"></span> 
                New Lesson
            </button>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Lesson List</h5>
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
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Unit</th>
                  <th>Grade</th>
                  <th>Subject</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($units as $item)
                      <tr>
                          <td>{{$item->id}}</td>
                          <td class="text-truncate" style="max-width: 350px;">{{$item->number}}. {{$item->name}}</td>
                          <td>{{$item->grade->name}}</td>
                          <td>{{$item->subject->name}}</td>
                          <td>
                            <form onsubmit="return confirm('Are you sure to delete?');" action="{{ url('adm/lsn/delete') }}" method="POST">
                              @csrf
                              <a href="{{url('adm/lsn').'/'.$item->id}}" class="p-1 font-weight-bold"><span data-feather="edit"></span> View</a> 
                              <button type="submit" class="btn btn-link p-1 font-weight-bold text-danger"><span data-feather="trash-2"></span> Delete</a>
                              <input type="hidden" name="id" value="{{$item->id}}">
                            </form>
                          </td>
                      </tr>
                      @foreach ($item->videos as $video)
                          <tr>
                            <td></td>
                            <td colspan="5">
                              <span data-feather="video"></span> 
                              <span class="badge badge-info pt-1">{{$video->name}}</span>
                              @if ($video->free==1)
                                <span class="badge badge-danger pt-1">FREE</span>
                              @endif
                            </td>
                          </tr>
                      @endforeach
                  @endforeach
              </tbody>
            </table>
            {{ $units->appends(['keyword'=> $keyword])->render()}}
        </div>
    </div>
</div>
@include('admin::lesson.partials.create_lesson')
@endsection