<?php

namespace App\Exports;

use App\Models\labUsage;
use Maatwebsite\Excel\Concerns\FromCollection;

class labExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return labUsage::all();
    }
}
