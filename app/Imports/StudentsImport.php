<?php

namespace App\Imports;

use App\Models\students;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new students([
            'name'     => $row[0],
            'adno'    => $row[1], 
            'class'    => $row[2], 
            
        ]);
    }
}
