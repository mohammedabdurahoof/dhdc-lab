<?php

namespace App\Http\Controllers;

use App\Exports\labExport;
use App\Exports\printExport;
use App\Exports\studentsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;

class excelController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
       return view('file-import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new StudentsImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new studentsExport, 'users-collection.xlsx');
    }
    
    public function exportLabData()
    {
        return Excel::download(new labExport, 'lab-usage.xlsx');
    }

    public function exportPrint()
    {
        return Excel::download(new printExport, 'print-cash.xlsx');
    }

    
}