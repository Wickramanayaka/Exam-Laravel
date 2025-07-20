@extends('admin::layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">SMS Messages</h1>
    </div>
    <div class="row">
        <div class="col">
            <h5>SMS List</h5>
        </div>
        <div class="col-auto">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{url('adm/sms/send')}}" method="POST">
                @csrf
                @if (session()->has('message'))
                    <div class="alert alert-success mt-2 alert-dismissible fade show" role="alert" id="auto-out">
                        {{session()->get('message')}}                   
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="form-group">
                    <label for="name">User</label>
                    <select required class="form-control select2" multiple id="user_id" name="user_id[]" autocomplete="off" style="width: 100%">
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->id}} - {{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Message</label>
                    <textarea required class="form-control" name="message" id="message" cols="30" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-danger btn-block">Send</button>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Message</th>
                  <th>Telephone</th>
                  <th>Date</th>
                  <th>Reg.</th>
                  <th>Name</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($messages as $item)
                      <tr>
                          <td>{{$item->id}}</td>
                          <td>{{$item->message}}</td>
                          <td>{{$item->user->telephone}}</td>
                          <td>{{$item->created_at}}</td>
                          <td>{{$item->user->id}}</td>
                          <td>{{$item->user->name}}</td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
            {{ $messages->appends(['keyword'=>$keyword])->render() }}
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <script>
        $(document).ready(function(){
          $('.select2').select2();
        });
        $('#auto-out').fadeTo(2000,500).slideUp(500, function(){
            $('#auto-out').slideUp(500);
        })
    </script>
@endsection