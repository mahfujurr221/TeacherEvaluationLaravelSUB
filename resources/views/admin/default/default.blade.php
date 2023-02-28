@extends('layouts.admin')
@section('content')

@if(Session::has('success'))
  <script>
    swal({ title: "Success!", text: "Successfully Upadated Default Values!", icon: "success", timer:2000});
  </script>
@endif
@if(Session::has('error'))
  <script>
    swal({ title: "Opps!", text: "Default values Update Failed!", icon: "warning", timer:2000});
  </script>
@endif

<div class="row col-md-12">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <h2 class="text-center">Current Default Value</h2>
    <table class="table table-bordered table-striped custom_view_table">
      @foreach($default as $data)
      <tr>
        <td>Semester</td>
        <td>:</td>
        <td>{{$data->defaultSemesterInfo->semester_name}}</td>
      </tr>
      <tr>
        <td>Year</td>
        <td>:</td>
        <td>{{$data->semester_year}}</td>
      </tr>
      <tr>
        <td>Question Version</td>
        <td>:</td>
        <td>{{$data->question_version_id}}</td>
      </tr>
      @endforeach
    </table>
  </div>
  <div class="col-md-4"></div>
</div>
<div id="default"  class="row animate__animated animate__fadeInRightBig animate">
    <div class="col-md-12 main_content">
        <div class="card">
            <div class="card-header bg-secondary">
                <div class="row text-center">
                        <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> Set Default </h4>
                    <div class="clearfix"></div>
                </div>
            </div>
            <form method="post" action="{{url('dashboard/default/update')}}">
              @csrf
              <div class="card-body">
                <div class="row mt-4">
                  <div class="col-md-4 nav justify-content-end form-group row custom_form_group mb-3">
                      <label class="col-md-4 col-form-label">Select Year:</label>
                      <div class="col-md-5">
                          <select class="form-control form-select text-center" name="default_year">
                              <option value="0">Year</option>
                              <option value="2022">2022</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                              <option value="2026">2027</option>
                              <option value="2026">2028</option>
                              <option value="2026">2029</option>
                              <option value="2026">2030</option>
                              <option value="2026">2031</option>
                              <option value="2026">2032</option>
                              <option value="2026">2033</option>
                              <option value="2026">2034</option>
                              <option value="2026">2035</option>
                              <option value="2026">2036</option>
                          </select>
                      </div>
                  </div>

                  <div class="col-md-4 form-group row custom_form_group mb-3">
                      <label class="col-md-6 col-form-label">Select Semester:</label>
                      <div class="col-md-6">

                          <select class="form-control form-select" name="default_semester">
                            <option value="Semester">Semester</option>
                            @foreach($semester as $data)
                              <option value="{{$data->semester_id}}">{{$data->semester_name}}</option>
                            @endforeach
                          </select>
                      </div>
                  </div>

                  <div class="col-md-4 form-group row custom_form_group mb-3">
                      <label class="col-md-6 col-form-label">Select Question Version:</label>
                      <div class="col-md-6">
                          <select class="form-control form-select" name="default_version">
                              <option value="0">Version</option>
                              <option value="1">Version 1</option>
                              <option value="2">Version 2</option>
                              <option value="3">Version 3</option>
                          </select>
                      </div>
                  </div>
                </div>
                <div class="card-footer text-center bg-secondary">
                  <button type="submit" class="btn btn-primary">UPDATE</button>
              </div>
                </div>

                </form>
        </div>

    </div>
</div>
@endsection
