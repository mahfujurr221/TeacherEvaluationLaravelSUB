@extends('layouts.admin')
@section('content')
<div id="sup_admin_profile" class="row mt-3">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="card">
          <table class="table table-bordered table-striped custom_view_table">
              <tr>
                <td>Name</td>
                <td>:</td>
                <td>{{Auth::user()->name}}</td>
              </tr>

              <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{Auth::user()->email}}</td>
              </tr>
              <tr>
                <td>Photo</td>
                <td>:</td>
                <td><img src="{{asset('uploads/admins/'.Auth::user()->admin_pic)}}" height="30px"/></td>
              </tr>
              <form class="form-control" action="" method="post">
                @csrf
                <tr>
                  <td>Password</td>
                  <td>:</td>
                  <td>
                    <div class="row col-md-6">
                      <input type="password" class="form-control form_control" id="" name="" value="{{Auth::user()->password}}">
                    </div>
                    <div class="col-md-6 mt-2">
                      <a href="{{url('dashboard/user/change_password')}}" class="btn btn-success"> Change Password</a>
                    </div>
                  </td>
                </tr>
              </form>
          </table>
        </div>
      </div>
      <div class="col-md-2">

      </div>
    </div>
  </div>
</div>
@endsection
