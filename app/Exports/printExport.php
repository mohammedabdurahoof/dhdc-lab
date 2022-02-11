<?php

namespace App\Exports;

use App\Models\labUsage;
use App\Models\printcash;
use Maatwebsite\Excel\Concerns\FromCollection;

class printExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return printcash::all();
    }
}
