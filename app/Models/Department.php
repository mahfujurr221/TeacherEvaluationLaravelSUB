<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  protected $fillable = [
      'dept_code',
      'dept_name',
  ];
  public function deptInfo(){
    return $this->belongsTo('App\Models\User','dept_id','dept_id');
  }
    use HasFactory;
}
