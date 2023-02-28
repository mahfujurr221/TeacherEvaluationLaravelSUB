<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\McqQuestion;
use App\Models\DefaultValue;
use App\Imports\McqImport;
use Carbon\Carbon;
use Session;
use Auth;
use Excel;

class McqQuestionController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $all=McqQuestion::where('question_status',1)->get();
      $default=DefaultValue::where('default_status',1)->get();
      return view('admin.mcq.mcq',compact('all','default'));
    }

    public function add(){
      return view('admin.mcq.add');
    }

    public function edit($slug){
      $data=McqQuestion::where('question_slug',$slug)->firstOrFail();
      return view('admin.mcq.edit',compact('data'));
    }

    public function view($slug){
      $data=McqQuestion::where('question_slug',$slug)->firstOrFail();
      return view('admin.mcq.view',compact('data'));
    }

  public function insert(Request $request){
    $this->validate($request,[
            'version_id'=>'required',
            'question_description'=>'required',
            'option1'=>'required',
            'option2'=>'required',
            'option3'=>'required',
            'option4'=>'required',
            'option5'=>'required',
          ],[
            'version_id.required'=>'Please enter question version',
            'question_description.required'=>'Please enter question description',
            'option1.required'=>'Please enter option 1',
            'option2.required'=>'Please enter option 2',
            'option3.required'=>'Please enter option 3',
            'option4.required'=>'Please enter option 4',
            'option5.required'=>'Please enter option 5',
          ]);
          $slug='mcq'.uniqid('20');
          $insert=McqQuestion::where('question_status',1)->insert([
            'question_version_id'=>$request['version_id'],
            'question_description'=>$request['question_description'],
            'option1_desc'=>$request['option1'],
            'option2_desc'=>$request['option2'],
            'option3_desc'=>$request['option3'],
            'option4_desc'=>$request['option4'],
            'option5_desc'=>$request['option5'],
            'question_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);

          if($insert){
            Session::flash('success','value');
            return redirect('dashboard/mcq/question/add');
          }else{
            Session::flash('error','value');
            return redirect('dashboard/mcq/question/add');
          }
    }

    public function update(Request $request){
    $this->validate($request,[
      'version_id'=>'required',
      'question_description'=>'required',
      'option1'=>'required',
      'option2'=>'required',
      'option3'=>'required',
      'option4'=>'required',
      'option5'=>'required',
    ],[
      'version_id.required'=>'Please enter question version',
      'question_description.required'=>'Please enter question description',
      'option1.required'=>'Please enter option 1',
      'option2.required'=>'Please enter option 2',
      'option3.required'=>'Please enter option 3',
      'option4.required'=>'Please enter option 4',
      'option5.required'=>'Please enter option 5',
    ]);
          $id=$request['id'];
          $slug=$request['slug'];
          $update=McqQuestion::where('question_id',$id)->update([
            'question_version_id'=>$request['version_id'],
            'question_description'=>$request['question_description'],
            'option1_desc'=>$request['option1'],
            'option2_desc'=>$request['option2'],
            'option3_desc'=>$request['option3'],
            'option4_desc'=>$request['option4'],
            'option5_desc'=>$request['option5'],
            'question_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
          ]);

          if($update){
            Session::flash('success','value');
            return redirect('dashboard/mcq/question/view/'.$slug);
          }else{
            Session::flash('error','value');
            return redirect('dashboard/mcq/question/edit/'.$slug);
          }
  }

  public function delete(){
    $id=$_POST['mcq_delete_id'];
    $delete=McqQuestion::where('question_id',$id)->delete();
    return redirect('dashboard/mcq/question');
  }

  public function excel(Request $request){
         $excel=Excel::import(new McqImport, $request->file('file'));

         if($excel){
             Session::flash('success','value');
             return redirect('dashboard/mcq/question');
           }
           else{
             Session::flash('error','value');
             return redirect('dashboard/mcq/question');
           }
   }
}
