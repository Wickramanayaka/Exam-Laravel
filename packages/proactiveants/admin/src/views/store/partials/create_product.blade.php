<div class="modal fade" id="createMaterialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{url('adm/bst/product/store')}}" method="POST" enctype="multipart/form-data">
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
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="code">Code</label>
                          <input required type="text" class="form-control" id="code" name="code">
                        </div>
                        <div class="form-group col">
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
                      <div class="form-group">
                        <label for="category">Category</label>
                        <select  class="form-control" id="store_category_id" name="store_category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}} ({{$category->parents->name}})</option>
                            @endforeach
                        </select>
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

                      <div class="form-row">
                        <div class="form-group col">
                          <label for="author">Author</label>
                          <input required type="text" class="form-control" id="author" name="author">
                        </div>
                        <div class="form-group col">
                          <label for="publisher">Publisher</label>
                          <input required type="text" class="form-control" id="publisher" name="publisher">
                        </div>
                        <div class="form-group col">
                          <label for="published_year">Year</label>
                          <input required type="number" class="form-control" id="published_year" name="published_year">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col">
                          <label for="price">Price (LKR)</label>
                          <input required type="number" class="form-control" id="price" name="price">
                        </div>
                        <div class="form-group col">
                          <label for="quantity">Quantity</label>
                          <input required type="number" class="form-control" id="quantity" name="quantity" step="1">
                        </div>
                        <div class="form-group col">
                          <label for="weight">Weight (grams)</label>
                          <input required type="number" class="form-control" id="weight" name="weight" step="10">
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