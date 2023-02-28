<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McqQuestion extends Model
{
  protected $fillable = [
      'question_version_id',
      'question_description',
      'option1_desc',
      'option2_desc',
      'option3_desc',
      'option4_desc',
      'option5_desc',
      'question_creator',
  ];
    use HasFactory;
}
