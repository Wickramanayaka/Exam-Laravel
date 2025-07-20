<form action="{{url('/adm/ex/paper/store')}}" method="POST">
    @csrf
    <div class="modal fade" id="createPaper" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Exam Paper</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="name">Alias</label>
                    <input type="text" class="form-control" id="slang" name="slang" required>
                    <small id="emailHelp" class="form-text text-muted">Alias should be unique and doesn't contain any special characters or space.</small>
                </div>
                <div class="form-group">
                    <label for="name">Course</label>
                    <select class="form-control" id="co_course_id" name="co_course_id">
                        @foreach ($courses as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="is_free" name="is_free" value="1">
                  <label class="form-check-label" for="is_free">Is the paper for free?</label>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>    
</form>