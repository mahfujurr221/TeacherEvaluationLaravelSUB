@extends('layouts.admin')
@section('content')

@if(Session::has('success'))
  <script>
    swal({ title: "Success!", text: "Successfully Added Admin!", icon: "success", timer:2000});
  </script>
@endif
@if(Session::has('error'))
  <script>
    swal({ title: "Opps!", text: "Admin Add Failed!", icon: "warning", timer:5000});
  </script>
@endif
@if(Session::has('missmatched'))
  <script>
    swal({ title: "Opps!", text: "Password mismatched!", icon: "warning", timer:5000});
  </script>
@endif

<div class="row mt-5">
  <div class="col-xl-2">

  </div>
  <div class="col-xl-8">
      <form method="post" action="{{url('dashboard/user/submit')}}" enctype="multipart/form-data">
        @csrf
        <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_title"><i class="fa fa-gg-circle"></i>Add A Admin</div>
              <div class="col-md-4 text-end card_header_btn">
                <a class="btn btn-success add_admin_btn" href="{{url('dashboard/user')}}"><i class="fa fa-th"></i>All Admins</a>
              </div>
            </div>
          </div>
          <div class="card-body text-center">
            <div class="row mb-2 {{$errors->has('name') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label"> Name:</label>
              <div class="col-md-7">
                <input type="text" class="form-control form_control" id="" name="name" value="{{old('name')}}">
                @if($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{$errors->first('name')}}</strong>
                </span>
              @endif
              </div>
            </div>

            <div class="row mb-2 {{$errors->has('email') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Email:</label>
              <div class="col-md-7">
                <input type="text" class="form-control form_control" id="" name="email" value="{{old('email')}}">
                @if($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{$errors->first('email')}}</strong>
                </span>
              @endif
              </div>
            </div>
            <div class="row mb-2 {{$errors->has('password') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Password:</label>
              <div class="col-md-7">
                <input type="password" class="form-control form_control" id="" name="password" value="{{old('password')}}">
                @if($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{$errors->first('password')}}</strong>
                </span>
              @endif
              </div>
            </div>
            <div class="row mb-2 {{$errors->has('confirm_password') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Confirm Password:</label>
              <div class="col-md-7">
                <input type="password" class="form-control form_control" id="" name="confirm_password" value="{{old('confirm_password')}}">
                @if($errors->has('confirm_password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{$errors->first('confirm_password')}}</strong>
                </span>
              @endif
              </div>
            </div>
            <div class="row mb-2 {{$errors->has('dept_id') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Department Code:</label>
              <div class="col-md-4">
                <select class="form-control form-select text-center" name="dept_id">
                  <option value="">---Department---</option>
                  <option value="0">None</option>
                  @foreach($department as $data)
                    <option value="{{$data->dept_id}}">{{$data->dept_code}}</option>
                  @endforeach
                </select>
                  @if($errors->has('dept_id'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('dept_id')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-2 {{$errors->has('role') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">User Role:</label>
              <div class="col-md-4">
                <select class="form-control form-select text-center" name="role">
                  <option value="role">---Role---</option>
                  @foreach($role as $r)
                    <option value="{{$r->role_id}}">{{$r->role_name}}</option>
                  @endforeach
                </select>
                  @if($errors->has('role'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('role')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-md-3 col-form-label col_form_label">Pic:</label>
              <div class="col-md-4">
                <input type="file" class="form-control form_control"  name="admin_pic">
              </div>
            </div>
          </div>
          <div class="card-footer bg-secondary text-center">
            <button type="submit" class="btn btn-primary">ADD</button>
          </div>
      </div>
      </form>
  </div>
</div>
@endsection
