<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="Uzzal" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Student</title>
    <link rel="shortcut icon" href="{{asset('contents/admin')}}/assets/images/favicon.ico">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/vendor/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/icons.min.css"/>
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/app.min.css" id="app-style"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/style.css"/>
  </head>

  <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
    <div class="wrapper">
        <div class="leftside-menu">
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <ul class="side-nav">

                    <li class="side-nav-item">
                        <a href="{{url('student')}}" class="side-nav-link"><i class="uil-home-alt"></i><span>Courses</span></a>
                    </li>

                <div class="clearfix"></div>
            </div>
        </div>

        <div class="content-page">
            <div class="content">
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-menu mb-0">
                      <button class="button-menu-mobile open-left">
                              <i class="mdi mdi-menu"></i>
                      </button>
                        <li class="top_logo ">
                              <h1 class="animate__animated animate__fadeInDown animate__delay-1s"><img src="{{asset('contents/admin')}}/assets/images/sub_logo.png" alt="SUB_Logo">State University Of Bangladesh</h1>
                        </li>
                        <li class="dropdown notification-list float-end">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="{{asset('contents/admin')}}/assets/images/supAdmin.jpg" alt="user-image" class="rounded-circle">
                                </span>
                                <span>
                                    <span class="account-user-name">Mahfujur Rahman</span>
                                    <span class="account-position">Student</span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                <!-- item-->
                                <a class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                    <i class="mdi mdi-logout me-1"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <script>document.write(new Date().getFullYear())</script> © State University Of Bangladesh (sub.edu.bd)
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    <script src="{{asset('contents/admin')}}/assets/js/popper.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/vendor.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/app.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/vendor/apexcharts.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/pages/demo.dashboard.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/jquery-3.4.1.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/script.js"></script>
  </body>
</html>
