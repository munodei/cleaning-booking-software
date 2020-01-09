<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/') }}/front/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="{{ url('/') }}/front/img/favicon.png" />


    <title>{{ get_option('site_title') }}| {{ __('Reset Password') }}</title>

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
        <a href="{{ route('booking') }}" class="made-with-pk">
            <div class="brand">PK</div>
            <div class="made-with">Made with <strong>{{ get_option('site_name') }}</strong></div>
        </a>

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">

                    <!--      Wizard container        -->
                    <div class="wizard-container">

                        <div class="card wizard-card" data-color="orange" id="wizardProfile">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                                                             
                                    <div class="tab-pane" id="about">
		                            	<div class="row">

                                            <h5 class="info-text"> {{ __('Reset Password') }}</h5>

											<div class="col-sm-4 col-sm-offset-1">
												<div class="picture-container">
													<div class="picture">
														<img src="https://mypdz.com/assets/images/user-avatar-placeholder.png" class="picture-src" id="wizardPicturePreview" title="" />
														
													</div>
													<h6>{{ get_option('site_name') }}</h6>
												</div>
                                            </div>
                                            
											<div class="col-sm-6 col-md-6">

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
                                                        {{ __('Reset Password') }}
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
</html>