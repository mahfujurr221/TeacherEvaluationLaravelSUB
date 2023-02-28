<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OfferedCourse;
use App\Models\Course;
use App\Models\Department;
use App\Models\DefaultValue;
use App\Models\Semester;
use App\Models\Teacher;
use App\Models\McqResponse;
use App\Models\McqQuestion;
use App\Models\EnrollStudent;
use App\Models\OpenResponse;
use Carbon\Carbon;
use Session;
use Image;
use Auth;

class ReportController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $offeredCourse=OfferedCourse::where('offered_course_status',1)
    ->join(table: 'courses', first:'offered_courses.course_id', operator: '=', second:'courses.course_id')
    ->join(table: 'teachers', first:'offered_courses.tcr_id', operator: '=', second:'teachers.tcr_id')->get();
    $default=DefaultValue::where('default_status',1)->first();
    $department=Department::where('dept_status',1)->get();
    $semester=Semester::where('semester_status',1)->get();
    return view('admin.report.courseReport',compact('offeredCourse','default','department','semester'));
  }

public function courseReport($id){
  $offeredCourse=OfferedCourse::where('offered_course_id',$id)->firstOrFail();
  $reportData = [];
  $question = McqQuestion::where('question_version_id',1)->get();
  $mcqResponse=OfferedCourse::where('offered_courses.offered_course_id',$id)
  ->join(table: 'mcq_responses', first:'mcq_responses.offered_course_id', operator: '=', second:'offered_courses.offered_course_id')->get();
  $default=DefaultValue::where('default_status',1)->first();
  $department=Department::where('dept_status',1)->get();
  $semester=Semester::where('semester_status',1)->get();
  $totalQues = 0;
  $totalAvgScore = 0;
  foreach ($question as $key => $value) {
     $reportData[$key]["question_name"] = $value->question_description;
     $responseByQuestion = 0;
     $responseValue = 0;
     $totalQues++;
     foreach ($mcqResponse as $k => $response) {
       // $reportData[$value->question_id]echo "string";
       if($value->question_id == $response->question_id){
         $responseValue = $reportData[$key]["response_value"] = $responseValue + (double)($response->mcq_response);
         $responseByQuestion++;
       }
     }
     $reportData[$key]["total_response"] = $responseByQuestion;
     $reportData[$key]["avg_response"]=$responseValue/$responseByQuestion;
     $totalAvgScore += $reportData[$key]["avg_response"];
     $reportData[$key]["total_submit"]=$responseByQuestion;
     // $reportData[$key]["total_positive_response"]=$reportData[$key]["total_positive_response"]+$reportData[$key]["positive_response"];
  }
  $total_avg_score =$totalAvgScore/$totalQues;
  // $reportData[$key]["positive_response"] =($reportData[$key]["avg_response"]*100)/(($reportData[$key]["avg_response"])*5);
  // exit();
  // dd($reportData);
  return view('admin.report.reportView',compact('offeredCourse','default','department','semester','reportData','total_avg_score'));
  }



  public function teacher(){
    $offeredCourse=OfferedCourse::where('offered_course_status',1)
    ->join(table: 'courses', first:'offered_courses.course_id', operator: '=', second:'courses.course_id')
    ->join(table: 'teachers', first:'offered_courses.tcr_id', operator: '=', second:'teachers.tcr_id')->get();
    $default=DefaultValue::where('default_status',1)->first();
    $department=Department::where('dept_status',1)->get();
    $semester=Semester::where('semester_status',1)->get();
    return view('admin.report.teacherReport',compact('offeredCourse','default','department','semester'));
  }

  public function teacherReport($id){
    $offeredCourse=OfferedCourse::where('tcr_id',$id)->get();
    $offeredCourseT=OfferedCourse::where('tcr_id',$id)->firstOrFail();
    $default=DefaultValue::first();
    $department=Department::where('dept_status',1)->get();
    $semester=Semester::where('semester_status',1)->get();

     if($offeredCourse){
       foreach ($offeredCourse as $course_key => $course) {
           $mcqResponseForThisCourse = McqResponse::where('offered_course_id',$course->offered_course_id)->get();
           $questionForThisCourse = McqQuestion::where('question_version_id',1)->get();
           $totalQues = 0;
           $totalAvgScore = 0;
           foreach ($questionForThisCourse as $key => $value) {
              $responseByQuestion = 0;
              $responseValue = 0;
              $totalQues++;
              foreach ($mcqResponseForThisCourse as $k => $response) {
                if($value->question_id == $response->question_id){
                  $responseValue = $responseValue + (double)($response->mcq_response);
                  $responseByQuestion++;
                }
              }

              if($responseByQuestion > 0){
                $avgResponseForThisQuestion=(double)$responseValue/$responseByQuestion;
              } else{
                $avgResponseForThisQuestion=0;
              }
              $totalAvgScore += (double)$avgResponseForThisQuestion;
           }
           if($totalQues > 0){
             $total_avg_score = (double)$totalAvgScore/$totalQues;
           } else{
             $total_avg_score = 0;
           }
           $course->total_avg_score = (double)$total_avg_score;
           $course->response_by_question=(double)$responseByQuestion;
       }
     }
    return view('admin.report.tcrReportView',compact('offeredCourse','default','department','semester','offeredCourseT'));
    }

}
