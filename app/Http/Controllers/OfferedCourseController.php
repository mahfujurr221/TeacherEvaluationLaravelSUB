<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OfferedCourse;
use App\Models\Course;
use App\Models\Department;
use App\Models\DefaultValue;
use App\Models\Teacher;
use App\Models\Semester;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use Illuminate\Support\Facades\Response;

class OfferedCourseController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $all=OfferedCourse::where('offered_course_status',1)
      ->join(table: 'courses', first:'offered_courses.course_id', operator: '=', second:'courses.course_id')->get();
    $course=Course::where('course_status',1)->get();
    $default=DefaultValue::where('default_status',1)->first();
    $department=Department::where('dept_status',1)->get();
    $semester=Semester::where('semester_status',1)->get();
    $teacher=Teacher::where('tcr_status',1)->firstOrFail();
    return view('admin.offeredCourse.offeredcourse',compact('teacher','default','department','semester','all','course'));
  }

  public function add(){
    $default=DefaultValue::where('default_status',1)->get();
    $department=Department::where('dept_status',1)->get();
    $course=Course::where('course_status',1)->get();
    $teacher=Teacher::where('tcr_status',1)->get();
    return view('admin.offeredCourse.add',compact('default','department','teacher','course'));
  }

  public function edit($slug){
    $data=OfferedCourse::where('offered_course_slug',$slug)->get();
    $course=Course::where('course_status',1)->get();
    $department=Department::where('dept_status',1)->get();
    $teacher=Teacher::where('tcr_status',1)->get();
    $default=DefaultValue::where('default_status',1)->get();
    return view('admin.offeredCourse.edit',compact('data','default','department','teacher','course'));
  }

  public function view($slug){
    $data=OfferedCourse::where('offered_course_slug',$slug)->firstOrFail();
    $course=Course::where('course_status',1)->get();
    $department=Department::where('dept_status',1)->get();
    $teacher=Teacher::where('tcr_status',1)->firstOrFail();
    $default=DefaultValue::where('default_status',1)->firstOrFail();
    return view('admin.offeredCourse.view',compact('data','default','department','teacher','course'));
  }

  public function insert(Request $request){
    $this->validate($request,[
            'course_id'=>'required',
            'dept_id'=>'required',
            'tcr_id'=>'required',
          ],[
            'course_id.required'=>'Please enter course id',
            'dept_id.required'=>'Please enter dept. code',
            'tcr_id.required'=>'Please enter teacher id',
          ]);
          $slug='offercourse'.uniqid('20');
          $insert=OfferedCourse::where('offered_course_status',1)->insert([
            'course_id'=>$request['course_id'],
            'dept_id'=>$request['dept_id'],
            'tcr_id'=>$request['tcr_id'],
            'year'=>$request['year'],
            'semester_id'=>$request['semester'],
            'offered_course_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);
          if($insert){
            Session::flash('success','value');
            return redirect('dashboard/offer/course/add');
          }else{
            Session::flash('error','value');
            return redirect('dashboard/offer/course/add');
          }
  }

  public function update(Request $request){
    $this->validate($request,[
            'course_id'=>'required',
            'dept_id'=>'required',
            'tcr_id'=>'required',
          ],[
            'course_id.required'=>'Please enter course id',
            'dept_id.required'=>'Please enter dept. code',
            'tcr_id.required'=>'Please enter teacher id',
          ]);
          $id=$request['id'];
          $slug=$request['slug'];
          $update=OfferedCourse::where('offered_course_status',1)->update([
            'course_id'=>$request['course_id'],
            'dept_id'=>$request['dept_id'],
            'tcr_id'=>$request['tcr_id'],
            'year'=>$request['year'],
            'semester_id'=>$request['semester'],
            'offered_course_slug'=>$slug,
            'updated_at'=>Carbon::now()->toDateTimeString(),
          ]);

          if($update){
            Session::flash('success','value');
            return redirect('dashboard/offer/course/view/'.$slug);
          }else{
            Session::flash('error','value');
            return redirect('dashboard/offer/course/view/'.$slug);
          }
  }

  public function delete(){
    $id=$_POST['offer_course_delete_id'];
    $delete=OfferedCourse::where('course_id',$id)->delete();
    return redirect('dashboard/offer/course');
  }
  public function deactive(){
    $id=$_POST['offered_course_deactive_id'];
    $deactive=OfferedCourse::where('offered_course_status',1)->where('offered_course_id',$id)->update([
        'offered_course_status'=>0,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);
    if($deactive){
      Session::flash('success','value');
      return redirect('dashboard/offer/course');
    }
  }
  public function enable(){
    $id=$_POST['enable_id'];
    $deactive=OfferedCourse::where('offered_course_status',1)->where('offered_course_id',$id)->update([
        'enable_evaluation'=>0,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);
    if($deactive){
      return redirect('dashboard/offer/course');
    }
  }

  public function deativated(){
    $all=OfferedCourse::where('offered_course_status',0)
      ->join(table: 'courses', first:'offered_courses.course_id', operator: '=', second:'courses.course_id')->get();
    $course=Course::where('course_status',1)->get();
    $default=DefaultValue::where('default_status',1)->first();
    $department=Department::where('dept_status',1)->get();
    $semester=Semester::where('semester_status',1)->get();
    $teacher=Teacher::where('tcr_status',1)->firstOrFail();
    return view('admin.offeredCourse.deactivated',compact('teacher','default','department','semester','all','course'));
  }

  public function active(){
    $id=$_POST['offered_course_active_id'];
    $active=OfferedCourse::where('offered_course_status',0)->where('offered_course_id',$id)->update([
        'offered_course_status'=>1,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);
    if($active){
      Session::flash('success','value');
      return redirect('dashboard/offer/course/deactivated');
    }
  }

  public function teacherDropdown($id){
    $allTeacher = Teacher::where('tcr_status',1)->where('dept_id',$id)->get();
    return Response::json(['teacher' => $allTeacher]);
  }


  public function courseDropdown($id){
    $allCourse = Course::where('course_status',1)->where('dept_id',$id)->get();
    return Response::json(['course' => $allCourse]);
  }

}
