<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Department;
use App\Models\DefaultValue;
use App\Models\Semester;
use App\Models\User;
use App\Imports\StudentImport;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use Excel;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(Request $request){
    $query=Student::query();
    $semester=Semester::get();
    $default=DefaultValue::where('default_status',1)->get();
    $department=Department::all();
    if($request->ajax()){
      $all=$query->where(['dept_id'=>$request->dept_id])->get();
      return response()->json(['student'=>$all]);
    }
    $all=$query->get();
    return view('admin.student.student',compact('all','default','department','semester'));
  }

  public function add(){
    $department=Department::where('dept_status',1)->get();
    return view('admin.student.add',compact('department'));
  }

  public function edit($slug){
    $data=Student::where('stu_slug',$slug)->firstOrFail();
    $department=Department::where('dept_status',1)->get();
    return view('admin.student.edit',compact('data','department'));
  }

  public function view($slug){
    $data=Student::where('stu_slug',$slug)->firstOrFail();
    return view('admin.student.view',compact('data'));
  }

  public function insert(Request $request){
    $this->validate($request,[
            'stu_id'=>'required',
            'dept_id'=>'required',
            'name'=>'required',
            'email'=>'required',
          ],[
            'stu_id.required'=>'Please enter student id.',
            'dept_id.required'=>'Please enter dept. code',
            'name.required'=>'Please enter  name',
            'email.required'=>'Please enter email',
          ]);
          $slug='stu'.uniqid('20');
          $insert=Student::insert([
            'stu_id'=>$request['stu_id'],
            'dept_id'=>$request['dept_id'],
            'name'=>$request['name'],
            'email'=>$request['email'],
            'stu_creator'=>Auth::user()->id,
            'stu_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);

          if($request->hasFile('stu_pic')){
            $image=$request->file('stu_pic');
            $imageName='stu-'.$slug.'-'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/students/'.$imageName);

            Student::where('stu_slug',$slug)->update([
              'picture'=>$imageName,
            ]);
          }

          $insertStudentUser=User::insert([
            'stu_id'=>$request['stu_id'],
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password' => Hash::make(123),
            'dept_id'=>$request['dept_id'],
            'role_id'=>4,
            'admin_slug'=>$slug,
            'admin_status'=>0,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);

          if($request->hasFile('stu_pic')){
            $image=$request->file('stu_pic');
            $imageName='user-'.$slug.'-'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/admins/'.$imageName);

            User::where('admin_slug',$slug)->update([
            'admin_pic'=>$imageName,
              ]);
          }
          if($insert){
            Session::flash('success','value');
            return redirect('dashboard/student/add');
          }else{
            Session::flash('error','value');
            return redirect('dashboard/student/add');
          }
  }

  public function update(Request $request){
    $this->validate($request,[
            'stu_id'=>'required',
            'dept_id'=>'required',
            'name'=>'required',
            'email'=>'required',
          ],[
            'stu_id.required'=>'Please enter student id.',
            'dept_id.required'=>'Please enter dept. code',
            'name.required'=>'Please enter name',
            'email.required'=>'Please enter email',
          ]);
          $id=$request['id'];
          $slug=$request['slug'];
          $update=Student::where('stu_id',$id)->update([
            'stu_id'=>$request['stu_id'],
            'dept_id'=>$request['dept_id'],
            'name'=>$request['name'],
            'email'=>$request['email'],
            'stu_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);

          if($request->hasFile('stu_pic')){
            $image=$request->file('stu_pic');
            $imageName='tcr-'.$slug.'-'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/students/'.$imageName);

            Student::where('stu_slug',$slug)->update([
              'picture'=>$imageName,
            ]);
          }

          $updateStudentUser=User::where('stu_id',$id)->update([
            'stu_id'=>$request['stu_id'],
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password' => Hash::make(123),
            'dept_id'=>$request['dept_id'],
            'role_id'=>4,
            'admin_slug'=>$slug,
            'admin_status'=>0,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);

          if($request->hasFile('stu_pic')){
            $image=$request->file('stu_pic');
            $imageName='user-'.$slug.'-'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/admins/'.$imageName);

            User::where('admin_slug',$slug)->update([
            'admin_pic'=>$imageName,
              ]);
          }
          if($update){
            Session::flash('success','value');
            return redirect('dashboard/student/view/'.$slug);
          }else{
            Session::flash('error','value');
            return redirect('dashboard/student/edit/'.$slug);
          }
  }

  public function delete(){
    $id=$_POST['student_delete_id'];
    $delete=Student::where('stu_id',$id)->delete();
    $delete=User::where('stu_id',$id)->delete();
    return redirect('dashboard/student');
  }

  public function deactive(){
    $id=$_POST['student_deactive_id'];
    echo $id;
    $deactive=Student::where('stu_status',1)->where('stu_id',$id)->update([
        'stu_status'=>0,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);
    if($deactive){
      return redirect('dashboard/student');
    }
  }

  public function excel(Request $request){
         $excel=Excel::import(new StudentImport, $request->file('file'));

         if($excel){
             Session::flash('success','value');
             return redirect('dashboard/student');
           }
           else{
             Session::flash('error','value');
             return redirect('dashboard/student');
           }
   }
}
