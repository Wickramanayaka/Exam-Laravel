@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
    </div>
    <div class="row">
        <div class="col">
            <h5>User View</h5>
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-lg">
              <tbody>
                <tr>
                    <td>Name</td><td>{{$user->name}}</td>
                </tr>
                <tr>
                    <td>Reg No.</td><td>{{$user->reg_number}}</td>
                </tr>
                <tr>
                    <td>Telephone</td><td>{{$user->telephone}}</td>
                </tr>
                <tr>
                    <td>Address</td><td>{{$user->address_line}}</td>
                </tr>
                <tr>
                    <td>School</td><td>{{$user->school}}</td>
                </tr>
                <tr>
                    <td>Course</td><td>{{$user->tuition_class}}</td>
                </tr>
                <tr>
                    <td>Created at</td><td>{{$user->created_at}}</td>
                </tr>
                <tr>
                    <td>Last accessed at</td><td>{{$user->updated_at}}</td>
                </tr>
                <tr>
                    <td>Status</td><td class="text-{{$user->active==1?"success":"secondary"}}">{{$user->active==1?"ACTIVE":"INACTIVE"}}</td>
                </tr>
                <tr>
                    <td>QR</td>
                    <td>
                        @php
                            $link = url('cashier/payment') .'?id=' . $user->slang;
                        @endphp
                        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{$link}}&choe=UTF-8" alt="">
                    </td>
                </tr>
                <tr>
                    <td>Barcode</td>
                    <td>
                        @php
                            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($user->reg_number, $generator::TYPE_CODE_128)) . '">';
                        @endphp 
                    </td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection