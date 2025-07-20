<table class="table table-striped table-bordered table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Reg.No.</th>
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
                <td>{{$item->method}}</td>
                <td>
                  @if ($item->method=="Online" || $item->method=="Deposit")
                    <a href="{{url('/adm/course/payment/download')}}/{{$item->id}}">download</a>
                  @endif
                </td>
                <td class="text-{{$item->status=='PAID'?'success':'danger'}}">
                  @if ($item->status=="PAID")
                    {{$item->status}}
                  @else
                    <form onsubmit="return confirm('Are you sure to confirm the payment?');" action="{{url('/adm/course/payment/confirm')}}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-danger btn-sm">{{$item->status}}</button>
                      <input type="hidden" name="id" value="{{$item->id}}">
                    </form>
                  @endif
                </td>
                <td>
                    <form onsubmit="return confirm('Are you sure to delete?');" action="{{url('/adm/course/payment/delete')}}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-link text-danger font-weight-bold"><span data-feather="trash-2"></span> Delete</button>
                      <input type="hidden" name="id" value="{{$item->id}}">
                    </form>
                </td>
              </tr>
        @endforeach
        <tr>
            <td colspan="6" class="text-center"><b>Total</b></td>
            <td colspan="5"><b>{{number_format($payments->sum('amount'),2)}}</b></td>
          </tr>
    </tbody>
    <tfoot>
    </tfoot>
  </table>