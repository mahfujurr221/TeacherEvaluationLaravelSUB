@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
      <h2 class="text-center m-3">{{$default->defaultSemesterInfo->semester_name}}-{{$default->semester_year}}</h2>
      <h2 class="text-center mb-2">----------------</h2>
      <h3 class="text-center mb-0">Course Teacher <span style="color:green">({{$offeredCourseT->tcrInfo->name}})</span> </h3>
  </div>
</div>
<div class="row mt-1">
  <div class="col-xl-12">
      <div class="card">
        <h4 class="card-header text-center">MCQ</h4>
          <div class="card-body">
            <div class="row">
              <div class="col-md-2">

              </div>
              <div class="col-md-8">
                <table class="table table-bordered table-striped ">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Course Code</th>
                            <th scope="col">Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $totalCourse = $totalAvgScore = $totalPositiveResponse = 0; foreach ($offeredCourse as $key => $value):
                              $totalAvgScore += $value->total_avg_score;
                              // dd($value->total_avg_score);
                              $totalPositiveResponse += (($value->total_avg_score*100) / ($value->response_by_question*5));
                              $totalCourse++;

                          ?>
                          <tr>
                              <td>{{$value->courseInfo->course_code}}</td>
                              <td>{{number_format(($value->total_avg_score),2)}}</td>
                              <!-- <td>{{($value->total_avg_score*100)/($value->response_by_question*5)}}%</td> -->
                          </tr>
                        <?php endforeach; ?>

                        <tr class="text-left">
                          <td></td>
                          <td><h4>Average Score: {{number_format(($totalAvgScore/$totalCourse),2)}}</h4></td>
                          <!-- <td><h4>Total: {{($totalPositiveResponse/$totalCourse)}}%</h4></td> -->
                        </tr>
                    </tbody>
                </table>
                <div class=" text-center card-footer  mt-5">
                  <h4 class="">Open Answers</h4>
                  <h5>1. What should teacher imporove?</h4>
                    <p>Teacher must be friendly to students.</p>
                </div>

              </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
