@extends('layouts.admin')
@section('content')

@if(Session::has('success'))
  <script>
    swal({ title: "Success!", text: "Successfully Added Mcq!", icon: "success", timer:2000});
  </script>
@endif
@if(Session::has('error'))
  <script>
    swal({ title: "Opps!", text: "Mcq Add Failed!", icon: "warning", timer:5000});
  </script>
@endif

<div class="row mt-5">
  <div class="col-xl-2">

  </div>
  <div class="col-xl-8">
      <form method="post" action="{{url('dashboard/mcq/question/submit')}}">
        @csrf
        <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_title"><i class="fa fa-gg-circle"></i>Add a question</div>
              <div class="col-md-4 text-end card_header_btn">
                <a class="btn btn-success add_admin_btn" href="{{url('dashboard/mcq/question')}}"><i class="fa fa-th"></i>All Question</a>
              </div>
            </div>
          </div>
          <div class="card-body text-center">
            <div class="row mb-2 {{$errors->has('version_id') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Question version:</label>
              <div class="col-md-4">
                <select class="form-control form-select text-center" name="version_id">
                  <option value="0">---Version---</option>
                    <option value="1">Version 1</option>
                    <option value="2">Version 2</option>
                    <option value="3">Version 3</option>
                </select>
                  @if($errors->has('version_id'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('version_id')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-2 {{$errors->has('question_description') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Question Description:</label>
              <div class="col-md-7">
                <input type="text" class="form-control form_control" id="" name="question_description" value="{{old('question_description')}}">
                  @if($errors->has('question_description'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('question_description')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-2 {{$errors->has('option1') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Option 1:</label>
              <div class="col-md-7">
                <input type="text" class="form-control form_control" id="" name="option1" value="{{old('option1')}}">
                  @if($errors->has('option1'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('option1')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-2 {{$errors->has('option2') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Option 2:</label>
              <div class="col-md-7">
                <input type="text" class="form-control form_control" id="" name="option2" value="{{old('option2')}}">
                  @if($errors->has('option2'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('option2')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-2 {{$errors->has('option3') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Option 3:</label>
              <div class="col-md-7">
                <input type="text" class="form-control form_control" id="" name="option3" value="{{old('option3')}}">
                  @if($errors->has('option3'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('option3')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-2 {{$errors->has('option4') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Option 4:</label>
              <div class="col-md-7">
                <input type="text" class="form-control form_control" id="" name="option4" value="{{old('option4')}}">
                  @if($errors->has('option4'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('option4')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="row mb-2 {{$errors->has('option5') ? 'has-error' : ''}}">
              <label class="col-md-3 col-form-label col_form_label">Option 4:</label>
              <div class="col-md-7">
                <input type="text" class="form-control form_control" id="" name="option5" value="{{old('option5')}}">
                  @if($errors->has('option5'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('option5')}}</strong>
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
