<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenQuestion extends Model
{
  public function courseInfo(){
    return $this->belongsTo('App\Models\Course','course_id','course_id');
  }
    use HasFactory;
}
