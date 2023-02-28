<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Models\Department;
use App\Models\DefaultValue;
use App\Models\Course;
use Carbon\Carbon;
use Session;
use Excel;
use Image;
use Auth;

class UserRole extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('supperadmin');
  }

  public function index(){
    $all=UserRole::where('admin_status',1)->get();
    $default=DefaultValue::where('default_status',1)->get();
    return view('admin.admins.admin',compact('all','default'));
  }
}
