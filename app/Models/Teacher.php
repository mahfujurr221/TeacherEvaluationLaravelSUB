<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
  protected $fillable = [
      'tcr_id',
      'name',
      'dept_id',
      'email',
      'tcr_slug',
      'tcr_creator',
  ];
  public function deptInfo(){
    return $this->belongsTo('App\Models\Department','dept_id','dept_id');
  }

  public function tcrInfo(){
    return $this->belongsTo('App\Models\OfferedCourse','tcr_id','tcr_id');
  }
    use HasFactory;
}
