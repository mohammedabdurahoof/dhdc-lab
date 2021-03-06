<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Models\labUsage;
use App\Models\net;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\printcash;
use Illuminate\Support\Arr;

class labController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function dashboard()
    {
        $studentCount = students::count();
        $registerdCount = labUsage::where('status', 'REGISTERED')->count();
        $admittedCount = labUsage::where('status', 'ADMITTED')->count();
        $dutyList = User::where('type', 'USER')->get();
        $staff = User::where('type', 'ADMIN')->get();
        // dd($dutyList);
        // dd($admittedCount);
        // dd($studentCount)
        return view('dashboard/dashboard', ['studentCount' => $studentCount, 'registerdCount' => $registerdCount, 'admittedCount' => $admittedCount, 'dutyList' => $dutyList, 'staff' => $staff]);
    }
    public function students()
    {
        $user = Auth::user()->type;
        if ($user === 'SUPER ADMIN') {
            $students = students::all();
            // dd($students);
            return view('dashboard/students', ['students' => $students]);
        }
        $students = students::all();
        // dd($user);
        return view('auth/login');
    }
    
    public function addNew(Request $request)
    {
        $user = Auth::user()->type;
        if ($user === 'SUPER ADMIN' || $user === 'ADMIN') {
            $validator = $request->validate([
                'adno' =>  'required|max:3|min:3',
                'time' => 'required',
                'system' => 'required',
                'internet' => 'required',
                'netamount' => 'required',
                'status' => 'required',
                'registeredby' => 'required',
                'admittedby' => 'required',
                'leftedby' => 'required',
                'registertime' => 'required',
                'admittime' => 'required',
                'lefttime' => 'required',

            ]);
            //    dd($validator);
            labUsage::create($validator,);
            return back();
        } else {
            return redirect("/login");
        }
    }
    public function addStudent(Request $request)
    {
        $validator = $request->validate([
            'name' =>  'required',
            'adno' => 'required|max:3|min:3',
            'class' => 'required',
        ]);

        //    dd($validator);
        labUsage::create($validator,);
        return back();
    }

    public function Reg()
    {

        $allList = DB::table('students')
            // ->join('students','students.adno','lab_usages.adno')
            ->join('lab_usages', 'lab_usages.adno', 'students.adno')
            ->where('lab_usages.registertime', date("Y-m-d"))
            ->get();

        return view('dashboard/register', ['allList' => $allList]);
    }
    public function verify()
    {

        $allList = DB::table('students')
            // ->join('students','students.adno','lab_usages.adno')
            ->join('lab_usages', 'lab_usages.adno', 'students.adno')
            ->where('lab_usages.status', 'REGISTERED')
            ->where('lab_usages.registertime', date("Y-m-d"))
            ->get();

        return view('dashboard/verify', ['allList' => $allList]);
    }
    public function makeVerify(Request $request, labUsage $id)
    {
        // dd($id);
        $data = labUsage::where('adno', $request->post('adno'));;
        $validator = $request->validate([
            'status' => 'required|max:124',
            'admittedby' => 'required|max:124',
            'admittime' => 'required|max:124',

        ]);
        //  dd($validator);
        $id->update($validator);
        return back();
    }


    public function makeLeft(Request $request, labUsage $id)
    {
        if ($id->internet === 'Yes') {
            // dd('hi');
            $validator = $request->validate([
                'status' => 'required',
                'lefttime' => 'required',
                'leftedby' => 'required',
    
            ]);

            $diff = \Carbon\Carbon::parse($id->admittime)->diff($request->post('lefttime'))->format('%H:%I');
            
            if ($diff <= '00:00') {
                $netamount = 00;
            }elseif ($diff <= '00:15') {
                $netamount = 05;               
            }elseif ($diff <= '00:30') {
                $netamount = 10;
            }elseif ($diff <= '00:45') {
                $netamount = 15;
            }elseif ($diff <= '01:00') {
                $netamount = 20;
            }elseif ($diff <= '02:00') {
                $netamount = 40;
            }
            $validator = Arr::add($validator, 'netamount' , $netamount);
            $id->update($validator);
        }else {
            $validator = $request->validate([
                'status' => 'required',
                'lefttime' => 'required',
                'leftedby' => 'required',
    
            ]);
            //  dd($validator);
            $id->update($validator);
        }
        return back();
    }

    
    public function verified()
    {
        $allList = DB::table('students')
            // ->join('students','students.adno','lab_usages.adno')
            ->join('lab_usages', 'lab_usages.adno', 'students.adno')
            ->where('lab_usages.status', 'ADMITTED')
            ->where('lab_usages.registertime', date("Y-m-d"))
            ->get();

        return view('dashboard/admitted', ['allList' => $allList]);
    }

    public function left()
    {
        $allList = DB::table('students')
            // ->join('students','students.adno','lab_usages.adno')
            ->join('lab_usages', 'lab_usages.adno', 'students.adno')
            ->where('lab_usages.status', 'LEFT')
            ->where('lab_usages.registertime', date("Y-m-d"))
            ->get();

        return view('dashboard/left', ['allList' => $allList]);
    }
    public function all()
    {
        // $today=date("Y-m-d");
        // dd($today);

        $allList = DB::table('students')
            // ->join('students','students.adno','lab_usages.adno')
            ->join('lab_usages', 'lab_usages.adno', 'students.adno')
            ->where('lab_usages.registertime', date("Y-m-d"))
            ->get();

        return view('dashboard/all', ['allList' => $allList]);
    }

    public function getStudent($adno)
    {
        $student = students::where('adno', $adno )->get();
        // dd($student);
        return $student;
    }

    public function viewStudent(Request $request)
    {
        $adno=$request->input('adno');
        $student = students::where('adno', $adno )->get();
        $print = printcash::where('adno', $adno )->get();
        $labUsage=labUsage::where('adno', $adno )->get();
        // dd($adno);
        return view('dashboard/profile',['student'=> $student, 'printcash'=>$print ,'labUsage'=>$labUsage]);
    }

    public function addprintcash(Request $request){
        // dd($request->post());
        // dd($request->post('adno'));
        $printcash=printcash::where('adno',$request->post('adno'));;
        $adno=$printcash->value('adno');
        // dd($adno);
        $oldamount=printcash::where('adno',$request->post('adno'))->value('amount');
        $newamount=$request->input('amount'); 
        $totalamount=$oldamount+$newamount;
        if($adno===null){
            $validator = $request->validate([
                'adno' =>  'required|max:3|min:3',
                'amount' => 'required',
                'addedby' => 'required',
            ]);
            printcash::create($validator);
        }else{

            $validateData = $request->validate([
                'adno' =>  'required|max:3|min:3',
                'amount' => 'required',
                'addedby' => 'required',
                   
            ]);
            
        // dd($printcash);
        //  dd($totalamount);
        // $printcash->update($validateData);
        // printcash::where('adno', $adno)->update($request->all());
        $printcash->update([
            'amount' => $totalamount
        ]);
        }

        return back();
    }

    public function print(){
 
        // $print = printcash::all();
        $print = DB::table('students')
        // ->join('students','students.adno','lab_usages.adno')
        ->join('printcashes', 'printcashes.adno', 'students.adno')
        ->get();
        // dd($print);
    return view('dashboard/print', ['print' => $print]);
    }

    public function searchuser(Request $request)
    {
        
        $adno=$request->input('search');
        $student = students::where('adno', $adno )->get();
        $print = printcash::where('adno', $adno )->get();
        $labUsage=labUsage::where('adno', $adno )->get();
        $totalnet = 0;
        foreach ($labUsage as $user) {
            $totalnet += $user->netamount;
        }
       
    
       
            return view('dashboard/profile',['student'=> $student, 'printcash'=>$print,'labUsage'=>$labUsage, 'totalnet' => $totalnet ]);
      
            // dd($request->post('search'));
            // return back();
        
    }

   
}
