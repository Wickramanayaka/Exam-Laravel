@extends('cashier::layouts.app')
@section('content')
<div class="contrainer">
    <br>
    <div class="row">
        <div class="col">
            <h5>Monthly Course Attendance</h5>
        </div>
    </div>
</div>
<hr>
<div class="container">
    <div class="row">
        <form action="#" method="GET" class="row">
            <div class="col">
                <label for="course">Course</label>
                <select name="course" id="course" class="form-control">
                    @foreach ($courses as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="month">Month</label>
                <select name="month" id="month" class="form-control">
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <div class="col">
                <label for="year">Year</label>
                <select name="year" id="year" class="form-control">
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                </select>
            </div>
            <div class="col">
                <button class="btn btn-primary" type="submit">Generare Attendance List</button>
            </div>
            <div class="col">
                <button class="btn btn-danger" onclick="print()">Print Attendance List</button>
            </div>
        </form>
    </div>
</div>
<hr>
<div class="container" id="print">
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-dark">
                @foreach ($attendance as $item)
                    <tr>
                        <td>{{$item['user']==null?"":$item['user']->reg_number}}</td>
                        <td>{{$item['user']==null?"":$item['user']->name}}</td>
                        <td>{{$item['course']==null?"":$item['course']->name}}</td>
                        @foreach ($item['check_in'] as $d)
                            <td>{{$d->check_in->format('d/m')}}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
    function print(){
        var printWindow = window.open('','PRINT','');
        printWindow.document.write('<style>table,tr,td{border: 1px solid #000;padding: 5px;}</style>')
        printWindow.document.write(document.getElementById('print').innerHTML);
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
        return true;
    }
    
</script>
@endsection