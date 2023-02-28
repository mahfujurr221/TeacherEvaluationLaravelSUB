<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Department;
use App\Models\DefaultValue;
use App\Models\Semester;
use App\Imports\TeacherImport;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use Excel;

class TeacherController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $all=Teacher::where('tcr_status',1)->get();
    $semester=Semester::get();
    $default=DefaultValue::where('default_status',1)->get();
    $department=Department::where('dept_status',1)->get();
    return view('admin.teacher.teacher',compact('all','default','department','semester'));
  }

  public function add(){
    $department=Department::where('dept_status',1)->get();
    return view('admin.teacher.add',compact('department'));
  }
  public function edit($slug){
    $data=Teacher::where('tcr_slug',$slug)->firstOrFail();
    $department=Department::where('dept_status',1)->get();
    return view('admin.teacher.edit',compact('data','department'));
  }
  public function view($slug){
    $data=Teacher::where('tcr_slug',$slug)->firstOrFail();
    return view('admin.teacher.view',compact('data'));
  }

  public function insert(Request $request){
      $this->validate($request,[
              'dept_id'=>'required',
              'name'=>'required',
              'email'=>'required',
            ],[
              'dept_id.required'=>'Please enter dept. code',
              'name.required'=>'Please enter name',
              'email.required'=>'Please enter email',
            ]);
            $creator=Auth::user()->id;
            $slug='tcr'.uniqid('20');
            $insert=Teacher::insert([
              'dept_id'=>$request['dept_id'],
              'name'=>$request['name'],
              'email'=>$request['email'],
              'tcr_slug'=>$slug,
              'tcr_creator'=>$creator,
              'created_at'=>Carbon::now()->toDateTimeString(),
            ]);

            if($request->hasFile('tcr_pic')){
              $image=$request->file('tcr_pic');
              $imageName='tcr-'.$slug.'-'.time().'.'.$image->getClientOriginalExtension();
              Image::make($image)->resize(300,300)->save('uploads/teachers/'.$imageName);

              Teacher::where('tcr_slug',$slug)->update([
                'picture'=>$imageName,
              ]);
            }

            if($insert){
              Session::flash('success','value');
              return redirect('dashboard/teacher/add');
            }else{
              Session::flash('error','value');
              return redirect('dashboard/teacher/add');
            }
    }

    public function update(Request $request){
      $this->validate($request,[
              'dept_id'=>'required',
              'name'=>'required',
              'email'=>'required',
            ],[
              'tcr_id.required'=>'Please enter teacher id.',
              'dept_id.required'=>'Please enter dept. code',
              'name.required'=>'Please enter name',
              'email.required'=>'Please enter email',
            ]);
            $editor=Auth::user()->id;
            $slug=$request['slug'];
            $id=$request['id'];
            $update=Teacher::where('tcr_id',$id)->update([
              'dept_id'=>$request['dept_id'],
              'name'=>$request['name'],
              'email'=>$request['email'],
              'tcr_slug'=>$slug,
              'tcr_editor'=>$editor,
              'created_at'=>Carbon::now()->toDateTimeString(),
            ]);

            if($request->hasFile('tcr_pic')){
              $image=$request->file('tcr_pic');
              $imageName='tcr-'.$slug.'-'.time().'.'.$image->getClientOriginalExtension();
              Image::make($image)->resize(300,300)->save('uploads/teachers/'.$imageName);

              Teacher::where('tcr_slug',$slug)->update([
                'picture'=>$imageName,
              ]);
            }

            if($update){
              Session::flash('success','value');
              return redirect('dashboard/teacher/view/'.$slug);
            }else{
              Session::flash('error','value');
              return redirect('dashboard/teacher/view/'.$slug);
            }
    }

    public function delete(){
      $id=$_POST['teacher_delete_id'];
      $delete=Teacher::where('tcr_id',$id)->delete();
      return redirect('dashboard/teacher');
    }

    public function deactive(){
      $id=$_POST['teacher_deactive_id'];
      echo $id;
      $deactive=Teacher::where('tcr_status',1)->where('tcr_id',$id)->update([
          'tcr_status'=>0,
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
      if($deactive){
        return redirect('dashboard/teacher');
      }
    }
    public function excel(Request $request){
           $excel=Excel::import(new TeacherImport, $request->file('file'));

           if($excel){
               Session::flash('success','value');
               return redirect('dashboard/teacher');
             }
             else{
               Session::flash('error','value');
               return redirect('dashboard/teacher');
             }
     }

}//end of teacher
