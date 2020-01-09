@include('includes.account.header')
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('user-payments') }}">User Payments</a>
        <!-- Form -->

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
                  <h3 class="mb-0">User Payments</h3>
                </div>
                
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>

                @foreach($payments as $payment)
                  <tr>

                    <th scope="row">{{ date('j F, Y',strtotime($payment->created_at)) }}</th>
                     <th>{{ get_option('currency_symbol') }}{{ $payment->amount }}</th>
                    <td>
                      <i class="far fa-eye text-success mr-3" data-toggle="modal" data-target="#viewUserPayment" title="View Payment" onclick=""></i>
                      <i class="fas fa-trash text-danger mr-3" title="Reschedule Appointment" data-toggle="modal" data-target="#deleteUserPayment" title="Delete Payment" onclick=""></i>
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