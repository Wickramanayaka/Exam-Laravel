<div class="container">
    <div class="row">
        <div class="col">
            <h5>Enroll List</h5>
            <table class="table">
                @foreach ($course->enrolls as $item)
                    <tr>
                        <td>{{$item->user->reg_number}} - {{$item->user->name}}</td>
                        <td>
                            <form onsubmit="return confirm('Are you sure to delete?');" action="{{ url('adm/course/enroll/delete') }}" method="POST">
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