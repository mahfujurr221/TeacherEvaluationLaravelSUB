<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Semesters;

class DefaultValue extends Model
{
  public function defaultSemesterInfo(){
    return $this->belongsTo('App\Models\Semester','semester_id','semester_id');
  }
    use HasFactory;
}
