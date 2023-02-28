<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DefaultValue;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Excel;
use Image;
use Auth;
use Illuminate\Support\Facades\Response;

class AjaxController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){

  }

  public function teacher($id){
    $allTeacher = Teacher::where('tcr_status',1)->where('dept_id',$id)->get();
    return Response::json([
      'teacher' => $allTeacher;
    ]);
  }
  
//   public function teacher($id){
//     $teacher = Teacher::where('tcr_id', $id)->pluck('first_name', 'tcr_id');
//         return response()->json($teacher);
//     }
// }
