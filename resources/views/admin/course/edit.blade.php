@extends('layouts.admin')
@section('content')

@if(Session::has('success'))
  <script>
    swal({ title: "Success!", text: "Successfully Updated Course!", icon: "success", timer:2000});
  </script>
@endif
@if(Session::has('error'))
  <script>
    swal({ title: "Opps!", text: "Course Update Failed!", icon: "warning", timer:5000});
  </script>
@endif

<div class="row mt-5">
  <div class="col-xl-2">

  </div>
  <div class="col-xl-8">
      <form method="post" action="{{url('dashboard/course/update')}}">
        @csrf
        <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_title"><i class="fa fa-gg-circle"></i>Update Course</div>
              <div class="col-md-4 text-end card_header_btn">
                <a class="btn btn-success add_admin_btn" href="{{url('dashboard/course')}}"><i class="fa fa-th"></i>All Course</a>
              </div>
            </div>
          </div>
          <div class="card-body text-center">
            <div class="row mb-2 {{$errors->has('course_code') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Course Code:</label>
              <div class="col-md-7">
                <input type="hidden" name="id" value="{{$data->course_id}}">
                <input type="hidden" name="slug" value="{{$data->course_slug}}">
                <input type="text" class="form-control form_control" id="" name="course_code" value="{{$data->course_code}}">
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
                <input type="text" class="form-control form_control" id="" name="course_title" value="{{$data->course_title}}">
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
                  @foreach($department as $d)
                    <option value="{{$d->dept_id}}" @if($d->dept_id==$data->dept_id) selected @endif>{{$d->dept_code}}</option>
                  @endforeach
                </select>
                  @if($errors->has('dept_code'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('dept_code')}}</strong>
                    </span>
                  @endif
              </div>
            </div>

          </div>
          <div class="card-footer bg-secondary text-center">
            <button class="btn btn-primary">UPDATE</button>
          </div>
      </div>
      </form>
  </div>
</div>
@endsection
