<div class="modal fade" id="createAdvertisementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{url('adm/adv/store')}}" method="POST" enctype="multipart/form-data">
      @csrf  
      <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-light">
                <h5 class="modal-title" id="exampleModalLabel">Create a new advertisement</h5>
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
                        <label for="name">Category</label>
                        <select class="form-control" id="adv_category_id" name="adv_category_id" autocomplete="off">
                          @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01">Image</span>
                        </div>
                        <div class="custom-file">
                          <input required type="file" accept="image/*" class="custom-file-input" id="image" name="image" aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="rank">Position</label>
                        <input required type="number" step="1" class="form-control" id="position" name="position" autocomplete="off">
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