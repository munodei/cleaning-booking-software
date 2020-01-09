<div class="modal fade" id="location" tabindex="-1" role="dialog" aria-labelledby="locationLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="location_name1"></h5><h5 class="modal-title">&nbsp;Location Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="address1"></span>,&nbsp;<span id="suburb1"></span>,&nbsp;<span id="neighbourhood1"></span>,&nbsp;<span id="city1"></span>,&nbsp;<span id="state1"></span>,&nbsp;<span id="country1"></span>,&nbsp;<span id="postal_code1"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="updateLocation" tabindex="-1" role="dialog" aria-labelledby="updateLocationLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="location_name2"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @include('includes.account.location-form')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('editLocation').submit();">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteLocation" tabindex="-1" role="dialog" aria-labelledby="deleteLocationLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="location_name3"></h5><h5 class="modal-title">&nbsp;Delete Location Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this Service Location Details?
        <form method="post" action="{{ route('delete-location') }}" name="deleteLocation1" id="deleteLocation1">

          @csrf
          <input type="hidden"  name="location_id" id="location_id" value="">
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('deleteLocation1').submit();">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Cleaner Modals -->
<div class="modal fade" id="AddCleaner" tabindex="-1" role="dialog" aria-labelledby="AddCleanerLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Cleaner Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="post" action="{{ route('add-cleaner') }} " name="add_cleaner" id="add_cleaner" enctype="multipart/form-data">

          {!! csrf_field() !!}

          <input type="hidden" name="cleaner_id" id="cleaner_id" value="">

          <div class="row">

              <div class="form-group col-md-6">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ old('first_name') ?? '' }}">
              </div>

              <div class="form-group col-md-6">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ old('last_name') ?? '' }}">
              </div>

          </div>

          <div class="row">

              <div class="form-group col-md-6">
                <label for="id_number">ID NUmber</label>
                <input type="text" class="form-control" id="id_number" name="id_number" placeholder="ID Nmber">
              </div>

              <div class="form-group col-md-6">
                <label for="passport_number">Passport Number</label>
                <input type="text" class="form-control" id="passport_number" name="passport_number" placeholder="Passport NUmber">
              </div>

           </div>

          <div class="row">

              <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') ?? '' }}">
              </div>

              <div class="form-group col-md-6">
                <label for="phone">Contact Number</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Contact Number" value="{{ old('phone') ?? '' }}">
              </div>

           </div>   

          <div class="row">   

              <div class="form-group col-md-6">
                <label for="phone1">Contact Number 2</label>
                <input type="text" class="form-control" id="phone1" name="phone1" placeholder="Contact Number 2">
              </div>

              <div class="form-group col-md-6">
                <label for="phone1">Gender</label>
                <select class="form-control" id="gender" name="gender">

                  <option value="">Select gender</option>
                  <option value="Male"  >Male  </option>
                  <option value="Female">Female</option>
                  <option value="Other" >Other </option>

                </select>
              </div>

          </div>  

          <div class="row">

              <div class="form-group col-md-6">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" placeholder="Photo">
              </div>
   

          <div class="form-group col-md-6">
            <label for="country12">Country</label>
            <select class="form-control" name="country12" id="country12">

              <option value="">Select Country</option>

              @foreach($countries as $country)

                <option value="{{ $country->id }}">{{ $country->country_name }}</option>

              @endforeach

              
            </select>
          </div>
           </div>


        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="buttonFormCleaner"  class="btn btn-success" onclick="event.preventDefault();document.getElementById('add_cleaner').submit();" >Add Cleaner</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ViewUserCleaner" tabindex="-1" role="dialog" aria-labelledby="ViewUserCleanerLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">View Cleaner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">

          <div id="cleanerUserProfile">
            

          </div>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="deleteCleaner" tabindex="-1" role="dialog" aria-labelledby="deleteCleanerLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Cleaner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Are you sure you want to delete Cleaner Details?

       <form method="post" action="{{ route('delete-cleaner') }}" id="formDeleteCleaner" name="formDeleteCleaner">
         {!! csrf_field() !!}
         <input type="hidden" name="delete_cleaner_id" id="delete_cleaner_id" value="">
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('formDeleteCleaner').submit();" >Delete</button>
      </div>
    </div>
  </div>
</div>

<!--End Cleaner Modals -->

<!-- User Payment Modals -->

<div class="modal fade" id="deleteUserPayment" tabindex="-1" role="dialog" aria-labelledby="deleteUserPaymentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Payment Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Are you sure you want to delete these Payment Details?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" >Delete</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="viewUserPayment" tabindex="-1" role="dialog" aria-labelledby="viewUserPaymentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">View Payment Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End of User Payment Modals -->


<div class="modal fade" id="viewAppointment" tabindex="-1" role="dialog" aria-labelledby="viewAppointmentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="appointment"></h5><h5 class="modal-title">&nbsp;View Service Appointment Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row" id="AppointmentCurrentServices" data-action="AppointmentCurrentServices">

             </div>   
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="rescheduleAppointment" tabindex="-1" role="dialog" aria-labelledby="rescheduleAppointmentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">&nbsp;Reschedule Service Appointment Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

              <form method="post" action="{{ route('reschedule-appointment') }}" id="formUpdateScheduledAppointment">
                {!! csrf_field() !!}
      <div class="modal-body">
        <div class="container">
            <div class="row">

              <span class="badge badge-light col-sm-6 col-md-6 col-lg-6">Time Frame</span><i class="badge badge-danger col-sm-6 col-md-6 col-lg-6" id="scheduleDate"></i><br>
              <span class="badge badge-light col-sm-6 col-md-6 col-lg-6">Date</span><i class="badge badge-danger col-sm-6 col-md-6 col-lg-6"  id="scheduledTime"></i><br>
              <span class="badge badge-light col-sm-6 col-md-6 col-lg-6">Period</span><i class="badge badge-danger col-sm-6 col-md-6 col-lg-6"  id="scheduledPeriod"></i><br>



                  <input type="hidden" name="hidden_appointment_id" id="hidden_appointment_id">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                          <label>First Cleaning Date</label>
                          
                              <input id="datepicker" name="datepicker"  autocomplete="off" readonly="readonly" />

                      </div>
                  </div>

                  <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                          <label>When</label>
                       <div class="form-group">
                                                                        
                              <select class="form-control" id="time_of_day" name="time_of_day" >
                                  <option value="morning">Morning</option>
                                  <option value="Afternoon">Noon</option> 
                               </select>

                      </div>
                      </div>
                  </div>
            

             </div>   
        </div>
      </div>
        </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick="event.preventDefault();document.getElementById('formUpdateScheduledAppointment').submit();">Save Changes</button>
      </div>
    </div>
  </div>
</div>

