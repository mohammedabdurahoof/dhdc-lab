<?php

use App\Http\Controllers\labController;
use App\Http\Controllers\excelController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return redirect('/login');
});


Route::get('/dashboard',[labController::class, 'dashboard'])->name('dashboard');
Route::get('/students',[labController::class, 'students'])->name('students');
Route::get('/reg',[labController::class, 'reg'])->name('reg');
Route::post('/add-new',[labController::class, 'addNew'])->name('addNew');
Route::post('/add-student',[labController::class, 'addStudent'])->name('add-student');
Route::get('/verify',[labController::class, 'verify'])->name('verify');
Route::POST('/makeVerify/{id}',[labController::class, 'makeVerify'])->name('makeVerify');
Route::POST('/makeLeft/{id}',[labController::class, 'makeLeft'])->name('makeLeft');
Route::get('/verified',[labController::class, 'verified'])->name('verified');
Route::get('/left',[labController::class, 'left'])->name('left');
Route::get('/all',[labController::class, 'all'])->name('all');
Route::get('/getStudent/{adno}',[labController::class, 'getStudent'])->name('getStudent');
Route::get('/viewStudent',[labController::class, 'viewStudent'])->name('viewStudent');
Route::get('/print',[labController::class, 'print'])->name('print');
Route::post('/addprintcash',[labController::class, 'addprintcash'])->name('addprintcash');
Route::post('/searchuser',[labController::class, 'searchuser'])->name('searchuser');


Route::post('export', [excelController::class, 'fileExport'])->name('export');
Route::post('exportLabData', [excelController::class, 'exportLabData'])->name('exportLabData');
Route::post('exportPrint', [excelController::class, 'exportPrint'])->name('exportPrint');
Route::get('importExportView', 'excelController@importExportView');
Route::post('import', [excelController::class, 'fileImport'])->name('import');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

