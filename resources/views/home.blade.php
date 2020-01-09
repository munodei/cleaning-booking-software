@include('includes.account.header')
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ url('/') }}/index.html">Dashboard</a>
        <!-- message notifications -->
            @include('includes.messages')
        <!-- User -->
 			@include('includes.account.dropdown-option')
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 400px; background-image: url({{ url('/') }}/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello {{ auth()->user()->user_name ?? '' }}!</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can manage  your locations and  your appointments!</p>
            
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid mt--7">
      <div class="row">



      </div>
      <div class="row mt-5">
        <div class="col-xl-6 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Scheduled Appointments</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ route('user-appointments') }}" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>

                @foreach($appointments as $appointment)
                  <tr>
                    <th scope="row">{{ date('j F, Y',strtotime($appointment->date)) }}</th>

                    <td>
                      <i class="far fa-eye text-success mr-3" data-toggle="modal" data-target="#viewAppointment" title="View Appointment" onclick="viewAppointment({{ $appointment->id }})"></i>
                      <i class="fas fa-edit text-warning mr-3" title="Reschedule Appointment" data-toggle="modal" data-target="#rescheduleAppointment" title="Reschedule Appointment" onclick="rescheduleAppointment('{{ $appointment->id }}','{{ date('j F, Y',strtotime($appointment->date)) }}','{{ date("h:i a",strtotime($appointment->time_start)) }} - {{ date("h:i a",strtotime($appointment->time_end)) }}','{{ $appointment->time_of_day }}');"></i>
                    </td>
                  </tr>
                @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Service Locations</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ route('user-locations') }}" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($locations as $location)
                  <tr>
                    <th scope="row">
                      {{ $location->location_name }}
                    </th>
                    <td>
                      <i class="far fa-eye text-success mr-3" title="View Location"  data-toggle="modal" data-target="#location" onclick="locationDetails('{{ $location->location_name }}','{{ $location->address }}','{{ $location->suburb }}','{{ $location->neighbourhood }}','{{ $location->city }}','{{ $location->state }}','{{ $location->country }}','{{ $location->postal_code }}')"></i>
                      <i class="fas fa-edit text-warning mr-3" title="Reschedule Location" data-toggle="modal" data-target="#updateLocation" onclick="editLocationDetails('{{ $location->id }}','{{ $location->location_name }}','{{ $location->address }}','{{ $location->suburb }}','{{ $location->neighbourhood }}','{{ $location->city }}','{{ $location->state }}','{{ $location->country }}','{{ $location->postal_code }}')"></i>
                      <i class="fas fa-trash text-danger mr-3" title="Delete Location" data-toggle="modal" data-target="#deleteLocation" onclick="deletelocationDetails('{{ $location->location_name }}',{{ $location->id }} );" ></i>
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
@include('includes.account.modals')

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
       </script> 
</body>

</html>