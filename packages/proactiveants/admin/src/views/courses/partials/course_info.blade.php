<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="{{url('adm/course/update')}}" method="POST" enctype="multipart/form-data">
                @csrf  
                <div class="form-group">
                    <label for="name">Name</label>
                    <input required type="text" class="form-control" id="name" name="name" autocomplete="off" value="{{$course->name}}">
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="day">Day</label>
                            <select required  class="form-control" id="day" name="day">
                                <option value="සඳුදා" {{$course->day=="සඳුදා"?"selected":""}}>සඳුදා</option>
                                <option value="අඟහරුවාදා" {{$course->day=="අඟහරුවාදා"?"selected":""}}>අඟහරුවාදා</option>
                                <option value="බදාදා" {{$course->day=="බදාදා"?"selected":""}}>බදාදා</option>
                                <option value="බ්‍රහස්පතින්දා" {{$course->day=="බ්‍රහස්පතින්දා"?"selected":""}}>බ්‍රහස්පතින්දා</option>
                                <option value="සිකුරාදා" {{$course->day=="සිකුරාදා"?"selected":""}}>සිකුරාදා</option>
                                <option value="සෙනසුරාදා" {{$course->day=="සෙනසුරාදා"?"selected":""}}>සෙනසුරාදා</option>
                                <option value="ඉරිදා" {{$course->day=="ඉරිදා"?"selected":""}}>ඉරිදා</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input required type="text" class="form-control" id="time" name="time" value="{{$course->time}}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="fee">Fee</label>
                            <input required type="number" class="form-control" id="fee" name="fee" value="{{$course->fee}}">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="{{$course->id}}">
                <button type="submit" class="btn btn-primary">Save changes</button>
              </form>
        </div>
    </div>
</div>