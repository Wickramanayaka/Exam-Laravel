@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Lesson</h1>
    </div>
    <div class="row">
        <div class="col">
            <h5>Lesson Subscription List</h5>
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
                  <th>Customer</th>
                  <th>Date</th>
                  <th>Lesson</th>
                  <th>Payment</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($subscriptions as $item)
                      <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->user->name}}</td>
                          <td>{{$item->date}}</td>
                          <td>{{$item->gradeSubject->grade->name.'-'.$item->gradeSubject->subject->name}}</td>
                          <td>{{$item->amount}}</td>
                          <td><a href="{{url('/adm/lsn/sub/activate').'/'.$item->id}}"><strong>{{$item->status}}</strong></a></td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
            {{ $subscriptions->appends(['keyword' => $keyword])->render() }}
        </div>
    </div>
</div>
<div id="view-holder"></div>
@endsection
@section('javascript')
    <script>
        function getOrder(id){
            $.get('{{url('adm/bst/order')}}/' + id, function(res){
                $('#view-holder').html(res);
                $('#order-view').modal('show');
            });
        }
    </script>
@endsection