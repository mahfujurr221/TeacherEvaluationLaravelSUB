@extends('layouts.admin')
@section('content')
<div class="row mt-5">
  <div class="col-xl-2">

  </div>
  <div class="col-xl-8">
        <div class="card">
          <form method="post" action="{{url('dashboard/semester/update')}}">
            @csrf
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_title"><i class="fa fa-gg-circle"></i>Update Semester</div>
              <div class="col-md-4 text-end card_header_btn">
                <a class="btn btn-success add_admin_btn" href="{{url('dashboard/semester')}}"><i class="fa fa-th"></i>All Semesters</a>
              </div>
            </div>
          </div>
          <div class="card-body text-center">
            <div class="row mb-2 {{$errors->has('semester_name') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Semester Name:</label>
              <div class="col-md-7">
                <input type="hidden" name="semester_id" value="{{$data->semester_id}}">
                <input type="text" class="form-control form_control" id="" name="semester_name" value="{{$data->semester_name}}">
                  @if($errors->has('semester_name'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('semester_name')}}</strong>
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
