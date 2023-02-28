<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admins;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Image;
use Auth;

class AdminController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $tcr=Teacher::where('tcr_status',1)->firstOrFail();
    $student=Student::where('stu_status',1)->firstOrFail();
    $course=Course::where('course_status',1)->firstOrFail();
    $department=Department::where('dept_status',1)->firstOrFail();
    return view('admin.dashboard.index',compact('tcr','course','student','department'));
  }

  public function profile(){
    return view('admin.supperadmin.supAdminProfile');
  }

}
