<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="author" content="Limon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="{{asset('contents/admin')}}/assets/images/favicon.ico">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/vendor/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/icons.min.css"/>
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/app.min.css" id="app-style"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/vendor/dataTables.bootstrap5.css"/>
    <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/style.css"/>

    <script src="{{asset('contents/admin')}}/assets/js/sweetalert.min.js"></script>
  </head>

  <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
    <div class="wrapper">
        <div class="leftside-menu">
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <ul class="side-nav">
                    <li class="side-nav-title side-nav-item">Manage</li>
                    @if(Auth::user()->role_id=='1'||Auth::user()->role_id=='2'||Auth::user()->role_id=='3')
                    <li class="side-nav-item">
                        <a href="{{route('home')}}" class="side-nav-link"><i class="uil-home-alt"></i><span>Dashboard</span></a>
                    </li>
                    @endif
                    @if(Auth::user()->role_id=='1')
                    <li class="side-nav-item">
                        <a href="{{url('dashboard/role')}}" class="side-nav-link"><i class="uil uil-question-circle"></i><span>User Role</span></a>
                    </li>
                    @endif
                    @if(Auth::user()->role_id=='1' || Auth::user()->role_id=='2')
                    <li class="side-nav-item">
                        <a href="{{url('dashboard/department')}}" class="side-nav-link"><i class="fa fa-building"></i><span>Departments</span></a>
                    </li>
                    @endif
                    @if(Auth::user()->role_id=='1' || Auth::user()->role_id=='2')
                    <li class="side-nav-item">
                        <a href="{{url('dashboard/semester')}}" class="side-nav-link"><i class="uil uil-snow-flake"></i><span>Semesters</span></a>
                    </li>
                    @endif

                    @if(Auth::user()->role_id=='1')
                    <li class="side-nav-item">
                        <a href="{{url('dashboard/default')}}" class="side-nav-link"><i class="uil uil-balance-scale"></i><span>Default Value</span></a>
                    </li>
                    @endif

                    @if(Auth::user()->role_id=='1')
                    <li class="side-nav-item">
                        <a href="{{url('dashboard/user')}}" class="side-nav-link"><i class="uil uil-user-circle"></i><span>Admins</span></a>
                    </li>
                    @endif

                    @if(Auth::user()->role_id=='1'||Auth::user()->role_id=='2'||Auth::user()->role_id=='3')
                    <li class="side-nav-item">
                        <a href="{{url('dashboard/teacher')}}" class="side-nav-link"><i class="uil uil-users-alt"></i><span>Teachers</span></a>
                    </li>
                    @endif

                    @if(Auth::user()->role_id=='1'||Auth::user()->role_id=='2'||Auth::user()->role_id=='3')
                    <li class="side-nav-item">
                        <a href="{{url('dashboard/student')}}" class="side-nav-link"><i class="uil uil-book-reader"></i><span>Students</span></a>
                    </li>
                    @endif

                    @if(Auth::user()->role_id=='1'||Auth::user()->role_id=='2'||Auth::user()->role_id=='3')
                    <li class="side-nav-item">
                        <a href="{{url('dashboard/course')}}" class="side-nav-link"><i class="uil uil-book-open"></i><span>Courses</span></a>
                    </li>
                    @endif

                    @if(Auth::user()->role_id=='1'||Auth::user()->role_id=='2'||Auth::user()->role_id=='3')
                    <li class="side-nav-item">
                        <a href="{{url('dashboard/offer/course')}}" class="side-nav-link"><i class="uil uil-notebooks"></i><span>Offered Courses</span></a>
                    </li>
                    @endif

                    @if(Auth::user()->role_id=='1'||Auth::user()->role_id=='2'||Auth::user()->role_id=='3')
                    <li class="side-nav-item">
                        <a href="{{url('dashboard/enroll/student')}}" class="side-nav-link"><i class="uil uil-user-check"></i><span>Enroll Students</span></a>
                    </li>
                    @endif

                    @if(Auth::user()->role_id=='1'||Auth::user()->role_id=='2'||Auth::user()->role_id=='3')
                    <li class="side-nav-item">
                        <a href="{{url('dashboard/mcq/question')}}" class="side-nav-link"><i class="uil uil-question-circle"></i><span>MCQ Questions</span></a>
                    </li>
                    @endif

                    @if(Auth::user()->role_id=='1'||Auth::user()->role_id=='2'||Auth::user()->role_id=='3')
                    <li class="side-nav-item">
                        <a href="{{url('dashboard/open/question')}}" class="side-nav-link"><i class="uil uil-question-circle"></i><span>Openended Questions</span></a>
                    </li>
                    @endif
                    @if(Auth::user()->role_id=='4')

                    <li class="side-nav-item">
                        <a href="{{url('student')}}" class="side-nav-link"><i class="uil uil-question-circle"></i><span>Courses</span></a>
                    </li>
                    @endif
                    @if(Auth::user()->role_id=='1'||Auth::user()->role_id=='2'||Auth::user()->role_id=='3')
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#userMenu" aria-expanded="false" class="side-nav-link">
                            <i class="uil uil-abacus"></i><span> Evaluation Reports </span><span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="userMenu">
                            <ul class="side-nav-second-level">
                                <!-- <li><a href="{{url('dashboard/report/')}}">Individual Teacher Report</a></li> -->
                                <li><a href="{{url('dashboard/report/course')}}">All Courses Report</a></li>
                                <li><a href="{{url('dashboard/report/teacher')}}">All Teachers Report</a></li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    <li class="side-nav-item">
                        <a class="side-nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="uil-sign-out-alt"></i><span>Logout</span></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="content-page" id="admin_top_pic">
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
                                @if(Auth::user()->admin_pic!='')
                                <span class="account-user-avatar">
                                    <img height="30" src="{{asset('uploads/admins/'.Auth::user()->admin_pic)}}"/>
                                </span>
                                @else
                                <span class="account-user-avatar">
                                  <img height="30" src="{{asset('uploads/avatar.jpg')}}"/>
                                </span>
                                @endif
                                <span>
                                    <span class="account-user-name">{{Auth::user()->name}}</span>
                                    <span class="account-position">{{Auth::user()->roleInfo->role_name}}</span>

                                    @if(Auth::user()->role_id=='4')
                                    <span class="account-position">{{Auth::user()->stu_id}}</span>
                                    @endif
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="{{url('dashboard/supper/admin/profile')}}" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span>My Account</span>
                                </a>
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
                    <div class="row mt-4">
                    </div>
                    @yield('content')
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <script>document.write(new Date().getFullYear())</script> © State University Of Bangladesh (Mahfujur Rahman)
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    <script src="{{asset('contents/admin/assets/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('contents/admin')}}/assets/js/popper.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/vendor.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/app.min.js"></script>
    <!-- <script src="{{asset('contents/admin')}}/assets/js/vendor/apexcharts.min.js"></script> -->
    <script src="{{asset('contents/admin')}}/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/pages/demo.dashboard.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/vendor/dataTables.bootstrap5.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/ajax.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/script.js"></script>
    @stack('backend-script')
    <script>
      $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    </script>
  </body>
</html>
