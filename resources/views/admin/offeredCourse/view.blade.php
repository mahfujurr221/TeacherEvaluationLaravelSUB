@extends('layouts.admin')
@section('content')

@if(Session::has('success'))
  <script>
    swal({ title: "Success!", text: "Successfully Upadated Student!", icon: "success", timer:2000});
  </script>
@endif
@if(Session::has('error'))
  <script>
    swal({ title: "Opps!", text: "Student Update Failed!", icon: "warning", timer:2000});
  </script>
@endif


<div class="row mt-5">
  <div class="col-xl-2">

  </div>
  <div class="col-xl-8">
      <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_title"><i class="fa fa-gg-circle"></i>Offered Course Information</div>
              <div class="col-md-4 text-end card_header_btn">
                <a class="btn btn-sm btn-success add_admin_btn" href="{{url('dashboard/offer/course')}}"><i class="fa fa-th"></i>All Courses</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <table class="table table-bordered table-striped custom_view_table">

                  <tr>
                    <td>Course Code</td>
                    <td>:</td>
                    <td>{{$data->course_code}}</td>
                  </tr>
                  <tr>
                    <td>Course Title</td>
                    <td>:</td>
                    <td>{{$data->course_title}}</td>
                  </tr>
                  <tr>
                    <td>Department</td>
                    <td>:</td>
                    <td>{{$data->deptInfo->dept_code}}</td>
                  </tr>
                  <tr>
                    <td>Teacher</td>
                    <td>:</td>
                    <td>{{$teacher->first_name}}</td>
                  </tr>
                  <tr>
                    <td>Year</td>
                    <td>:</td>
                    <td>{{$default->semester_year}}</td>
                  </tr>
                  <tr>
                    <td>semester</td>
                    <td>:</td>
                    <td>{{$default->semester}}</td>
                  </tr>
                </table>
              </div>
              <div class="col-md-2"></div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
