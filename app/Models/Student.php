<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $fillable = [
      'stu_id',
      'name',
      'dept_id',
      'email',
      'stu_slug',
      'stu_creator',
      'stu_editor',
  ];
  public function deptInfo(){
    return $this->belongsTo('App\Models\Department','dept_id','dept_id');
  }
  public function stuInfo(){
    return $this->belongsTo('App\Models\Student','stu_id','stu_id');
  }
    use HasFactory;
}
