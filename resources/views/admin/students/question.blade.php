@extends('layouts.admin')
@section('content')
<div id="question_submit" class="row m-auto">
  <div class="col-md-12 text-center mt-5">
    <h2> Teacher Name: {{$offerCourseq->tcrInfo->name}}</h2>
    <h3>{{($offerCourseq->courseInfo->course_code)}}</h3>

  </div>
  <div class="row mt-2">
    <div class="col-md-3">  </div>
    <div class="col-md-6">
      <form class="form-control" action="{{url('student/evaluate/submit')}}" method="post">
        @csrf
        <div class="card question_card">
          <div class="card-body">
            <input type="hidden" class="form-check-input" name="offered_course_id" value="{{$enrollInfo->offered_course_id}}">
            <input type="hidden" class="form-check-input" name="version_id" value="{{$default->question_version_id}}">
            <input type="hidden" class="form-check-input" name="semister" value="{{$default->semester_id}}">
            <input type="hidden" class="form-check-input" name="year" value="{{$default->semester_year}}">
            @foreach($mcq as $data)
              @if($data->question_version_id == $default->question_version_id)
              <div class="question">
                <h4>{{$data->question_description}}</h4>
                <div class="form-check">
                    <input type="hidden" class="form-check-input" name="question_id[]" value="{{$data->question_id}}">
                    <input type="radio" class="form-check-input" name="option{{$data->question_id}}" value="1">
                    <label class="form-check-label" id="option1" for="radio1">{{$data->option1_desc}}</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="option{{$data->question_id}}" value="2">
                    <label class="form-check-label" id="option2" for="radio2">{{$data->option2_desc}}</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="option{{$data->question_id}}" value="3" checked>
                    <label class="form-check-label" id="option3" for="radio3">{{$data->option3_desc}}</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="option{{$data->question_id}}" value="4" >
                    <label class="form-check-label" id="option4" for="radio4">{{$data->option4_desc}}</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="option{{$data->question_id}}" value="5" >
                    <label class="form-check-label" id="option5" for="radio5">{{$data->option5_desc}}</label>
                </div>
                @endif
            @endforeach

            <div class="mt-5">
              <hr>
            </div>
              @if($data->question_version_id == $default->question_version_id)
              <div class="question">
                <h4>What Should Teacher Improve?</h4>
                <div class="form-check">
                    <textarea name="name" rows="5" cols="50" placeholder="Teacher must be friendly to students." value="Teacher must be friendly to students."></textarea>
                 </div>
                @endif
              <div class="text-center mt-3">
                <button type="submit" class="btn submit_btn">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
