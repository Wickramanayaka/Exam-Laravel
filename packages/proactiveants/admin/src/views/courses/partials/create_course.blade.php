<div class="modal fade" id="createCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{url('adm/course/store')}}" method="POST" enctype="multipart/form-data">
      @csrf  
      <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-light">
                <h5 class="modal-title" id="exampleModalLabel">Create a new course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input required type="text" class="form-control" id="name" name="name" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="name">Alias</label>
                        <input required type="text" class="form-control" id="slang" name="slang" autocomplete="off">
                        <small id="emailHelp" class="form-text text-muted">Alias should be unique and doesn't contain any special characters or space.</small>
                      </div>
                      <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="day">Day</label>
                                <select required  class="form-control" id="day" name="day">
                                    <option value="සඳුදා">සඳුදා</option>
                                    <option value="අඟහරුවාදා">අඟහරුවාදා</option>
                                    <option value="බදාදා">බදාදා</option>
                                    <option value="බ්‍රහස්පතින්දා">බ්‍රහස්පතින්දා</option>
                                    <option value="සිකුරාදා">සිකුරාදා</option>
                                    <option value="සෙනසුරාදා">සෙනසුරාදා</option>
                                    <option value="ඉරිදා">ඉරිදා</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="time">Time</label>
                                <input required type="text" class="form-control" id="time" name="time">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="fee">Fee</label>
                                <input required type="number" class="form-control" id="fee" name="fee">
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="category">Category</label>
                        <select  class="form-control" id="co_category_id" name="co_category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="category">Teacher</label>
                        <select  class="form-control" id="teacher_id" name="teacher_id">
                            @foreach ($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @endforeach
                        </select>
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