@extends('layouts.admin')
@section('content')


@if(Session::has('success'))
  <script>
    swal({ title: "Success!", text: "Successfully Upadated Department!", icon: "success", timer:2000});
  </script>
@endif
@if(Session::has('error'))
  <script>
    swal({ title: "Opps!", text: "Department Update Failed!", icon: "warning", timer:2000});
  </script>
@endif


<div class="row mt-5">
  <div class="col-xl-2">

  </div>
  <div class="col-xl-8">
      <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_title"><i class="fa fa-gg-circle"></i>Department Information</div>
              <div class="col-md-4 text-end card_header_btn">
                <a class="btn btn-sm btn-success add_admin_btn" href="{{url('dashboard/department')}}"><i class="fa fa-th"></i>All Department</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <table class="table table-bordered table-striped custom_view_table">
                  <tr>
                    <td>Department Code</td>
                    <td>:</td>
                    <td>{{$data->dept_code}}</td>
                  </tr>
                  <tr>
                    <td>Department Name</td>
                    <td>:</td>
                    <td>{{$data->dept_name}}</td>
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
