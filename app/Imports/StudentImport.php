<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\User;
use Auth;

class StudentImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
      $slug='stu'.uniqid('20');
      foreach ($rows as $row){
        Student::create([
          'stu_id'=> $row['stu_id'],
          'name'=> $row['name'],
          'email'=> $row['email'],
          'stu_slug'=>$slug,
          'stu_creator'=>Auth::user()->id,
          'dept_id'=> $row['dept_id'],
        ]);
      }
      foreach ($rows as $data){
        User::create([
          'stu_id'=> $data['stu_id'],
          'name'=> $data['name'],
          'email'=> $data['email'],
          'dept_id'=> $data['dept_id'],
          'admin_slug'=>$slug,
          'admin_status'=>0,
          'role_id'=> 4,
          'password'=> Hash::make(123),
        ]);
      }
    }
}
