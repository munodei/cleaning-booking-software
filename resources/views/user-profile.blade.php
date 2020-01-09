@include('includes.account.header')
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" name="" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('user-profile') }}">User Profile</a>
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
      <br>
        
    </div>
    
    <div class="container-fluid mt--7">
      <div class="row">

        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="post" action="{{ route('user-profile-update') }}" enctype="multipart/form-data" id="user_form">
                @csrf
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="avatar-wrapper form-group" data-tippy-placement="bottom" title="Change Avatar">
                      <img class="profile-pic" src="{{ auth()->user()->photo ?? '' }}" alt="" width="100px" height="100px" />
                      <div class="upload-button"></div>
                      <input class="file-upload" type="file"  name="logo" id="logo"/>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" name="user_name" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="{{ auth()->user()->user_name ?? ''}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative" placeholder="{{ auth()->user()->email ?? '' }}" readonly="">
                      </div>
                    </div>
                     <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Contact nUmber</label>
                        <input type="email" name="phone" id="input-email" class="form-control form-control-alternative" placeholder="{{ auth()->user()->phone ?? '' }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" name="first_name" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="{{ auth()->user()->first_name ?? '' }}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" name="last_name" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="{{ auth()->user()->last_name ?? '' }}">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input name="address" id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="{{ auth()->user()->address ?? '' }}" type="text">
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Suburb</label>
                        <input name="suburb" id="input-address" class="form-control form-control-alternative" placeholder="Home Suburb" value="{{ auth()->user()->suburb ?? '' }}" type="text">
                      </div>
                    </div>

                     <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Neighbourhood</label>
                        <input name="neighbourhood" id="input-address" class="form-control form-control-alternative" placeholder="Home Neighbourhood" value="{{ auth()->user()->neighbourhood ?? '' }}" type="text">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">City</label>
                        <input name="city" id="input-address" class="form-control form-control-alternative" placeholder="Home City" value="{{ auth()->user()->city ?? '' }}" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">State</label>
                        <input type="text" name="state" id="input-city" class="form-control form-control-alternative" placeholder="State" value="{{ auth()->user()->state ?? '' }}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" name="country" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="{{ auth()->user()->country ?? '' }}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" name="postal_code" id="input-postal-code" class="form-control form-control-alternative" value="{{ auth()->user()->postal_code ?? '' }}">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                     <input type='submit' class='btn btn-fill btn-success btn-wd' onclick="event.preventDefault();document.getElementById('user_form').submit();" value='Save' />
                  </div>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
@include('includes.account.footer')
    </div>
  </div>
  <!--   Core   -->
  <script src="{{ url('/') }}/assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="{{ url('/') }}/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="{{ url('/') }}/assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>