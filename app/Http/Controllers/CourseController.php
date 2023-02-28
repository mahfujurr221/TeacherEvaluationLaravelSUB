<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Department;
use App\Models\DefaultValue;
use App\Models\Semester;
use App\Imports\CourseImport;
use Carbon\Carbon;
use Session;
use Auth;
use Excel;

class CourseController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $all=Course::where('course_status',1)->get();
    $semester=Semester::get();
    $default=DefaultValue::where('default_status',1)->get();
    $department=Department::where('dept_status',1)->get();
    return view('admin.course.course',compact('all','default','department','semester'));
  }

  public function add(){
    $department=Department::where('dept_status',1)->get();
    return view('admin.course.add',compact('department'));
  }

  public function edit($slug){
    $data=Course::where('course_slug',$slug)->firstOrFail();
    $department=Department::where('dept_status',1)->get();
    return view('admin.course.edit',compact('data','department'));
  }

  public function view($slug){
    $data=Course::where('course_slug',$slug)->firstOrFail();
    return view('admin.course.view',compact('data'));
  }

  public function insert(Request $request){
    $this->validate($request,[
            'course_code'=>'required',
            'course_title'=>'required',
            'dept_id'=>'required',
          ],[
            'course_code.required'=>'Please enter course code',
            'course_title.required'=>'Please enter course title',
            'dept_id.required'=>'Please enter dept. code',
          ]);
          $slug='course'.uniqid('20');
          $insert=Course::where('course_status',1)->insert([
            'course_code'=>$request['course_code'],
            'course_title'=>$request['course_title'],
            'dept_id'=>$request['dept_id'],
            'course_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);

          if($insert){
            Session::flash('success','value');
            return redirect('dashboard/course/add');
          }else{
            Session::flash('error','value');
            return redirect('dashboard/course/add');
          }
  }

  public function update(Request $request){
    $this->validate($request,[
            'course_code'=>'required',
            'course_title'=>'required',
            'dept_id'=>'required',
          ],[
            'course_code.required'=>'Please enter course code',
            'course_title.required'=>'Please enter course title',
            'dept_id.required'=>'Please enter dept. code',
          ]);
          $id=$request['id'];
          $slug=$request['slug'];
          $update=Course::where('course_slug',$slug)->update([
            'course_code'=>$request['course_code'],
            'course_title'=>$request['course_title'],
            'dept_id'=>$request['dept_id'],
            'course_slug'=>$slug,
            'updated_at'=>Carbon::now()->toDateTimeString(),
          ]);

          if($update){
            Session::flash('success','value');
            return redirect('dashboard/course/view/'.$slug);
          }else{
            Session::flash('error','value');
            return redirect('dashboard/course/edit/'.$slug);
          }
  }

  public function delete(){
    $id=$_POST['course_delete_id'];
    $delete=Course::where('course_id',$id)->delete();
    return redirect('dashboard/course');
  }

  public function excel(Request $request){
         $excel=Excel::import(new CourseImport, $request->file('file'));

         if($excel){
             Session::flash('success','value');
             return redirect('dashboard/course');
           }
           else{
             Session::flash('error','value');
             return redirect('dashboard/cpurse');
           }
   }

   public function filter($id){
     $allCourse = Course::where('course_status',1)->where('dept_id',$id)->get();
     return Response::json(['course' => $allCourse]);
   }

}
