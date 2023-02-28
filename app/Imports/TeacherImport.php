<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher;
use App\Models\User;
use Auth;

class TeacherImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
      $slug='tcr'.uniqid('20');
      foreach ($rows as $row){
        Teacher::create([
          'name'=> $row['name'],
          'email'=> $row['email'],
          'tcr_slug'=>$slug,
          'tcr_creator'=>Auth::user()->id,
          'dept_id'=> $row['dept_id'],
        ]);
      }
    }
}
