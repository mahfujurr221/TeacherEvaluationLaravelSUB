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
      <form method="post" action="{{url('dashboard/student/submit')}}" enctype="multipart/form-data">
        @csrf
        <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_title"><i class="fa fa-gg-circle"></i>Add A Student</div>
              <div class="col-md-4 text-end card_header_btn">
                <a class="btn btn-success add_admin_btn" href="{{url('dashboard/student')}}"><i class="fa fa-th"></i>All Student</a>
              </div>
            </div>
          </div>
          <div class="card-body text-center">
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
            <div class="row mb-2 {{$errors->has('dept_id') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Department Code:</label>
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
            <div class="row mb-2 {{$errors->has('name') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Name:</label>
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
            <div class="row mb-2 {{$errors->has('stu_pic') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">pic:</label>
              <div class="col-md-4">
                <input type="file" class="form-control form_control"  name="stu_pic">
                @if($errors->has('stu_pic'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{$errors->first('stu_pic')}}</strong>
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
