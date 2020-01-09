
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; {{ date('Y') }} <a href="{{ url('/') }}" class="font-weight-bold ml-1" target="_blank">{{ get_option('site_name') }}</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="{{ get_option('site_url') }}" class="nav-link" target="_blank">{{ get_option('site_name') }}</a>
              </li>
                <li class="nav-item">
                  <a href="{{ route('booking') }}" class="nav-link" target="_blank">Make A Booking</a>
                </li>
              <li class="nav-item">
                <a href="{{ route('about-us') }}" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('contact-us') }}" class="nav-link" target="_blank">Blog</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>