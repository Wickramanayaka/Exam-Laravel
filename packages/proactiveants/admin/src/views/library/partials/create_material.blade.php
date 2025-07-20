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
                        <small id="nameHelp" class="form-text text-muted">Copy and paste the URL from the CDN server. eg.: https://linode.com/</small>
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="category">Category</label>
                        <select  class="form-control" id="category" name="category">
                            <option value="1">ගුරු මාර්ගෝපදේශ සංග්‍රහය</option>
                            <option value="2">පෙළපොත්</option>
                            <option value="3">ඡායාරූප</option>
                            <option value="4">ගීත</option>
                        </select>
                      </div>
                      <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="featured" name="featured">
                        <label class="form-check-label" for="featured">Is this a featured material?</label>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01">Thumbnail</span>
                        </div>
                        <div class="custom-file">
                          <input required type="file" accept="image/*" class="custom-file-input" id="image" name="image" aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label" for="image">Choose file</label>
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