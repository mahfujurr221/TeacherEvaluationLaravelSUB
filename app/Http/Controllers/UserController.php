<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DefaultValue;
use App\Models\Department;
use App\Models\Student;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Excel;
use Image;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $all=User::where('admin_status',1)->get();
    $default=DefaultValue::where('default_status',1)->get();
    return view('admin.admins.admin',compact('all','default'));
  }

    public function add(){
      $role=Role::where('role_status',1)->get();
      $department=Department::where('dept_status',1)->get();
      return view('admin.admins.add',compact('role','department'));
    }
    public function edit($slug){
      $role=Role::where('role_status',1)->get();
      $data=User::where('admin_slug',$slug)->firstOrFail();
      $department=Department::where('dept_status',1)->get();
      return view('admin.admins.edit',compact('data','department','role'));
    }
    // public function view($slug){
    //   $data=UserRole::where('admin_slug',$slug)->firstOrFail();
    //   return view('admin.admins.view',compact('data'));
    // }

    public function insert(Request $request){
      $this->validate($request,[
              'name'=>'required',
              'email'=>'required',
              'password'=>'required',
              'confirm_password'=>'required',
              'role'=>'required',

            ],[
              'name.required'=>'Please enter admin name.',
              'email.required'=>'Please enter email',
              'password.required'=>'Please enter password',
              'confirm_password.required'=>'Please confirm password',
              'role.required'=>'Please enter role',
            ]);
            $password=$request['password'];
            $confirm_password=$request['confirm_password'];
            $slug='admin'.uniqid('20');
            if($password==$confirm_password){
            $insert=User::insert([
              'name'=>$request['name'],
              'email'=>$request['email'],
              'password' => Hash::make($request->password),
              'dept_id'=>$request['dept_id'],
              'role_id'=>$request['role'],
              'admin_slug'=>$slug,
              'created_at'=>Carbon::now()->toDateTimeString(),
            ]);

            if($request->hasFile('admin_pic')){
              $image=$request->file('admin_pic');
              $imageName='user-'.$slug.'-'.time().'.'.$image->getClientOriginalExtension();
              Image::make($image)->resize(300,300)->save('uploads/admins/'.$imageName);

              User::where('admin_slug',$slug)->update([
              'admin_pic'=>$imageName,
                ]);
            }
            if($insert){
              Session::flash('success','value');
              return redirect('dashboard/user/add');
            }else{
              Session::flash('error','value');
              return redirect('dashboard/user/add');
            }
          }

          else{
            Session::flash('missmatched','value');
            return redirect('dashboard/user/add');
          }
    }

    public function update(Request $request){
      $this->validate($request,[
              'name'=>'required',
              'email'=>'required',
              'role'=>'required',

            ],[
              'name.required'=>'Please enter admin name.',
              'email.required'=>'Please enter email',
              'role.required'=>'Please enter role',
            ]);
            $id=$request['id'];
            $slug=$request['slug'];
            $update=User::where('id',$id)->update([
              'name'=>$request['name'],
              'email'=>$request['email'],
              'role_id'=>$request['role'],
              'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
            if($request->hasFile('admin_pic')){
              $image=$request->file('admin_pic');
              $imageName='user-'.$slug.'-'.time().'.'.$image->getClientOriginalExtension();
              Image::make($image)->resize(300,300)->save('uploads/admins/'.$imageName);

              User::where('admin_slug',$slug)->update([
              'admin_pic'=>$imageName,
                ]);
            if($update){
              Session::flash('success','value');
              return redirect('dashboard/user/edit/'.$slug);
            }else{
              Session::flash('error','value');
              return redirect('dashboard/user/add');
            }
          }
    }

    public function changePassword()
    {
       return view('admin.supperadmin.changePassword');
    }
    public function updatePassword(Request $request)
{
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
}
    public function delete(){
      $id=$_POST['admin_delete_id'];
      $delete=User::where('id',$id)->delete();
      $delete=Student::where('stu_id',$id)->delete();
      return redirect('dashboard/user');
    }

}
