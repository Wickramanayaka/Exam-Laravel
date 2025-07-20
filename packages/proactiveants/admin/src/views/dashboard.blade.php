@extends('admin::layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="row no-gutters">
                  <div class="col-md-3">
                    <img src="{{asset('images/adm/teacher.jpg')}}" class="card-img" alt="Person 1">
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <h5 class="card-title text-center"><b>{{App\Teacher::count()}}</b></h5>
                      <p class="card-text text-center"  style="margin-top:-6px; margin-bottom:-6px;">Teachers</p>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="row no-gutters">
                  <div class="col-md-3">
                    <img src="{{asset('images/adm/user.jpg')}}" class="card-img" alt="Person 1">
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <h5 class="card-title text-center"><b>{{App\User::where('active',1)->count()}}</b></h5>
                      <p class="card-text text-center" style="margin-top:-6px; margin-bottom:-6px;">Users</p>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="row no-gutters">
                  <div class="col-md-3">
                    <img src="{{asset('images/adm/course.jpg')}}" class="card-img" alt="Person 1">
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <h5 class="card-title text-center"><b>{{\ProactiveAnts\Course\Course::where('publish', 1)->count()}}</b></h5>
                      <p class="card-text text-center" style="margin-top:-6px; margin-bottom:-6px;">Courses</p>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Latest Payments
                </div>
                <div class="card-body">
                  <table class="table">
                      <tr>
                          <th>Reg.No.</th><th>Date</th><th>Amount</th>
                      </tr>
                      @foreach ($payments as $item)
                          <tr class="text-{{$item->status=="UNPAID"?"danger":"dark"}}">
                              <td>{{$item->user->reg_number}}</td><td>{{$item->date}}</td><td>{{$item->amount}}</td>
                          </tr>
                      @endforeach
                  </table>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h6>Payments</h6>
            <canvas class="my-4" id="myChart"></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h6>Course wise payments</h6>
            <canvas class="my-4" id="myChartCourse"></canvas>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    New registration
                </div>
                <div class="card-body">
                  <table class="table">
                      <tr>
                          <th>Name</th><th>Telephone</th>
                      </tr>
                      @foreach ($users as $item)
                          <tr>
                              <td>{{$item->name}}</td><td>{{$item->telephone}}</td>
                          </tr>
                      @endforeach
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: {!! $labels !!},
          datasets: [{
            data: {!! $amounts !!},
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
    <script>
        var ctx = document.getElementById("myChartCourse");
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: {!! $c_labels !!},
            datasets: [{
              data: {!! $c_amounts !!},
              lineTension: 0,
              backgroundColor: 'transparent',
              borderColor: '#007bff',
              borderWidth: 4,
              pointBackgroundColor: '#007bff'
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            },
            legend: {
              display: false,
            }
          }
        });
      </script>
@endsection