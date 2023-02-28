<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $fillable = [
      'course_code',
      'course_title',
      'dept_id',
      'course_slug',
      'course_creator',
  ];
  public function deptInfo(){
    return $this->belongsTo('App\Models\Department','dept_id','dept_id');
  }
  public function courseInfo(){
    return $this->belongsTo('App\Models\OfferedCourse','course_id','course_id');
  }
  public function EnrollcourseInfo(){
    return $this->belongsTo('App\Models\EnrollStudent','course_id','course_id');
  }
    use HasFactory;
}
