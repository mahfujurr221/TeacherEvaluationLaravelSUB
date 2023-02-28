<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferedCourse extends Model
{
  public function defaultSemesterInfo(){
    return $this->belongsTo('App\Models\Semester','semester_id','semester_id');
  }
  public function stuInfo(){
    return $this->belongsTo('App\Models\Student','stu_id','stu_id');
  }
  public function deptInfo(){
    return $this->belongsTo('App\Models\Department','dept_id','dept_id');
  }
  public function semInfo(){
    return $this->belongsTo('App\Models\Semester','semester_id','semester_id');
  }
  public function tcrInfo(){
    return $this->belongsTo('App\Models\Teacher','tcr_id','tcr_id');
  }
  public function courseInfo(){
    return $this->belongsTo('App\Models\Course','course_id','course_id');
  }
  public function mcqInfo(){
    return $this->belongsTo('App\Models\McqQuestion','offered_course_id','offered_course_id');
  }
  public function openInfo(){
    return $this->belongsTo('App\Models\OpenQuestion','offered_course_id','offered_course_id');
  }
  public function offerCourseInfo(){
    return $this->belongsTo('App\Models\EnrollStudent','offered_course_id','offered_course_id');
  }
    use HasFactory;
}
