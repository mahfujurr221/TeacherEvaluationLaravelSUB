@extends('layouts.admin')
@section('content')
<div id="dashbord" class="row">
    <div class="col-md-12">
        <div class="row">
          @if(Auth::user()->role_id=='1')
            <div class="col-md-3">
                <div class="card widget-flat">
                    <div class="card-body text-center">
                        <div class="float-end dashboard_icon">
                            <i class="uil uil-user-circle"></i>
                        </div>
                        <h4 class="text-muted fw-normal mt-0" title="Number of Customers">Total Admins</h5>
                        <h2 class="mt-3 mb-3">O3</h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
            @endif
            @if(Auth::user()->role_id=='1' || Auth::user()->role_id=='2')
            <div class="col-md-3">
                <div class="card widget-flat">
                    <div class="card-body text-center">
                        <div class="float-end">
                            <i class="uil uil-users-alt"></i>
                        </div>
                        <h4 class="text-muted fw-normal mt-0" title="Teachers">Total Teachers</h5>
                        <h2 class="mt-3 mb-3">
                          {{$tcr->count()}}
                        </h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
            <div class="col-md-3">
                <div class="card widget-flat">
                    <div class="card-body text-center">
                        <div class="float-end">
                            <i class="uil uil-book-reader"></i>
                        </div>
                        <h4 class="text-muted fw-normal mt-0" title="student">Total Students</h5>
                        <h2 class="mt-3 mb-3">
                          {{$student->count()}}
                        </h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
            <div class="col-md-3">
                <div class="card widget-flat">
                    <div class="card-body text-center">
                        <div class="float-end">
                            <i class="uil uil-book-open"></i>
                        </div>
                        <h4 class="text-muted fw-normal mt-0" title="Courses">Total Courses</h5>
                        <h2 class="mt-3 mb-3">
                          {{$course->count()}}
                        </h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
            @endif
            @if(Auth::user()->role_id=='3')
            @if(Auth::user()->dept_id==$department->dept_id)
            <div class="col-md-3">
                <div class="card widget-flat">
                    <div class="card-body text-center">
                        <div class="float-end">
                            <i class="uil uil-users-alt"></i>
                        </div>
                        <h4 class="text-muted fw-normal mt-0" title="Teachers">Total Teachers</h5>
                        <h2 class="mt-3 mb-3">
                          {{$tcr->count()}}
                        </h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
            @endif
            @endif

            @if(Auth::user()->role_id=='3')
            @if(Auth::user()->dept_id==$department->dept_id)
            <div class="col-md-3">
                <div class="card widget-flat">
                    <div class="card-body text-center">
                        <div class="float-end">
                            <i class="uil uil-book-reader"></i>
                        </div>
                        <h4 class="text-muted fw-normal mt-0" title="student">Total Students</h5>
                        <h2 class="mt-3 mb-3">
                          {{$student->count()}}
                        </h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
            @endif
            @endif

            @if(Auth::user()->role_id=='3')
            @if(Auth::user()->dept_id==$department->dept_id)
            <div class="col-md-3">
                <div class="card widget-flat">
                    <div class="card-body text-center">
                        <div class="float-end">
                            <i class="uil uil-book-open"></i>
                        </div>
                        <h4 class="text-muted fw-normal mt-0" title="Courses">Total Courses</h5>
                        <h2 class="mt-3 mb-3">
                          {{$course->count()}}
                        </h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
            @endif
            @endif
          </div>
    </div> <!-- end col -->
</div>
@endsection
