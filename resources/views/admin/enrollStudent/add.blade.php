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
      <form method="post" action="{{url('dashboard/enroll/student/submit')}}">
        @csrf
        <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_title"><i class="fa fa-gg-circle"></i>Enrolling Student</div>
              <div class="col-md-4 text-end card_header_btn">
                <a class="btn btn-success add_admin_btn" href="{{url('dashboard/enroll/student')}}"><i class="fa fa-th"></i>All Enrolled Students</a>
              </div>
            </div>
          </div>
          <div class="card-body text-center">
            <div class="row mb-2 {{$errors->has('dept_id') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Dept. Code:</label>
              <div class="col-md-4">
                <input type="hidden" class="form-control form_control" id="" name="semester_id" value="{{$default->semester_id}}">
                <input type="hidden" class="form-control form_control" id="" name="year" value="{{$default->semester_year}}">
                <select id="enroll_department_id" class="form-control form-select text-center" name="dept_id">
                  <option label="Department"></option>
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
            <div class="row mb-2 {{$errors->has('course_id') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Course Code:</label>
              <div class="col-md-4">
                <select id="enroll_course_dropdown" class="form-control form-select text-center" name="course_id">
                  <option value="">Select Course</option>
                </select>
                  @if($errors->has('course_id'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('course_id')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-2 {{$errors->has('stu_id') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Student Id:</label>
              <div class="col-md-7">
                <input type="text" class="form-control form_control" id="" name="stu_id" value="{{old('stu_id')}}">
                  @if($errors->has('stu_id'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('stu_id')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
          </div><!--end of card body -->
          <div class="card-footer bg-secondary text-center">
            <button class="btn btn-primary">ADD</button>
          </div>
      </div>
      </form>
  </div>
</div>
@endsection
