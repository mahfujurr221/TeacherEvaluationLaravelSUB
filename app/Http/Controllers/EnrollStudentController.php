<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OfferedCourse;
use App\Models\Course;
use App\Models\Department;
use App\Models\EnrollStudent;
use App\Models\Student;
use App\Models\DefaultValue;
use App\Models\Semester;
use App\Models\Teacher;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use Illuminate\Support\Facades\Response;


class EnrollStudentController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
  public function index(){
    $all=EnrollStudent::where('enroll_status',1)
    ->join(table: 'offered_courses', first:'enroll_students.offered_course_id', operator: '=', second:'offered_courses.offered_course_id')->get();
    $course=Course::where('course_status',1)->first();
    $department=Department::where('dept_status',1)->get();
    $offercourse=OfferedCourse::where('offered_course_status',1)->first();
    $student=Student::where('stu_status',1)->firstOrFail();
    $default=DefaultValue::where('default_status',1)->first();
    $semester=Semester::get();
    return view('admin.enrollStudent.enrollStudent',compact('all','department','offercourse','student','default','course','semester'));
  }

  public function add(){
    $department=Department::where('dept_status',1)->get();
    $course=Course::where('course_status',1)->get();
    $offercourse=OfferedCourse::where('offered_course_status',1)->get();
    $teacher=Teacher::where('tcr_status',1)->get();
    $default=DefaultValue::where('default_status',1)->firstOrfail();
    return view('admin.enrollStudent.add',compact('department','offercourse','teacher','course','default'));
  }

  public function edit($slug){
    $data=EnrollStudent::where('enroll_slug',$slug)->firstOrFail();
    $course=Course::where('course_status',1)->get();
    $department=Department::where('dept_status',1)->get();
    $offercourse=OfferedCourse::where('offered_course_status',1)->get();
    $teacher=Teacher::where('tcr_status',1)->get();
    return view('admin.enrollStudent.edit',compact('data','department','offercourse','teacher','course'));
  }

  public function view($slug){
    $data=EnrollStudent::where('enroll_slug',$slug)->firstOrFail();
    $department=Department::where('dept_status',1)->firstOrFail();
    $offercourse=OfferedCourse::where('offered_course_status',1)->firstOrFail();
    $teacher=Teacher::where('tcr_status',1)->firstOrFail();
    return view('admin.enrollStudent.view',compact('data','department','offercourse','teacher'));
  }

  public function insert(Request $request){
    $this->validate($request,[
            'stu_id'=>'required',
            'course_id'=>'required',
            'dept_id'=>'required',
          ],[
            'stu_id.required'=>'Please enter student id',
            'course_id.required'=>'Please enter course id',
            'dept_id.required'=>'Please enter dept. code',
          ]);
          $slug='enroll'.uniqid('20');
          $insert=EnrollStudent::where('enroll_status',1)->insert([
            'stu_id'=>$request['stu_id'],
            'offered_course_id'=>$request['course_id'],
            'dept_id'=>$request['dept_id'],
            'semester_id'=>$request['semester_id'],
            'year'=>$request['year'],
            'enroll_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);

          if($insert){
            Session::flash('success','value');
            return redirect('dashboard/enroll/student/add');
          }else{
            Session::flash('error','value');
            return redirect('dashboard/enroll/student/add');
          }
      }

  public function update(Request $request){
    $this->validate($request,[
            'stu_id'=>'required',
            'course_id'=>'required',
            'dept_id'=>'required',
            'tcr_id'=>'required',
          ],[
            'stu_id.required'=>'Please enter student id',
            'course_id.required'=>'Please enter course id',
            'dept_id.required'=>'Please enter dept. code',
            'tcr_id.required'=>'Please enter teacher id',
          ]);
          $id=$request['enroll_id'];
          $slug=$request['enroll_slug'];
          $update=EnrollStudent::where('enroll_id',$id)->update([
            'stu_id'=>$request['stu_id'],
            'course_id'=>$request['course_id'],
            'dept_id'=>$request['dept_id'],
            'tcr_id'=>$request['tcr_id'],
            'enroll_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);

          if($update){
            Session::flash('success','value');
            return redirect('dashboard/enroll/student/view/'.$slug);
          }else{
            Session::flash('error','value');
            return redirect('dashboard/enroll/student/view/'.$slug);
          }
        }

    public function delete(){
      $id=$_POST['enroll_student_delete_id'];
      $delete=EnrollStudent::where('enroll_id',$id)->delete();
      return redirect('dashboard/enroll/student');
    }

    public function deactive(){
      $id=$_POST['enroll_student_deactive_id'];
      echo $id;
      $deactive=EnrollStudent::where('enroll_status',1)->where('enroll_id',$id)->update([
          'enroll_status'=>0,
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

      if($deactive){
        Session::flash('success','value');
        return redirect('dashboard/enroll/student');
      }
    }

  public function deactivated(){
    $all=EnrollStudent::where('enroll_status',0)
    ->join(table: 'offered_courses', first:'enroll_students.offered_course_id', operator: '=', second:'offered_courses.offered_course_id')->get();
    $course=Course::where('course_status',1)->first();
    $department=Department::where('dept_status',1)->get();
    $offercourse=OfferedCourse::where('offered_course_status',1)->first();
    $student=Student::where('stu_status',1)->firstOrFail();
    $default=DefaultValue::where('default_status',1)->first();
    $semester=Semester::get();
    return view('admin.enrollStudent.deactivated',compact('all','department','offercourse','student','default','course','semester'));
  }

  public function active(){
    $id=$_POST['enroll_student_active_id'];
    echo $id;
    $active=EnrollStudent::where('enroll_status',0)->where('enroll_id',$id)->update([
        'enroll_status'=>1,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);
    if($active){
      Session::flash('success','value');
      return redirect('dashboard/enroll/student/deactivated');
    }
  }
  public function courseDropdown($id){
    $allCourse = OfferedCourse::where('offered_course_status',1)->where('dept_id',$id)->get();
    return Response::json(['offer_course' => $allCourse]);
  }
}
