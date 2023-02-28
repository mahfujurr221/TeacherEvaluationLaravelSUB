@extends('layouts.admin')
@section('content')
@if(Session::has('success'))
  <script>
    swal({ title: "Success!", text: "Successfully Evaluated Teacher!", icon: "success", timer:2000});
  </script>
@endif
@if(Session::has('error'))
  <script>
    swal({ title: "Opps!", text: "Teacher Evaluation Failed!", icon: "warning", timer:5000});
  </script>
@endif
<div class="row">
  <div class="col-md-12">
      <h2 class="text-center m-2">{{$default->defaultSemesterInfo->semester_name}}-{{$default->semester_year}}</h2>
  </div>
</div>
<div id="student_page" class="row">
  <div class="col-md-12">
    <div class="row">
      @foreach($enrollStudent as $data)
      @if($data->offerCourseInfo->semester_id==$default->semester_id && $data->offerCourseInfo->year==$default->semester_year)
         @if($data->offerCourseInfo->enable_evaluation == 0)
            @if(Auth::user()->dept_id==$data->dept_id)
              @if($data->stu_id==Auth::user()->stu_id)
              @if($data->evaluation_status=='1')
              <div class="col-md-4">
                <a href="{{url('student/question/'.$data->offered_course_id)}}">
                  <div class="card text-center">
                      <div class="card-header text-center">
                          <h3>{{$data->courseInfo->course_code}}</h3>
                      </div>
                      <div class="card-body text-center">
                        <h3 class="card-title">{{$data->courseInfo->course_title}}</h3>
                      </div>
                      <div class="card-footer text-center">
                        <h4>Not Evaluated</h4>
                    </div>
                  @endif
                  @if($data->evaluation_status=='0')
                  <div class="col-md-4">
                    <a href="{{url('student/evaluated/'.$data->offered_course_id)}}">
                      <div class="card text-center">
                          <div class="card-header text-center">
                              <h3>{{$data->courseInfo->course_code}}</h3>
                          </div>
                          <div class="card-body text-center">
                            <h3 class="card-title">{{$data->courseInfo->course_title}}</h3>
                          </div>
                          <div class="card-footer text-center">
                            <h4 style="color:red;">Already Evaluated</h4>
                        </div>
                      @endif
                    </div>
                  </a>
                </div>
                @endif
              @endif
            @endif
          @endif
        @endforeach
      </div>
    </div>
  </div>
</div>
</div>
@endsection
