<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McqResponse extends Model
{
  public function courseInfo(){
    return $this->belongsTo('App\Models\Course','course_id','course_id');
  }
  // protected $fillable = [
  //     'question_version_id',
  //     'question_description',
  //     'option1_desc',
  //     'option2_desc',
  //     'option3_desc',
  //     'option4_desc',
  //     'option5_desc',
  // ];
    use HasFactory;

    protected $guarder = [];
}
