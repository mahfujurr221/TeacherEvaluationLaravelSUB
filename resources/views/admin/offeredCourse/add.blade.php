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
      <form method="post" action="{{url('dashboard/offer/course/submit')}}">
        @csrf
        <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_title"><i class="fa fa-gg-circle"></i>Offer A Course</div>
              <div class="col-md-4 text-end card_header_btn">
                <a class="btn btn-success add_admin_btn" href="{{url('dashboard/offer/course')}}"><i class="fa fa-th"></i>All offered Courses</a>
              </div>
            </div>
          </div>
          <div class="card-body text-center">
            <div class="row mb-2 {{$errors->has('dept_id') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Dept. Code:</label>
              <div class="col-md-4">
                <select id="department_id" class="form-control form-select text-center" name="dept_id">
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
            <div class="row mb-2 {{$errors->has('tcr_id') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Teacher:</label>
              @php
                $allTeacher=App\Models\Teacher::where('tcr_status',1)->orderBy('tcr_id','ASC')->get();
              @endphp
              <div class="col-md-4">
                <select id="teacher" class="form-control form-select text-center" name="tcr_id">
                  <option value="0">Select Teacher</option>
                </select>
                  @if($errors->has('tcr_id'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('tcr_id')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-2 {{$errors->has('course_id') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Course Code:</label>
              <div class="col-md-4">
                <select id="course_dropdown" class="form-control form-select text-center" name="course_id">
                  <option value="">Select Course</option>
                </select>
                  @if($errors->has('course_id'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('course_id')}}</strong>
                    </span>
                  @endif
              </div>
            </div>

            <div class="row mb-2 {{$errors->has('semester') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">semester:</label>
              <div class="col-md-4">
                <select class="form-control form-select text-center" name="semester">
                  @foreach($default as $df)
                    <option value="{{$df->semester_id}}">{{$df->defaultSemesterInfo->semester_name}}</option>
                  @endforeach
                </select>
                  @if($errors->has('semester'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('semester')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-2 {{$errors->has('year') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Year:</label>
              <div class="col-md-4">
                <select class="form-control form-select text-center" name="year">
                  @foreach($default as $df)
                    <option value="{{$df->semester_year}}">{{$df->semester_year}}</option>
                  @endforeach
                </select>
                  @if($errors->has('year'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('year')}}</strong>
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
