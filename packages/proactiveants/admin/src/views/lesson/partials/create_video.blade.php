<div class="modal fade" id="createVideoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{url('adm/lsn/vdo/store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-light">
                <h5 class="modal-title" id="exampleModalLabel">Create a video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input required type="text" class="form-control" id="name" name="name">
                      </div>
                      <div class="form-group">
                        <label for="name">Alias</label>
                        <input required type="text" class="form-control" id="slang" name="slang">
                        <small id="emailHelp" class="form-text text-muted">Alias should be unique and doesn't contain any special characters or space.</small>
                      </div>
                      <div class="form-group">
                        <label for="url">URL</label>
                        <input required type="text" class="form-control" id="url" name="url">
                        <small id="nameHelp" class="form-text text-muted">Copy and paste the URL from the CDN server.</small>
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="teacher">Teacher</label>
                        <select  class="form-control" id="teacher_id" name="teacher_id">
                            @foreach ($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="duration">Duration (Minutes)</label>
                            <input required type="number" class="form-control" id="duration" name="duration">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sequence">Sequence (1,2,3...)</label>
                            <input required type="number" class="form-control" id="sequence" name="sequence">
                        </div>
                      </div>
                    </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                <input type="hidden" name="unit_id" id="unit_id" value="{{$unit->id}}">
                </div>
            </div>
        </div>
    </form>
</div>