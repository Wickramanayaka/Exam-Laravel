<div class="modal fade" id="createCashierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{url('adm/cashier/store')}}" method="POST">
      @csrf  
      <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-secondary text-light">
                <h5 class="modal-title" id="exampleModalLabel">Create a new cashier</h5>
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
                        <label for="email">Email</label>
                        <input required type="email" class="form-control" id="email" name="email" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input required type="password" class="form-control" id="password" name="password" autocomplete="off">
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