<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Carbon\Carbon;
use App\Imports\DepartmentImport;
use Session;
use Excel;
use Image;
use Auth;


class DepartmentController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('superadmin');
  }

  public function index(){
    $all=Department::where('dept_status',1)->get();
    return view('admin.department.department',compact('all'));
  }


  public function view($id){
    $data=Department::where('dept_id',$id)->firstOrFail();
    return view('admin.department.view',compact('data'));
  }


  public function add(){
    return view('admin.department.add');
  }
  public function insert(Request $request){
    $this->validate($request,[
      'dept_code'=>'required|max:100',
      'dept_name'=>'required',
    ],[
      'dept_code.required'=>'Please Enter Department Code',
      'dept_name.required'=>'Please Enter Department name',
    ]);
    $creator=Auth::user()->id;
    $slug='D'.uniqid('20');
    $insert=Department::insert([
      'dept_code'=>$request['dept_code'],
      'dept_name'=>$request['dept_name'],
      'dept_creator'=>$creator,
    ]);

    if($insert){
        Session::flash('success','value');
        return redirect('dashboard/department/add');
      }
      else{
        Session::flash('error','value');
        return redirect('dashboard/department/add');
      }
  }

  public function edit($id){
    $data=Department::where('dept_id',$id)->firstOrFail();
    return view('admin.department.edit',compact('data'));
  }

  public function update(Request $request){
    $this->validate($request,[
      'dept_code'=>'required|max:100',
      'dept_name'=>'required',
    ],[
      'dept_code.required'=>'Please Enter Department Code',
      'dept_name.required'=>'Please Enter Department name',
    ]);
    $editor=Auth::user()->id;
    $id=$request['dept_id'];
    $update=Department::where('dept_id',$id)->update([
      'dept_code'=>$request['dept_code'],
      'dept_name'=>$request['dept_name'],
      'dept_editor'=>$editor,
    ]);

    if($update){
        Session::flash('success','value');
        return redirect('dashboard/department/view/'.$id);
      }
      else{
        Session::flash('error','value');
        return redirect('dashboard/department/view');
      }
  }
  public function delete(){
    $id=$_POST['modal_id'];
    $delete=Department::where('dept_id',$id)->delete();
    return redirect('dashboard/department');
  }

  public function excel(Request $request){
         $excel=Excel::import(new DepartmentImport, $request->file('file'));

         if($excel){
             Session::flash('success','value');
             return redirect('dashboard/department');
           }
           else{
             Session::flash('error','value');
             return redirect('dashboard/department');
           }
   }
}//end of main
