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
      <form method="post" action="{{url('dashboard/user/update')}}" enctype="multipart/form-data">
        @csrf
        <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_title"><i class="fa fa-gg-circle"></i>Update A Admin</div>
              <div class="col-md-4 text-end card_header_btn">
                <a class="btn btn-success add_admin_btn" href="{{url('dashboard/user')}}"><i class="fa fa-th"></i>All Admins</a>
              </div>
            </div>
          </div>
          <div class="card-body text-center">
            <div class="row mb-2 {{$errors->has('name') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label"> Name:</label>
              <div class="col-md-7">
                <input type="hidden" class="form-control form_control" name="slug" value="{{$data->admin_slug}}">
                <input type="hidden" class="form-control form_control" name="id" value="{{$data->id}}">
                <input type="text" class="form-control form_control" id="" name="name" value="{{$data->name}}">
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
                <input type="text" class="form-control form_control" id="" name="email" value="{{$data->email}}">
                @if($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{$errors->first('email')}}</strong>
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
                  @foreach($department as $d)
                    <option value="{{$d->dept_id}}" @if($d->dept_id==$data->dept_id) selected @endif>{{$d->dept_code}}</option>
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
                    <option value="{{$r->role_id}}" @if($r->role_id==$data->role_id) selected @endif>{{$r->role_name}}</option>
                  @endforeach
                </select>
                  @if($errors->has('role'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('role')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-2 {{$errors->has('admin_pic') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">pic:</label>
              <div class="col-md-4">
                <input type="file" class="form-control form_control"  name="admin_pic">
              </div>
              <div class="col-md-2">
                @if($data->admin_pic!='')
                  <img height="30" src="{{asset('uploads/teachers/'.$data->admin_pic)}}"/>
                @else
                  <img height="30" src="{{asset('uploads/avatar.jpg')}}"/>
                @endif
              </div>
            </div>
          </div>
          <div class="card-footer bg-secondary text-center">
            <button type="submit" class="btn btn-primary">update</button>
          </div>
      </div>
      </form>
  </div>
</div>
@endsection
