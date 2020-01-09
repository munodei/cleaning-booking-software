<form method="post" name="editLocation" id="editLocation" action="{{ route('edit-location') }}">

  @csrf

  <input type="hidden" name="id_location" id="id_location" value="">

  <div class="row">

      <div class="col-md-3">
        <div class="form-group">
          <input type="text" class="form-control" name="location_name" id="location_name" placeholder="Name">
        </div>
      </div>

      <div class="col-md-9">
        <div class="form-group">
          <input type="text" class="form-control" name="address" id="address" placeholder="Address">
        </div>
      </div>

  </div>

  <div class="row">

      <div class="col-md-4">
        <div class="form-group">
          <input type="text" class="form-control" name="suburb" id="suburb" placeholder="Suburb">
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <input type="text" class="form-control" name="neighbourhood" id="neighbourhood" placeholder="Neighbourhood">
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <input type="text" class="form-control" name="city" id="city" placeholder="City">
        </div>
      </div>

  </div>

  <div class="row">


    <div class="col-md-4">
      <div class="form-group">
        <input type="text" class="form-control" name="state" id="state" placeholder="State">
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <input type="text" class="form-control" name="country" id="country" placeholder="Country">
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Zip Code">
      </div>
    </div>

  </div>

 



</form>