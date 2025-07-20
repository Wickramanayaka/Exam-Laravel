<div class="container">
    <div class="row">
        <div class="col">
            <form method="POST" action="{{url('adm/course/link/store')}}">
                @csrf
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" id="description", name="description" required>
                </div>
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" class="form-control" id="link", name="link" required>
                  </div>
                <input type="hidden" name="id" value="{{$course->id}}">
                <button type="submit" class="btn btn-primary">Save changes</button>
              </form>
        </div>
        <div class="col">
            <h5>Online meeting links</h5>
            <br>
            <table class="table table-bordered">
                @foreach ($links as $item)
                    <tr>
                        <td>{{$item->description}}</td>
                        <td><a href="{{$item->link}}" target="_blank" class="btn btn-danger">Join meeting</a></td>
                        <td>
                            <form onsubmit="return confirm('Are you sure to delete?');" action="{{ url('adm/course/link/delete') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link p-1 font-weight-bold text-danger"><span data-feather="trash-2"></span> Delete</button>
                                <input type="hidden" name="id" value="{{$item->id}}">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>