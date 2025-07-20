<div class="container">
    <div class="row">
        <div class="col">
            <form method="POST" action="{{url('adm/course/video/store')}}">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Video</label>
                  <select style="width: 100%" class="form-control select2" id="video" name="video" aria-describedby="material" required>
                      @foreach ($videos as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form row">
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">Publish Date</label>
                        <input type="text" class="form-control datepicker" id="date" name="date" aria-describedby="date" autocomplete="off" required>
                    </div>
                </div>
                <input type="hidden" name="id" value="{{$course->id}}">
                <button type="submit" class="btn btn-primary">Save changes</button>
              </form>
        </div>
        <div class="col">
            <h5>Video List</h5>
            <table class="table">
                @foreach ($course->videos as $item)
                    <tr>
                        <td>{{$item->name}}</td><td>{{$item->pivot->valid_for_month}}/{{$item->pivot->valid_for_year}}</td>
                        <td>
                            <form onsubmit="return confirm('Are you sure to delete?');" action="{{ url('adm/course/video/delete') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link p-1 font-weight-bold text-danger"><span data-feather="trash-2"></span> Delete</button>
                                <input type="hidden" name="id" value="{{$item->pivot->id}}">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>