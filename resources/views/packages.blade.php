<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/') }}/front/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="{{ url('/') }}/front/img/favicon.png" />


    <title>{{ get_option('site_title') }}| Cleaning Booking</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/paper-bootstrap-wizard"/>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
  @include('includes.metatags')
    <!-- CSS Files -->
    <link href="{{ url('/') }}/front/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ url('/') }}/front/css/paper-bootstrap-wizard.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ url('/') }}/front/css/demo.css" rel="stylesheet" />

    <!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        
    <link href="{{ url('/') }}/css/home.css" rel="stylesheet">   
    <link href="{{ url('/') }}/front/css/themify-icons.css" rel="stylesheet">
 
    </head>

    <body>

    <div class="image-container set-full-height" style="background-image: url('{{ url('/') }}/front/img/paper-1.jpeg')">
        <!--   Creative Tim Branding   -->
        <a href="#">
             <div class="logo-container">
                <div class="logo">
                    <img src="{{ get_option('logo') }}"width="50px" height="50px">
                </div>
                <div class="brand">
                    {{ get_option('site_name') }}
                </div>
            </div>
        </a>

        <!--  Made With Paper Kit  -->
        <a href="#" class="made-with-pk">
            <div class="brand">PK</div>
            <div class="made-with">Made with <strong>Paper Kit</strong></div>
        </a>

<div class="container">
  <div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Free</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>10 users included</li>
          <li>2 GB of storage</li>
          <li>Email support</li>
          <li>Help center access</li>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Pro</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>20 users included</li>
          <li>10 GB of storage</li>
          <li>Priority email support</li>
          <li>Help center access</li>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
      </div>
    </div>
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Enterprise</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>30 users included</li>
          <li>15 GB of storage</li>
          <li>Phone and email support</li>
          <li>Help center access</li>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button>
      </div>
    </div>
  </div>

  <footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
        <small class="d-block mb-3 text-muted">© 2017-2019</small>
      </div>
      <div class="col-6 col-md">
        <h5>Features</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Cool stuff</a></li>
          <li><a class="text-muted" href="#">Random feature</a></li>
          <li><a class="text-muted" href="#">Team feature</a></li>
          <li><a class="text-muted" href="#">Stuff for developers</a></li>
          <li><a class="text-muted" href="#">Another one</a></li>
          <li><a class="text-muted" href="#">Last time</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Resources</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Resource</a></li>
          <li><a class="text-muted" href="#">Resource name</a></li>
          <li><a class="text-muted" href="#">Another resource</a></li>
          <li><a class="text-muted" href="#">Final resource</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Team</a></li>
          <li><a class="text-muted" href="#">Locations</a></li>
          <li><a class="text-muted" href="#">Privacy</a></li>
          <li><a class="text-muted" href="#">Terms</a></li>
        </ul>
      </div>
    </div>
  </footer>
</div>

        <div class="footer">
            <div class="container text-center">
                Made with <i class="fa fa-heart heart"></i> by <a href="{{ url('/')}}">{{ get_option('site_title') }} </a>
            </div>
        </div>
        <div class="fixed-plugin">
             <div class="dropdown">
            <a href="#" data-toggle="dropdown">
                    <i class="fa fa-user"> </i>
                </a>
                <ul class="dropdown-menu">
                    
                     @guest
                    <li>
                        <a href="{{ url('/login') }}">                      
                           Login
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}">                      
                           Register
                        </a>
                    </li>
                    @else
                    <li class="header-title"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="header-title"><a href="{{ route('user-appointments') }}" >Appointments</a></li>
                    <li class="header-title"><a href="{{ route('user-locations') }}">Locations</a></li>
                    <li class="header-title"><a href="#">Payments</a></li>
                    <li class="header-title"><a href="#">Settings</a></li>
                    @endguest
                </ul>
            </div>
            <div class="dropdown">
                <a href="#" data-toggle="dropdown">
                    <i class="fa fa-cog fa-2x"> </i>
                </a>
                <ul class="dropdown-menu">
                    <li class="header-title">{{ get_option('site_name') }}</li>
                    <li>
                        <a href="{{ url('/') }}">                      
                           Home
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ url('/booking') }}">                      
                           Make Booking
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/booking') }}">                      
                           How it Works
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/booking') }}">                      
                           Get A Quote
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contact-us') }}">                      
                           Contact Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about-us') }}">                   
                           About Us
                        </a>
                   </li>

                </ul>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</body>

    <!--   Core JS Files   -->
    <script src="{{ url('/') }}/front/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/front/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/front/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

    <!--  Plugin for the Wizard -->
    <script src="{{ url('/') }}/front/js/demo.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/front/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

    <!--  More information about jquery.validate here: https://jqueryvalidation.org/     -->
    <script src="{{ url('/') }}/front/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script>
        function getSuburb(id){
            $.ajax({
                    url: "{{ url('/') }}/get-suburbs/"+id,
                    cache: false,
                    success: function(html){
                        document.getElementById('suburb').innerHTML = html;   
                    }           
            });

            document.getElementById('address').style.display ='none';  
        }

        function showAddress(id){
            if(id!=""||id!=null||id!=undefined){
                document.getElementById('address').style.display ='block';  
            }
        }

    </script>
           <script>
           
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
        });
       </script> 
</html>