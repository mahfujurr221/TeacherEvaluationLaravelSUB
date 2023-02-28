@extends('layouts.admin')
@section('content')

@if(Session::has('success'))
  <script>
    swal({ title: "Success!", text: "Successfully Upadated question!", icon: "success", timer:2000});
  </script>
@endif
@if(Session::has('error'))
  <script>
    swal({ title: "Opps!", text: "question Update Failed!", icon: "warning", timer:2000});
  </script>
@endif


<div class="row mt-5">
  <div class="col-xl-2">
  </div>
  <div class="col-xl-8">
      <div class="card">
          <div class="card-header bg-secondary">
            <div class="row">
              <div class="col-md-8 card_header_title"><i class="fa fa-gg-circle"></i>Question Information</div>
              <div class="col-md-4 text-end card_header_btn">
                <a class="btn btn-sm btn-success add_admin_btn" href="{{url('dashboard/mcq/question')}}"><i class="fa fa-th"></i>All MCQ</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <table class="table table-bordered table-striped custom_view_table">
                  <tr>
                    <td>Question Version</td>
                    <td>:</td>
                    <td>{{$data->question_version_id}}</td>
                  </tr>
                  <tr>
                    <td>Question Description</td>
                    <td>:</td>
                    <td>{{$data->question_description}}</td>
                  </tr>
                  <tr>
                    <td>Option 1</td>
                    <td>:</td>
                    <td>{{$data->option1_desc}}</td>
                  </tr>
                  <tr>
                    <td>Option 2</td>
                    <td>:</td>
                    <td>{{$data->option2_desc}}</td>
                  </tr>
                  <tr>
                    <td>Option 3</td>
                    <td>:</td>
                    <td>{{$data->option3_desc}}</td>
                  </tr>
                  <tr>
                    <td>Option 4</td>
                    <td>:</td>
                    <td>{{$data->option4_desc}}</td>
                  </tr>
                  <tr>
                    <td>Option 5</td>
                    <td>:</td>
                    <td>{{$data->option5_desc}}</td>
                  </tr>
                </table>
              </div>
              <div class="col-md-2"></div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
