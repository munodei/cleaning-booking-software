<!--

=========================================================
* Argon Dashboard - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    {{ get_option('site_title') }} | {{ $title }}
  </title>
  <!-- Favicon -->
  <link href="{{ url('/') }}/assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    @include('includes.metatags')
  <!-- Icons -->
  <link href="{{ url('/') }}/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="{{ url('/') }}/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ url('/') }}/assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
  <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="{{ url('/') }}">
        <img src="{{ url('/') }}/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{ url('/') }}/assets/img/theme/team-1-800x800.jpg">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
             <a href="{{ route('home') }}" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="{{ route('user-profile') }}" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="{{ route('contact-us') }}" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>

          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="{{ route('home') }}">
                <img src="{{ url('/') }}/assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">

          <li class="nav-item active">
          <a class=" nav-link active " href="{{ route('home') }}"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="{{ route('user-profile') }}">
              <i class="ni ni-single-02 text-yellow"></i> User profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('user-appointments') }}">
              <i class="ni ni-bullet-list-67 text-red"></i> Appointments
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('user-locations') }}">
              <i class="ni ni-pin-3 text-orange"></i> Locations
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="{{ route('user-payments') }}">
              <i class="fas fa-money text-success"></i> Payments
            </a>
          </li>


        </ul>

        @if(auth()->user()->user_type ==='admin')
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Administrator Options</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('cleaners') }}">
              <i class="fas fa-users"></i> Cleaners
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('appointments') }}">
              <i class="fas fa-calendar"></i> Appointments
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('service-locations') }}">
              <i class="fas fa-map"></i> Service Locations
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('services') }}">
              <i class="fas fa-life-ring"></i> Services
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('service-packages') }}">
              <i class="fas fa-database"></i> Service Packages
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('payments') }}">
              <i class="fas fa-money"></i> Payments
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('theme-settings') }}">
              <i class="fas fa-cogs"></i> Site Settings
            </a>
          </li>
        </ul>

        @endif
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Pages</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('about-us') }}">
              <i class="ni ni-spaceship"></i> About Us
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contact-us') }}">
              <i class="ni ni-palette"></i> Contact us
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('booking') }}">
              <i class="ni ni-settings-gear-65"></i> Settings
            </a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('booking') }}">
              <i class="fas fa-calendar"></i> Make A Booking
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              <i class="ni ni-user-run"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>