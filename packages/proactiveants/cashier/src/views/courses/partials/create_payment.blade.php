<div class="modal fade" id="createPaymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{url('cashier/course/payment/store')}}" method="POST">
      @csrf  
      <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-light">
                <h5 class="modal-title" id="exampleModalLabel">Create a new payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                      <div class="form-group">
                        <label for="name">Course</label>
                        <select class="form-control select2" id="course_id" name="course_id" autocomplete="off" style="width: 100%">
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="name">User</label>
                        <select class="form-control select2" multiple id="user_id" name="user_id[]" autocomplete="off" style="width: 100%">
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->reg_number}} - {{$user->name}} ({{$user->telephone}})</option>
                            @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="time">Fee</label>
                        <input required type="number" step="10" class="form-control" id="fee" name="fee">
                    </div>
                    <div class="form-group">
                        <label for="memo">Memo</label>
                        <input required type="text" class="form-control" id="memo" name="memo">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="month">Month</label>
                                <input required type="number" step="1" class="form-control" id="month" name="month" value="{{date('n')}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="year">Year</label>
                                <input required type="number" step="1" class="form-control" id="year" name="year" value="{{date('Y')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="hidden" name="method" value="Offline">
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>