<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/') }}/front/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="{{ url('/') }}/front/img/favicon.png" />


    <title>{{ get_option('site_title') }}| {{ __('Register') }}</title>

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
        <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="image-container set-full-height" style="background-image: url('{{ url('/') }}/front/img/paper-1.jpeg')">
        <!--   Creative Tim Branding   -->
        <a href="{{ route('booking') }}">
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

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">

                    <!--      Wizard container        -->
                    <div class="wizard-container">

                        <div class="card wizard-card" data-color="orange" id="wizardProfile">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                                     
                                    <div class="tab-pane" id="about">
		                            	<div class="row">

                                            <h5 class="info-text"> {{ __('Register') }}</h5>
                                            <span class="info-text" style="color:red;"> @include('includes.messages')</span>


                                            
											<div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">

                                                
												<div class="form-group">
													<label>{{ __('Name') }} <small>(required)</small></label>
													<input name="name" type="text" class="form-control" value="{{ old('name') }}" placeholder="Username..." required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

												<div class="form-group">
													<label>{{ __('E-Mail Address') }} <small>(required)</small></label>
													<input name="email" type="email" class="form-control" placeholder="Email address..." value="{{ old('email') }}" required autocomplete="email" >
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                

                                                <div class="form-group">
													<label>Password <small>(required)</small></label>
													<input name="password" type="password" class="form-control" required autocomplete="current-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
													<label>{{ __('Confirm Password') }} <small>(required)</small></label>
                                                    <input id="password-confirm" name="password" type="password" class="form-control"  name="password_confirmation" required autocomplete="new-password">
                                                    
                                                </div>
                                                
                                                <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                                </div>
                                                
											</div>
                
										</div>
		                            </div>

                
            



                                </form>
                        </div>    

                    </div> <!-- wizard container -->
                </div>
            </div><!-- end row -->
        </div> <!--  big container -->

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
                    <li class="header-title">User Options</li>
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