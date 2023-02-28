<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Department;
use Carbon\Carbon;
use Session;
use Image;
use Auth;

class RoleController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $all=Role::where('role_status',1)->get();
    return view('admin.role.role',compact('all'));
  }

  public function add(){
    return view('admin.role.add');
  }

  public function edit($slug){
    $data=Role::where('role_slug',$slug)->firstOrFail();
    return view('admin.role.edit',compact('data'));
  }

  public function view($slug){
    $data=Role::where('role_slug',$slug)->firstOrFail();
    return view('admin.role.view',compact('data'));
  }
  
  public function insert(Request $request){
    $this->validate($request,[
            'role_name'=>'required',
          ],[
            'role_name.required'=>'Please enter role id.',
          ]);
          $slug='role'.uniqid('20');
          $insert=Role::insert([
            'role_name'=>$request['role_name'],
            'role_slug'=>$slug,
          ]);

          if($insert){
            Session::flash('success','value');
            return redirect('dashboard/role/add');
          }else{
            Session::flash('error','value');
            return redirect('dashboard/role/add');
          }
  }

  public function update(Request $request){
    $this->validate($request,[
      'role_name'=>'required',
    ],[
      'role_name.required'=>'Please enter role name',
    ]);

    $id=$request['id'];
    $slug=$request['slug'];

    $update=Role::where('role_id',$id)->update([
      'role_name'=>$request['role_name'],
      'role_slug'=>$slug,
    ]);

    if($update){
      Session::flash('success','value');
      return redirect('dashboard/role/view/'.$slug);
    }else{
      Session::flash('error','value');
      return redirect('dashboard/role/edit/'.$slug);
    }
  }

  public function delete(){
    $id=$_POST['role_delete_id'];
    $delete=Role::where('role_id',$id)->delete();
    return redirect('dashboard/role');
  }

}
