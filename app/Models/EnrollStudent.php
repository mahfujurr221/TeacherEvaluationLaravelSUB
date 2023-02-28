<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollStudent extends Model
{
  public function deptInfo(){
    return $this->belongsTo('App\Models\Department','dept_id','dept_id');
  }
  public function tcrInfo(){
    return $this->belongsTo('App\Models\Teacher','tcr_id','tcr_id');
  }
  public function stuInfo(){
    return $this->belongsTo('App\Models\Student','stu_id','stu_id');
  }
  public function courseInfo(){
    return $this->belongsTo('App\Models\Course','course_id','course_id');
  }
  public function offerCourseInfo(){
    return $this->belongsTo('App\Models\OfferedCourse','offered_course_id','offered_course_id');
  }
    use HasFactory;
}
