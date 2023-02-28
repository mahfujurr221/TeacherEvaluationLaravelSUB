@extends('layouts.admin')
@section('content')

@if(Session::has('success'))
  <script>
    swal({ title: "Success!", text: "Successfully Added Student!", icon: "success", timer:2000});
  </script>
@endif
@if(Session::has('error'))
  <script>
    swal({ title: "Opps!", text: "Student Add Failed!", icon: "warning", timer:5000});
  </script>
@endif

<div class="row mt-5">
  <div class="col-xl-2">

  </div>
  <div class="col-xl-8">
    <form method="post" action="{{url('dashboard/enroll/student/update')}}">
      @csrf
      <div class="card">
        <div class="card-header bg-secondary">
          <div class="row">
            <div class="col-md-8 card_header_title"><i class="fa fa-gg-circle"></i>Edit Enrolled Student</div>
            <div class="col-md-4 text-end card_header_btn">
              <a class="btn btn-success add_admin_btn" href="{{url('dashboard/enroll/student')}}"><i class="fa fa-th"></i>All Enrolled Students</a>
            </div>
          </div>
        </div>
        <div class="card-body text-center">
          <div class="row mb-2 {{$errors->has('dept_id') ? 'has-error' : ''}}">
            <label class="col-md-3 col-form-label col_form_label">Dept. Code:</label>
            <div class="col-md-4">
              <input type="hidden" name="id" value="{{$data->enroll_id}}">
              <input type="hidden" name="slug" value="{{$data->enroll_slug}}">
              <select class="form-control form-select text-center" name="dept_id">
                <option value="Department">---Department---</option>
                @foreach($department as $d)
                  <option value="{{$d->dept_id}}">{{$d->dept_code}}</option>
                @endforeach
              </select>
                @if($errors->has('dept_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('dept_id')}}</strong>
                  </span>
                @endif
            </div>
          </div>
          <div class="row mb-2 {{$errors->has('tcr_id') ? 'has-error' : ''}}">
            <label class="col-md-3 col-form-label col_form_label">Teacher:</label>
            <div class="col-md-4">
              <select class="form-control form-select text-center" name="tcr_id">
                <option value="Teacher">---Teacher---</option>
                @foreach($teacher as $tcr)
                  <option value="{{$tcr->tcr_id}}" @if($tcr->tcr_id==$data->tcr_id) selected @endif>{{$tcr->first_name}} {{$tcr->last_name}}</option>
                @endforeach
              </select>
                @if($errors->has('tcr_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('tcr_id')}}</strong>
                  </span>
                @endif
            </div>
          </div>
          <div class="row mb-2 {{$errors->has('course_code') ? 'has-error' : ''}}">
            <label class="col-md-3 col-form-label col_form_label">Course code:</label>
            <div class="col-md-4">
              <select class="form-control form-select text-center" name="course_code">
                <option value="Department">---Course Code---</option>
                @foreach($offercourse as $oc)
                  <option value="{{$oc->course_code}}" @if($oc->course_code==$data->course_code) selected @endif>{{$oc->course_code}}</option>
                @endforeach
              </select>
                @if($errors->has('course_code'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('course_code')}}</strong>
                  </span>
                @endif
            </div>
          </div>
          <div class="row mb-2 {{$errors->has('stu_id') ? 'has-error' : ''}}">
            <label class="col-md-3 col-form-label col_form_label">Student Id:</label>
            <div class="col-md-7">
              <input type="text" class="form-control form_control" id="" name="stu_id" value="{{$data->stu_id}}">
                @if($errors->has('stu_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('student_id')}}</strong>
                  </span>
                @endif
            </div>
          </div>
          <div class="row mb-2 {{$errors->has('stu_name') ? 'has-error' : ''}}">
            <label class="col-md-3 col-form-label col_form_label">Student Name:</label>
            <div class="col-md-7">
              <input type="text" class="form-control form_control" id="" name="stu_name" value="{{$data->stu_name}}">
                @if($errors->has('stu_name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('stu_name')}}</strong>
                  </span>
                @endif
            </div>
          </div>
        </div><!--end of card body -->
        <div class="card-footer bg-secondary text-center">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
    </form>
  </div>
</div>
@endsection
