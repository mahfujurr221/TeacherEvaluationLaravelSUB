<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use App\Models\Course;
use App\Models\User;
use Auth;
class CourseImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
      $slug='course'.uniqid('20');
      foreach ($rows as $row){
        Course::create([
          'course_code'=> $row['course_code'],
          'course_title'=> $row['course_title'],
          'dept_id'=> $row['dept_id'],
          'course_slug'=>$slug,
          'course_creator'=>Auth::user()->id,
        ]);
      }
    }
}
