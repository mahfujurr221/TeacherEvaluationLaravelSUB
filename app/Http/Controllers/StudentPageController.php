<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\OfferedCourse;
use App\Models\EnrollStudent;
use App\Models\Teacher;
use App\Models\DefaultValue;
use App\Models\McqQuestion;
use App\Models\OpenQuestion;
use App\Models\Course;
use App\Models\McqResponse;
use App\Models\OpenResponse;
use Carbon\Carbon;
use Session;
use Image;
use Auth;


class StudentPageController extends Controller
{
    public function __construct(){
      $this->middleware('auth');

    }
    public function index(){
      $enrollStudent=EnrollStudent::where('enroll_status',1)
      ->join(table: 'offered_courses', first:'enroll_students.offered_course_id', operator: '=', second:'offered_courses.offered_course_id')->get();
      $default=DefaultValue::where('default_status',1)->first();
      $defaultS=DefaultValue::where('default_status',1)->first();
      $offerCourse=OfferedCourse::where('enable_evaluation',0)->first();
      $course=Course::where('course_status',1)->first();
      return view('admin.students.index',compact('enrollStudent','offerCourse','default','course','defaultS'));
    }
    public function question($id){
      $offerCourseq=OfferedCourse::where('offered_course_id',$id)->first();
      $default=DefaultValue::where('default_status',1)->firstOrFail();
      $teacher=Teacher::where('tcr_status',1)->firstOrFail();
      $enrollInfo=EnrollStudent::where('offered_course_id',$id)->firstOrFail();
      $mcq=McqQuestion::get();
      $open=OpenQuestion::firstOrFail();
      return view('admin.students.question',compact('offerCourseq','mcq','open','default','enrollInfo'));
    }

    public function submit(Request $request){
    foreach ($request->question_id as $value){
      $insert= McqResponse::insert([
          'stu_id'=>Auth::user()->stu_id,
          'offered_course_id'=>$request['offered_course_id'],
          'version_id'=>$request['version_id'],
          'semester'=>$request['semister'],
          'year'=>$request['year'],
          'version_id'=>$request['version_id'],
          'mcq_response'=>$request['option'.$value],
          'question_id'=>$value,
        ]);
    }

      // $Openinsert= OpenResponse::insert([
      //     'stu_id'=>Auth::user()->stu_id,
      //     'offered_course_id'=>$request['offered_course_id'],
      //     'version_id'=>$request['version_id'],
      //     'semester'=>$request['semester'],
      //     'year'=>$request['year'],
      //     'version_id'=>$request['version_id'],
      //     'open_response'=>$request['name'],
      //     'question_id'=>$request['question_id'],
      //   ]);

        if($insert){
          EnrollStudent::where('stu_id',Auth::user()->stu_id)->where('offered_course_id',$request->offered_course_id)->update([
            'evaluation_status'=>0,
          ]);
         Session::flash('success','value');
         return redirect('student');
            }else{
              Session::flash('error','value');
              return redirect('student');
          }
    }//end of response

    public function evaluated($id){
      $offerCourseq=OfferedCourse::where('offered_course_id',$id)->first();
      return view('admin.students.evaluated',compact('offerCourseq'));
    }


}
