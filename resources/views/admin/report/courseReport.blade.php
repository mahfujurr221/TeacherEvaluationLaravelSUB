@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
      <h2 class="text-center m-2">{{$default->defaultSemesterInfo->semester_name}}-{{$default->semester_year}}</h2>
      <h2 class="text-center mb-5">----------------</h2>
  </div>
</div>
<div id="offered_courses"  class="row animate__animated animate__fadeInRightBig animate">
    <div class="col-md-12 main_content">
        <div class="card">
          <h2 class=" card-header text-center mt-2">All Courses Reports</h2>
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
                            <th scope="col" class="text-center">Manage</th>
                        </tr>
                    </thead>

                    <tbody>
                      @foreach($offeredCourse as $data)
                      @if($data->semester_id==$default->semester_id && $data->year ==$default->semester_year )
                      @if(Auth::user()->dept_id==$data->dept_id)
                        <tr>
                            <td>{{$data->courseInfo->course_code}}</td>
                            <td>{{$data->courseInfo->course_title}}</td>
                            <td>{{$data->deptInfo->dept_code}}</td>
                            <td>{{$data->tcrInfo->name}}</td>
                            <td>{{$data->year}}</td>
                            <td>{{$data->semInfo->semester_name}}</td>
                            <td class="text-center">
                                <a class="btn btn-danger manage_btn delete_btn" href="{{url('dashboard/report/course/view/'.$data->offered_course_id)}}"><i class="fa fa-th"></i>See Report</a>
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
                                <a class="btn btn-danger manage_btn view_btn" href="{{url('dashboard/report/course/view/'.$data->offered_course_id)}}"><i class="fa fa-th"></i>See Report</a>
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
@endsection
