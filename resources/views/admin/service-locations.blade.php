@include('includes.account.header')
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('service-locations') }}">Service Locations</a>
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
                  <h3 class="mb-0">Service Locations</h3>
                </div>

                <div class="col text-right">
                  <a href="#" data-toggle="modal" data-target="#AddCleaner" class="btn btn-sm btn-primary">Add Service Locations</a>
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

                @foreach($countries as $country)
                  <tr>
                    <th scope="row">{{ $country->country_name }}</th>
                    <td>
                      <i class="far fa-eye text-success mr-3" title="View Appointment"></i>
                      <i class="fas fa-edit text-warning mr-3" title="Edit Appointment"></i>
                      <i class="fas fa-trash text-danger mr-3" title="Delete Appointment"></i>
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

    <script>

         function getCleaner(id,first_name,last_name,id_number,passport_number,email,phone,phone1,gender,photo,country){

          $('#cleaner_id').val(id);
          $('#first_name').val(first_name);
          $('#last_name').val(last_name);
          $('#id_number').val(id_number);
          $('#passport_number').val(passport_number);
          $('#email').val(email);
          $('#phone').val(phone);
          $('#phone1').val(phone1);
          $('#gender').val(gender);
          $('#photo1').val(photo);
          $('#country12').val(country);
          $('#buttonFormCleaner').html('Update Cleaner');
         }

         function deleteCleaner(id) {

          $('#delete_cleaner_id').val(id);

        }

        function getCleanerProfile(id){

            $.ajax({
              url:"{{ url('/') }}/view-cleaner-profile/"+id,
              cache: false,
              success: function(html){

                $('#cleanerUserProfile').html(html);

              }

            });
        }

       </script>
       
</body>

</html>