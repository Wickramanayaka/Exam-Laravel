<form action="{{url('/adm/ex/store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="createPaperSetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header bg-secondary text-light">
              <h5 class="modal-title" id="exampleModalLabel">Exam Paper Set</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="ex_category_id" id="ex_category_id" class="form-control" style="width: 75%">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="grade">Grade</label>
                    <select name="grade_id" id="grade_id" class="form-control" style="width: 75%">
                        @foreach ($grades as $grade)
                            <option value="{{$grade->id}}">{{$grade->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="paper">Paper</label>
                    <br>
                    <select name="paper_id[]" id="paper_id" class="form-control select2" multiple="multiple" style="width: 75%">
                        @foreach ($papers as $paper)
                            <option value="{{$paper->id}}">{{$paper->gradeSubject->name}} - {{$paper->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" step="10" name="price" id="price" class="form-control">
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
