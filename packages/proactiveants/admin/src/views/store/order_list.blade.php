@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bookstore</h1>
    </div>
    <div class="row">
        <div class="col">
            <h5>Order List</h5>
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
                  <th>Status</th>
                  <th>Delivery</th>
                  <th>Payment</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($orders as $order)
                      <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user->first_name}} {{$order->user->last_name}}<br>
                            {{--<small class="text-info">Tel: {{$order->user->telephone}}<br>
                            Email: {{$order->user->email}}</small>--}}
                        </td>
                        <td>{{$order->date}}</td>
                        <td>
                            <span class="badge badge-secondary">{{$order->status}}</span><br>
                            <small class="text-secondary">Last update: {{$order->updated_at}}</small>
                        </td>
                        <td><span class="badge badge-primary">{{$order->delivery_type}}</span></td>
                        <td><span class="badge badge-success">{{$order->payment_type}}</span></td>
                        <td>
                          <a href="#" class="p-1 font-weight-bold" onclick="getOrder({{$order->id}})"><span data-feather="edit"></span> View</a>
                          {{--<a href="#" onclick="event.preventDefault(); 
                            document.getElementById('delete-form-{{$order->id}}').submit();" class="p-1 font-weight-bold text-danger"><span data-feather="trash-2"></span> Delete</a>
                            <form id="delete-form-{{$order->id}}" action="{{ url('adm/bst/order/delete') }}" method="POST" style="display: none;">
                              @csrf
                              <input type="hidden" name="id" value="{{$order->id}}">
                            </form>--}}
                        </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
            {{ $orders->appends(['keyword' => $keyword])->render() }}
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