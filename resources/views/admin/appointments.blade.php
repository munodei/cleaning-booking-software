@include('includes.account.header')
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('appointments') }}">Appointments</a>
        <!-- Form -->
        @include('includes.messages')
        <!-- User -->
 			@include('includes.account.dropdown-option')
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 200px; background-image: url({{ url('/') }}/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->

    </div>

    <div class="container-fluid mt--7">
      <div class="row">

      </div>
      <div class="row mt-5">
       <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Appointments</h3>
                </div>

                <div class="col text-right">
                  <a href="#" data-toggle="modal" data-target="#addnewappointmentByAdmin" class="btn btn-sm btn-primary">Add Appointment</a>
                </div>
                
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Client</th>
                    <th scope="col">Date</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>

                @foreach($appointments as $appointment)
                  <tr>
                    <th scope="row"><?php echo $appointment->userID===1? 'Added By Admin' : $appointment->first_name.' '.$appointment->last_name;    ?></th>
                    <td>{{ date('j F, Y',strtotime($appointment->date)) }}</td>
                    <td>
                      <i class="far fa-eye text-success mr-3" data-toggle="modal" data-target="#viewAppointmentByAdmin" title="View Appointment"></i>
                      <i class="fas fa-edit text-warning mr-3" data-toggle="modal" data-target="#editAppointmentByAdmin" title="Edit Appointment" onclick="rescheduleAppointment('{{ $appointment->appointmentID }}','{{ date('j F, Y',strtotime($appointment->date)) }}','{{ date("h:i a",strtotime($appointment->time_start)) }} - {{ date("h:i a",strtotime($appointment->time_end)) }}','{{ $appointment->time_of_day }}');"></i>
                      <i class="fas fa-trash text-danger mr-3" data-toggle="modal" data-target="#deleteAppointmentByAdmin" title="Delete Appointment" onclick="deleteAppointment({{ $appointment->appointmentID }});"></i>
                    </td>
                  </tr>
                @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

@include('includes.account.footer')


<!-- Add New Appointment-->

<div class="modal fade" id="addnewappointmentByAdmin" tabindex="-1" role="dialog" aria-labelledby="addnewappointmentByAdminLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Add New Appointment!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- End of Add New Appointment-->

<!-- Edit Appointment-->

<div class="modal fade" id="editAppointmentByAdmin" tabindex="-1" role="dialog" aria-labelledby="editAppointmentByAdminLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('formUpdateScheduledAppointment').submit();">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- End of Edit Appointment-->

<!-- Edit Appointment-->

<div class="modal fade" id="viewAppointmentByAdmin" tabindex="-1" role="dialog" aria-labelledby="viewAppointmentByAdminLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Edit Appointment!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- End of Edit Appointment-->

<!-- Delete Appointment-->

<div class="modal fade" id="deleteAppointmentByAdmin" tabindex="-1" role="dialog" aria-labelledby="deleteAppointmentByAdminLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete Appointment!</p>
      </div>
        <form method="post" action="{{ route('delete-appointment') }}" name="formDeleteAppointment" id="formDeleteAppointment">
            @csrf
            <input type="hidden" name="delete_appointment_id" id="delete_appointment_id">
        </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('formDeleteAppointment').submit();">Delete Appointment</button>
      </div>
    </div>
  </div>
</div>

<!-- End Delete Appointment-->

    </div>
  </div>
  <!--   Core   -->
  <script src="{{ url('/') }}/assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="{{ url('/') }}/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="{{ url('/') }}/assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="{{ url('/') }}/assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="{{ url('/') }}/assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });

      @include('includes.account.modal-scripts')
  </script>
    <script>
           
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
        });

                function rescheduleAppointment(id,time_frame,date,time_of_day){
              $('#hidden_appointment_id').val(id);
              $('#scheduleDate').html(date);
              $('#scheduledTime').html(time_frame);
              $('#scheduledPeriod').html(time_of_day);



        }

    </script> 

    <script>



         function deleteAppointment(id) {

          $('#delete_appointment_id').val(id);

        }



       </script>
       
</body>

</html>