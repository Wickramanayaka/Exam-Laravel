<p>
    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      Advanced filters >>
    </button>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="card card-body border-danger">
        <p><b>Payment filters</b></p>
      <form id="ajax-form">
        <div class="form-row">
          <div class="col">
            <input type="text" class="form-control" placeholder="Payment #" name="id" id="id">
          </div>
          <div class="col">
            <input type="text" class="form-control datepicker" placeholder="From date" name="fromdate" id="fromdate" value="{{date('Y-m-d')}}">
          </div>
          <div class="col">
            <input type="text" class="form-control datepicker" placeholder="To date" name="todate" id="todate" value="{{date('Y-m-d')}}">
          </div>
          <div class="col">
            <input type="text" class="form-control" placeholder="Fee" name="amount" id="amount">
          </div>
          <div class="col">
            <select class="form-control" placeholder="Method" name="method" id="method">
              <option value="Any">Any</option>
              <option value="Offline">Offline</option>
              <option value="Cards">Cards</option>
              <option value="Online">Online</option>
              <option value="Deposit">Deposit</option>
            </select>
          </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Reg. #" name="reg_number" id="reg_number">
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Name" name="name" id="name">
            </div>
            <div class="col">
              <select class="form-control" placeholder="Method" id="course" name="course">
                <option value="Any">Any</option>
                @foreach ($courses as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col">
                <select class="form-control" placeholder="Method" id="teacher" name="teacher">
                <option value="Any">Any</option>
                @foreach ($teachers as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="col">
                <select class="form-control" placeholder="Method" id="status">
                <option value="Any">Any</option>
                <option value="PAID">PAID</option>
                <option value="UNPAID">UNPAID</option>
                </select>
            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Clear</button>
      </form>
    </div>
  </div>