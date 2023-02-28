@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
      <h2 class="text-center m-3">{{$default->defaultSemesterInfo->semester_name}}-{{$default->semester_year}}</h2>
      <h2 class="text-center mb-2">----------------</h2>
      <h3 class="text-center mb-0">Course Teacher <span style="color:green">({{$offeredCourse->tcrInfo->name}})</span></h3>
      <h4 class="text-center">({{$offeredCourse->courseInfo->course_code}})</h5>
  </div>
</div>
<div class="row mt-1">
  <div class="col-xl-12">
      <div class="card">
        <h4 class="card-header text-center">MCQ</h4>
          <div class="card-body">
            <div class="row">
              <div class="col-md-1">

              </div>
              <div class="col-md-10">
                <table class="table table-bordered table-striped">
                  <thead>
                      <tr class="text-center">
                          <th scope="col">Qiestion No</th>
                          <th scope="col">Questions</th>
                          <th scope="col">Responses</th>
                          <th scope="col">Total Score</th>
                      </tr>
                  </thead>
                  @if($default->semester_id == $offeredCourse->semester_id && $default->semester_year == $offeredCourse->year)
                  <?php $totalQuestion = $totalAvgScore = $totalPositiveResponse=0;
                    foreach ($reportData as $key => $value):

                      $totalAvgScore += $value["avg_response"];
                      // $totalPositiveResponse+=($value["avg_response"]*100)/($value["total_response"]*5);
                      $totalQuestion++;
                    ?>
                    <tr class="text-center">
                      <td>{{$key+1}}</td>
                      <td>{{$value["question_name"]}}</td>
                      <td>{{$value["total_response"]}}</td>
                      <td>{{number_format($value["avg_response"],2)}}</td>
                    </tr>
                  <?php endforeach;  ?>
                  <hr>
                  <tr class="text-left">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><h4>Score : <span  style="color:green;">{{number_format(($totalAvgScore/$totalQuestion),2)}}</span></h4></td>
                  </tr>
                  <tr class="text-left">
                    <td></td>
                    <td></td>
                    <td><h4></h4></td>
                    <td><h3>Total Submissions : <span style="color:blue;">{{$value["total_submit"]}}</span> </h3></td>
                  </tr>

                </table>
                <div class=" text-center card-footer  mt-5">
                  <h4 class="">Open Answers</h4>
                  <h5>1. What should teacher imporove?</h4>
                    <p>Teacher must be friendly to students.</p>
                </div>
                @endif

                @if($default->semester_id != $offeredCourse->semester_id || $default->semester_year != $offeredCourse->year)
                  <h1>No data To Show In Current Year</h1>
                @endif
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
