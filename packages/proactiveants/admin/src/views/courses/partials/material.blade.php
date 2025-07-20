<div class="container">
    <div class="row">
        <div class="col">
            <form method="POST" action="{{url('adm/course/material/store')}}">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Material</label>
                  <select style="width: 100%" class="form-control select2" id="material" name="material" aria-describedby="material">
                      @foreach ($materials as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form row">
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">Month</label>
                        <input type="number" step="1" min="1" max="12" class="form-control" id="month" name="month" aria-describedby="month" value="{{date('m')}}">
                    </div>
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">Year</label>
                        <input type="number" step="1" min="2020" class="form-control" id="year" name="year" aria-describedby="year" value="{{date('Y')}}">
                    </div>
                </div>
                <input type="hidden" name="id" value="{{$course->id}}">
                <button type="submit" class="btn btn-primary">Save changes</button>
              </form>
        </div>
        <div class="col">
            <h5>Material List</h5>
            <table class="table">
                @foreach ($course->materials as $item)
                    <tr>
                        <td>{{$item->name}}</td><td>{{$item->category->name}}</td><td>Valid for {{$item->pivot->valid_for_month}}/{{$item->pivot->valid_for_year}}</td>
                        <td>
                            <form onsubmit="return confirm('Are you sure to delete?');" action="{{ url('adm/course/material/delete') }}" method="POST">
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