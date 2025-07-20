<div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{url('adm/bst/category/store')}}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-light">
                <h5 class="modal-title" id="exampleModalLabel">Create a new category</h5>
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
                        <label for="category">Parent Category</label>
                        <select  class="form-control" id="parent_id" name="parent_id">
                          <option value="0"></option>
                          @foreach ($parents as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
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