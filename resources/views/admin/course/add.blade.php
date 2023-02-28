@extends('layouts.admin')
@section('content')

@if(Session::has('success'))
  <script>
    swal({ title: "Success!", text: "Successfully Added Course!", icon: "success", timer:2000});
  </script>
@endif
@if(Session::has('error'))
  <script>
    swal({ title: "Opps!", text: "Course Add Failed!", icon: "warning", timer:5000});
  </script>
@endif

<div class="row mt-5">
  <div class="col-xl-2">

  </div>
  <div class="col-xl-8">
      <form method="post" action="{{url('dashboard/course/submit')}}">
        @csrf
        <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_title"><i class="fa fa-gg-circle"></i>Add A Course</div>
              <div class="col-md-4 text-end card_header_btn">
                <a class="btn btn-success add_admin_btn" href="{{url('dashboard/course')}}"><i class="fa fa-th"></i>All Courses</a>
              </div>
            </div>
          </div>
          <div class="card-body text-center">
            <div class="row mb-2 {{$errors->has('course_code') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Course Code:</label>
              <div class="col-md-7">
                <input type="text" class="form-control form_control" id="" name="course_code" value="{{old('course_code')}}">
                  @if($errors->has('course_code'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('course_code')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-2 {{$errors->has('course_title') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Course Title:</label>
              <div class="col-md-7">
                <input type="text" class="form-control form_control" id="" name="course_title" value="{{old('course_title')}}">
                  @if($errors->has('course_title'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('course_title')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-2 {{$errors->has('dept_id') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Dept. Code:</label>
              <div class="col-md-4">
                <select class="form-control form-select text-center" name="dept_id">
                  <option value="Department">---Department---</option>
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
          </div>
          <div class="card-footer bg-secondary text-center">
            <button class="btn btn-primary">ADD</button>
          </div>
      </div>
      </form>
  </div>
</div>
@endsection
