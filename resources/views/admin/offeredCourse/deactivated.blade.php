@extends('layouts.admin')
@section('content')
@if(Session::has('success'))
<script>
  swal({ title: "Success!", text: "Successfully Course Activated!", icon: "success", timer:2000});
</script>
@endif
<div class="row">
  <div class="col-md-12">
      <h2 class="text-center m-2">{{$default->defaultSemesterInfo->semester_name}}-{{$default->semester_year}}</h2>
  </div>
</div>
<div id="offered_courses"  class="row animate__animated animate__fadeInRightBig animate__delay-1s">
    <div class="col-md-12 main_content">
        <div class="card">
            <div class="card-header bg-secondary">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card_header_title"><i class="fa fa-gg-circle"></i> ALL Deactive Courses</h4>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-2 text-right">
                        <a class="btn btn-sm btn-success add_admin_btn" href="{{url('dashboard/offer/course')}}"><i class="fa fa-plus-square fa-lg"></i>Offered Courses</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="card-body">
                <table id="offerCourseDataTable" class="table table-bordered table-striped custom_table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Course Code</th>
                            <th scope="col">Course Title</th>
                            <th scope="col">Department Code</th>
                            <th scope="col">Teacher</th>
                            <th scope="col">Year</th>
                            <th scope="col">Semester</th>
                            <th scope="col" class="text-center">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                      @foreach($all as $data)
                        @if($data->semester_id==$default->semester_id && $data->year ==$default->semester_year)
                          @if(Auth::user()->dept_id==$data->dept_id)
                              <tr>
                                  <td>{{$data->courseInfo->course_code}}</td>
                                  <td>{{$data->courseInfo->course_title}}</td>
                                  <td>{{$data->deptInfo->dept_code}}</td>
                                  <td>{{$data->tcrInfo->name}}</td>
                                  <td>{{$data->year}}</td>
                                  <td>{{$data->semInfo->semester_name}}</td>

                                  <td class="text-center">
                                      <a class="btn btn-success status_btn" href="#" id="offered_course_active" data-bs-toggle="modal" data-bs-target="#offered_course_active_modal" data-id="{{$data->offered_course_id}}">Active</a>
                                  </td>
                              </tr>
                              @endif
                            @if(Auth::user()->role_id=='1'||Auth::user()->role_id=='2')
                                <tr>
                                    <td>{{$data->courseInfo->course_code}}</td>
                                    <td>{{$data->courseInfo->course_title}}</td>
                                    <td>{{$data->deptInfo->dept_code}}</td>
                                    <td>{{$data->tcrInfo->name}}</td>
                                    <td>{{$data->year}}</td>
                                    <td>{{$data->semInfo->semester_name}}</td>

                                    <td class="text-center">
                                        <a class="btn btn-success status_btn" href="#" id="offered_course_active" data-bs-toggle="modal" data-bs-target="#offered_course_active_modal" data-id="{{$data->offered_course_id}}">Active</a>
                                    </td>
                                </tr>
                              @endif
                          @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="offered_course_active_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="{{url('dashboard/offer/course/active')}}">
          @csrf
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="standard-modalLabel">Confirm Deactive</h4>
              </div>
              <div class="modal-body modal_body">
                  <h3>Are you sure want to Active course?</h3>
                  <input type="text" name="offered_course_active_id" id="offered_crs_active_id"/>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Confirm</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>
          </div>
        </form>
    </div>
</div>
@endsection
