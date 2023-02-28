<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
  public function defaultSemesterInfo(){
    return $this->belongsTo('App\Models\Semester','semester_id','semester_id');
  }
    use HasFactory;
}
