<form method="POST" action="{{url('adm/bst/order/update')}}">
    @csrf
    <div class="modal fade" id="order-view" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-light">
            <h5 class="modal-title">Order Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col">
                    <table class="table table-bordered">
                        @foreach ($order->products as $item)
                            <tr>
                                <td>{{$item->product->name}}</td><td>{{$item->quantity}}</td><td>{{number_format($item->amount,2)}}</td>
                            </tr>
                        @endforeach
                        <tr class="font-weight-bold">
                            <td colspan="2">TOTAL</td><td>{{number_format($order->products->sum('amount'),2)}}</td>
                        </tr>
                    </table>
                </div>
                <div class="col">
                    <h5 class="text-primary">Delivery Details</h5>
                    <hr>
                    <p class="text-info">{{$order->delivery->first_name}} {{$order->delivery->last_name}}<br>
                    {{$order->delivery->address_line}}<br>
                    @if (!$order->delivery->street=="")
                        {{$order->delivery->street}}<br>
                    @endif
                    {{$order->delivery->city}}<br>
                    {{$order->delivery->district}}<br>
                    {{$order->delivery->telephone}}<br>
                    {{$order->delivery->email}}</p>
                </div>
                <div class="col">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Order ID</label>
                    <input type="text" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$order->id}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Date</label>
                        <input type="text" readonly class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$order->date}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <select class="form-control" id="status" name="status" aria-describedby="emailHelp">
                            <option value="DISPATCHED">Dispatched</option>
                            <option value="CANCELED">Canceled</option>
                        </select>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
            <input type="hidden" id="id" name="id" value="{{$order->id}}">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>
</form>