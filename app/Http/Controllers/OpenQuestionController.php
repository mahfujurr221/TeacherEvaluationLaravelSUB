<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpenQuestion;
use App\Models\DefaultValue;
use Carbon\Carbon;
use Session;
use Auth;

class OpenQuestionController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $all=OpenQuestion::where('question_status',1)->get();
    $default=DefaultValue::where('default_status',1)->get();
    return view('admin.openQuestion.OpenQuestion',compact('all','default'));
  }

  public function add(){
    return view('admin.openQuestion.add');
  }

  public function edit($slug){
    $data=OpenQuestion::where('question_slug',$slug)->firstOrFail();
    return view('admin.openQuestion.edit',compact('data'));
  }

  public function view($slug){
    $data=OpenQuestion::where('question_slug',$slug)->firstOrFail();
    return view('admin.openQuestion.view',compact('data'));
  }

public function insert(Request $request){
  $this->validate($request,[
          'version_id'=>'required',
          'question_description'=>'required',
        ],[
          'version_id.required'=>'Please enter question version',
          'question_description.required'=>'Please enter question description',
        ]);
        $slug='mcq'.uniqid('20');
        $insert=OpenQuestion::where('question_status',1)->insert([
          'question_version_id'=>$request['version_id'],
          'question_description'=>$request['question_description'],
          'question_slug'=>$slug,
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
          Session::flash('success','value');
          return redirect('dashboard/open/question/add');
        }else{
          Session::flash('error','value');
          return redirect('dashboard/open/question/add');
        }
  }

  public function update(Request $request){
  $this->validate($request,[
    'version_id'=>'required',
    'question_description'=>'required',
  ],[
    'version_id.required'=>'Please enter question version',
    'question_description.required'=>'Please enter question description',
  ]);
        $id=$request['id'];
        $slug=$request['slug'];
        $update=OpenQuestion::where('question_id',$id)->update([
          'question_version_id'=>$request['version_id'],
          'question_description'=>$request['question_description'],
          'question_slug'=>$slug,
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($update){
          Session::flash('success','value');
          return redirect('dashboard/open/question/view/'.$slug);
        }else{
          Session::flash('error','value');
          return redirect('dashboard/open/question/edit/'.$slug);
        }
}

  public function delete(){
    $id=$_POST['open_delete_id'];
    $delete=OpenQuestion::where('question_id',$id)->delete();
    return redirect('dashboard/open/question');
  }
}
