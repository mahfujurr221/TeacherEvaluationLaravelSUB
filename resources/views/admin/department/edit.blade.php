@extends('layouts.admin')
@section('content')
<div class="row mt-5">
  <div class="col-xl-2">

  </div>
  <div class="col-xl-8">
        <div class="card">
          <form method="post" action="{{url('dashboard/department/update')}}">
            @csrf
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_title"><i class="fa fa-gg-circle"></i>Edit Department</div>
              <div class="col-md-4 text-end card_header_btn">
                <a class="btn btn-success add_admin_btn" href="{{url('dashboard/department')}}"><i class="fa fa-th"></i>All Department</a>
              </div>
            </div>
          </div>
          <div class="card-body text-center">
            <div class="row mb-2 {{$errors->has('dept_code') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Department Code:</label>
              <div class="col-md-7">
                <input type="hidden" name="dept_id" value="{{$data->dept_id}}">
                <input type="text" class="form-control form_control" id="" name="dept_code" value="{{$data->dept_code}}">
                  @if($errors->has('dept_code'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('dept_code')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-2 {{$errors->has('dept_name') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Department Name:</label>
              <div class="col-md-7">
                <input type="text" class="form-control form_control" id="" name="dept_name" value="{{$data->dept_name}}">
                @if($errors->has('dept_name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{$errors->first('dept_name')}}</strong>
                </span>
              @endif
              </div>
            </div>
          </div>
          <div class="card-footer bg-secondary text-center">
            <button class="btn btn-primary">ADD</button>
          </div>
      </div>
      </form>
  </div>
</div>
@endsection
