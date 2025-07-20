@extends('cashier::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Course</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#createPaymentModal"><span data-feather="plus-circle"></span> 
                New Payment
            </button>
            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="printContent()"><span data-feather="printer"></span> Print</button>
            <a type="button" href="{{url('cashier/course/payment/export')}}" class="btn btn-sm btn-outline-secondary"><span data-feather="download"></span> Export</a>
          </div>
          </button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Payment List</h5>
        </div>
        {{--<div class="col-auto">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>--}}
    </div>
    <div class="row">
      <div class="col">
        @include('admin::courses.partials.payment_filters')
      </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="table-responsive" id="data">
            <table class="table table-striped table-bordered table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Reg.</th>
                  <th>User</th>
                  <th>Course</th>
                  <th>Teacher</th>
                  <th>Date</th>
                  <th>Fee</th>
                  <th>Method</th>
                  <th>Slip</th>
                  <th>Status</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($payments as $item)
                      <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->user->reg_number}}</td>
                          <td>{{$item->user->name}}</td>
                          <td>{{$item->course->name}}</td>
                          <td>{{$item->course->teacher->name}}</td>
                          <td>{{$item->date}}</td>
                          <td>{{$item->amount}}</td>
                          <td>
                            @if ($item->method=="Online" || $item->method=="Deposit")
                              <a href="{{url('/cashier/course/payment/download')}}/{{$item->id}}">download</a>
                            @endif
                          </td>
                          <td class="text-{{$item->status=='PAID'?'success':'danger'}}">
                            @if ($item->status=="PAID")
                              {{$item->status}}
                            @else
                              <form onsubmit="return confirm('Are you sure to confirm the payment?');" action="{{url('/cashier/course/payment/confirm')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">{{$item->status}}</button>
                                <input type="hidden" name="id" value="{{$item->id}}">
                              </form>
                            @endif
                          </td>
                          <td>
                              <form onsubmit="return confirm('Are you sure to delete?');" action="{{url('/cashier/course/payment/delete')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link text-danger font-weight-bold"><span data-feather="trash-2"></span> Delete</button>
                                <input type="hidden" name="id" value="{{$item->id}}">
                              </form>
                          </td>
                        </tr>
                  @endforeach
                  <tr>
                    <td class="text-center"><b>Count</b></td>
                    <td><b>{{$payments->count()}}</b></td>
                    <td colspan="4" class="text-center"><b>Total</b></td>
                    <td colspan="5"><b>{{number_format($payments->sum('amount'),2)}}</b></td>
                  </tr>
              </tbody>
            </table>
            {{ $payments->appends(['keyword'=>$keyword])->render() }}
        </div>
    </div>
</div>
@include('cashier::courses.partials.create_payment')
@endsection
@section('javascript')
    <script>
        $(document).ready(function(){
        $('.select2').select2();
        });
    </script>
    <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $(document).ready(function(){
        $("#ajax-form").bind('submit', function(e){
            e.preventDefault();
            $("#data").html(`<div class="col text-center"><img src="{{asset('images/icons/loader.gif')}}" alt="" width="100">`);
            $.post(
              "{{url('cashier/course/payment/search')}}",
              {
                'id': $('#id').val(),
                'fromdate': $('#fromdate').val(),
                'todate': $('#todate').val(),
                'amount': $('#amount').val(),
                'status': $('#status').val(),
                'method': $('#method').val(),
                'reg_number': $('#reg_number').val(),
                'name': $('#name').val(),
                'course': $('#course').val(),
                'teacher': $('#teacher').val()
              },
              function(result){
                $("#data").html(result);
              }
            );
        });
      });
    </script>
@endsection