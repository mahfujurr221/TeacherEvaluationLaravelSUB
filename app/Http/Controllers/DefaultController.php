<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DefaultValue;
use App\Models\Semester;
use Carbon\Carbon;
use Session;
use Auth;
class DefaultController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $default=DefaultValue::where('default_status',1)->get();
    $semester=Semester::where('semester_status',1)->get();
    return view('admin.default.default',compact('default','semester'));
  }

  public function update(Request $request){
    $update=DefaultValue::where('default_status',1)->update([
      'semester_year'=>$request['default_year'],
      'semester_id'=>$request['default_semester'],
      'question_version_id'=>$request['default_version'],
      'created_at'=>Carbon::now()->toDateTimeString(),
    ]);

  if($update){
      Session::flash('success','value');
      return redirect('dashboard/default');
    }
    else{
      Session::flash('error','value');
      return redirect('dashboard/default');
    }
}

}
