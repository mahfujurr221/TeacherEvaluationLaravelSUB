@extends('layouts.admin')
@section('content')


@if(Session::has('success'))
  <script>
    swal({ title: "Success!", text: "Successfully Upadated Admin!", icon: "success", timer:2000});
  </script>
@endif
@if(Session::has('error'))
  <script>
    swal({ title: "Opps!", text: "Admin Update Failed!", icon: "warning", timer:2000});
  </script>
@endif


<div class="row mt-5">
  <div class="col-xl-2">

  </div>
  <div class="col-xl-8">
      <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_title"><i class="fa fa-gg-circle"></i>Admin Information</div>
              <div class="col-md-4 text-end card_header_btn">
                <a class="btn btn-sm btn-success add_admin_btn" href="{{url('dashboard/user')}}"><i class="fa fa-th"></i>All Admin</a>
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
                    <td>Admin Name</td>
                    <td>:</td>
                    <td>{{$data->first_name}} {{$data->first_name}}</td>
                  </tr>
                  <tr>
                    <td>Role </td>
                    <td>:</td>
                    <td>
                      {{@if($data->dept_code)}}
                    </td>
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
