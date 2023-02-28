<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\DefaultValue;
use Carbon\Carbon;
use Session;
use Image;
use Auth;

class SemesterController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $all=Semester::all();
    $default=DefaultValue::get();
    return view('admin.semester.semester',compact('all','default'));
  }

  public function add(){
    return view('admin.semester.add');
  }

  public function insert(Request $request){
    $this->validate($request,[
      'semester_name'=>'required|max:100',
    ],[
      'semester_name.required'=>'Please Enter Semester Name',
    ]);
    $user=Auth::user()->id;
    $slug='D'.uniqid('20');
    $insert=Semester::insert([
      'semester_name'=>$request['semester_name'],
      'semester_creator'=>$user,
    ]);

    if($insert){
        Session::flash('success','value');
        return redirect('dashboard/semester/add');
      }
      else{
        Session::flash('error','value');
        return redirect('dashboard/semester');
      }

    }

    public function edit($id){
      $data=Semester::where('semester_id',$id)->firstOrFail();
      return view('admin.semester.edit',compact('data'));
    }

    public function update(Request $request){
      $this->validate($request,[
        'semester_name'=>'required|max:100',
      ],[
        'semester_name.required'=>'Please Enter Semester Name',
      ]);
      $user=Auth::user()->id;
      $id=$request['semester_id'];
      $update=Semester::where('semester_id',$id)->update([
        'semester_name'=>$request['semester_name'],
        'semester_editor'=>$user,
      ]);

      if($update){
          Session::flash('success','value');
          return redirect('dashboard/semester');
        }
        else{
          Session::flash('error','value');
          return redirect('dashboard/semester/edit/'.$id);
        }
      }

    public function delete(){
      $id=$_POST['semester_modal_id'];
      $delete=Semester::where('semester_id',$id)->delete();
      return redirect('dashboard/semester');
    }

}
