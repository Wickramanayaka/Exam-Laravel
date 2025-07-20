@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Lesson</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#createVideoModal"><span data-feather="plus-circle"></span> 
                New Video
            </button>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Lesson View</h5>
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Unit</th>
                  <th>Description</th>
                  <th>Grade</th>
                  <th>Subject</th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>{{$unit->id}}</td>
                      <td>{{$unit->name}}</td>
                      <td style="width: 50%;">{{$unit->description}}</td>
                      <td>{{$unit->grade->name}}</td>
                      <td>{{$unit->subject->name}}</td>
                  </tr>
              </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h5>Video Content</h5>
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Duration</th>
                    <th>Sequence</th>
                    <th>URL</th>
                    <th>Published</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($unit->videos as $video)
                    <tr>
                        <td>{{$video->id}}</td>
                        <td>{{$video->name}}
                            @if ($video->free==1)
                                <span class="badge badge-danger pt-1">FREE</span>
                            @endif
                        </td>
                        <td>{{$video->duration}} min</td>
                        <td>{{$video->sequence}}</td>
                        <td>{{$video->url}}</td>
                        <td><a href="{{url('adm/lsn/vdo/publish').'/'.$video->id}}" class="font-weight-bold">{{$video->published}}</a></td>
                        <td>
                            <form onsubmit="return confirm('Are you sure to delete?');" action="{{ url('adm/lsn/vdo/delete') }}" method="POST">
                              @csrf
                              <a href="" data-url="{{$video->url}}" class="p-1 font-weight-bold play"><span data-feather="video" style="display: inline-block; vertical-align: -3px;"></span> Watch</a> 
                              <button type="submit" class="btn btn-link p-1 font-weight-bold text-danger"><span data-feather="trash-2" style="display: inline-block; vertical-align: -3px;"></span> Delete</button>
                              <input type="hidden" name="id" value="{{$video->id}}">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('admin::lesson.partials.create_video')
@include('admin::lesson.partials.watch_video')
@endsection
@section('javascript')
<script>
    $('.play').on('click', function(e){
        e.preventDefault();
        var button = $(this);
        var url = button.data('url');
        console.log(url);
        var modal = $('#watch-video');
        $('#iframe').attr('src',url);
        modal.modal('show');
        //$('#watch-video').modal('show');
    });
</script>
@endsection