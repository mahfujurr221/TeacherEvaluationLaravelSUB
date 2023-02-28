@extends('layouts.admin')
@section('content')

@if(Session::has('success'))
  <script>
    swal({ title: "Success!", text: "Successfully Update Role!", icon: "success", timer:2000});
  </script>
@endif
@if(Session::has('error'))
  <script>
    swal({ title: "Opps!", text: "Roll Update Failed failed!", icon: "warning", timer:2000});
  </script>
@endif

<div class="row mt-5">
  <div class="col-xl-2">

  </div>
  <div class="col-xl-8">
      <form method="post" action="{{url('dashboard/role/update')}}">
        @csrf
        <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_title"><i class="fa fa-gg-circle"></i>Update  Role</div>
              <div class="col-md-4 text-end card_header_btn">
                <a class="btn btn-success add_admin_btn" href="{{url('dashboard/role')}}"><i class="fa fa-th"></i>All Role</a>
              </div>
            </div>
          </div>
          <div class="card-body text-center">
            <div class="row mb-2 {{$errors->has('role_name') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Role Name:</label>
              <div class="col-md-7">
                <input type="hidden" name="id" value="{{$data->role_id}}">
                <input type="hidden" name="slug" value="{{$data->role_slug}}">
                <input type="text" class="form-control form_control" id="" name="role_name" value="{{$data->role_name}}">
                  @if($errors->has('role_name'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('role_name')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
          </div>
          <div class="card-footer bg-secondary text-center">
            <button class="btn btn-primary">Update</button>
          </div>
      </div>
      </form>
  </div>
</div>
@endsection
