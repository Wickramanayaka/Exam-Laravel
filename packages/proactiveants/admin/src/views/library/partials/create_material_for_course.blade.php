<div class="modal fade" id="createMaterialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{url('adm/lib/store')}}" method="POST" enctype="multipart/form-data">
      @csrf  
      <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-light">
                <h5 class="modal-title" id="exampleModalLabel">Create a new material</h5>
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
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" id="description" name="description"></textarea>
                      <small id="emailHelp" class="form-text text-muted">If the material is a link paste here and select category as link.</small>
                    </div>
                    <div class="form-group">
                      <label for="category">Category</label>
                      <select  class="form-control" id="category" name="category">
                          @foreach ($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Material</span>
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="file">Choose file</label>
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