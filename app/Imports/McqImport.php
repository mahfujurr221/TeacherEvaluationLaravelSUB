<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use App\Models\McqQuestion;
use App\Models\User;
use Auth;

class McqImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
      $slug='mcq'.uniqid('20');
      foreach ($rows as $row){
        McqQuestion::create([
          'question_version_id'=> $row['question_version_id'],
          'question_description'=> $row['question_description'],
          'option1_desc'=> $row['option1desc'],
          'option2_desc'=> $row['option2desc'],
          'option3_desc'=> $row['option3desc'],
          'option4_desc'=> $row['option4desc'],
          'option5_desc'=> $row['option5desc'],
          'question_slug'=>$slug,
          'question_creator'=>Auth::user()->id,
        ]);
      }
    }
}
