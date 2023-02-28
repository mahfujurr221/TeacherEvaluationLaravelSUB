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
                <a class="btn btn-sm btn-success add_admin_btn" href="{{url('dashboard/enroll/student')}}"><i class="fa fa-th"></i>All Courses</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <table class="table table-bordered table-striped custom_view_table">
                  <tr>
                    <td>Student Name</td>
                    <td>:</td>
                    <td>{{$data->stuInfo->name}}</td>
                  </tr>
                  <tr>
                    <td>Student id</td>
                    <td>:</td>
                    <td>{{$data->stu_id}}</td>
                  </tr>
                  <tr>
                    <td>Course Code</td>
                    <td>:</td>
                    <td>{{$data->course_code}}</td>
                  </tr>
                  <tr>
                    <td>Department</td>
                    <td>:</td>
                    <td>{{$data->deptInfo->dept_code}}</td>
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
