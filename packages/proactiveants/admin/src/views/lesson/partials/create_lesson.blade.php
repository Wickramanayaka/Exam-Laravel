<div class="modal fade" id="createLessonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{url('adm/lsn/store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-light">
                <h5 class="modal-title" id="exampleModalLabel">Create a lesson</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="number">Number</label>
                            <input required type="number" class="form-control" id="number" name="number">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="name">Name</label>
                            <input required type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Alias</label>
                        <input required type="text" class="form-control" id="slang" name="slang">
                        <small id="emailHelp" class="form-text text-muted">Alias should be unique and doesn't contain any special characters or space.</small>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="grade">Grade</label>
                            <select  class="form-control" id="grade_id" name="grade_id">
                                @foreach ($grades as $grade)
                                    <option value="{{$grade->id}}">{{$grade->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="subject">Subject</label>
                            <select  class="form-control" id="subject_id" name="subject_id">
                                @foreach ($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>