<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SetupMgmt\ClassController;
use App\Http\Controllers\Admin\SetupMgmt\YearController;
use App\Http\Controllers\Admin\SetupMgmt\FeeController;
use App\Http\Controllers\Admin\SetupMgmt\FeeAmmountController;
use App\Http\Controllers\Admin\SetupMgmt\SubjectController;
use App\Http\Controllers\Admin\SetupMgmt\AssignSubjectController;
use App\Http\Controllers\Admin\StudentMgmt\StudentRegController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\StudentMgmt\StudentRollController;
use App\Http\Controllers\Admin\StudentMgmt\StudentShiftController;
use App\Providers\RouteServiceProvider;

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

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/',[LoginController::class, 'showLoginForm'])->name('login');
Route::get('/change-password',[UserController::class, 'changePassword'])->name('change-password');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/register',[FrontendController::class, 'index'])->name('register');

Route::prefix('admin')->group(function(){
    Route::get('/usres/view',[UserController::class, 'show'])->name('admin.users.view');
    Route::get('/users/add',[UserController::class, 'create'])->name('admin.users.add');
    Route::post('/users/store',[UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/edit/{id}',[UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/update/{id}',[UserController::class, 'update'])->name('admin.users.update');
    Route::get('/users/delete/{id}',[UserController::class, 'destroy'])->name('admin.users.delete');
    Route::post('/store',[UserController::class, 'adminStore'])->name('admin.store');
});
Route::prefix('setups')->group(function(){
    //classes
    Route::get('/class/view',[ClassController::class, 'show'])->name('setups.class.view');
    Route::get('/class/add',[ClassController::class, 'create'])->name('setups.class.add');
    Route::post('/class/store',[ClassController::class, 'store'])->name('setups.class.store');
    Route::get('/class/edit/{id}',[ClassController::class, 'edit'])->name('setups.class.edit');
    Route::post('/class/update/{id}',[ClassController::class, 'update'])->name('setups.class.update');
    Route::get('/class/delete/{id}',[ClassController::class, 'destroy'])->name('setups.class.delete');
    //year
    Route::get('/year/view',[YearController::class, 'show'])->name('setups.year.view');
    Route::get('/year/add',[YearController::class, 'create'])->name('setups.year.add');
    Route::post('/year/store',[YearController::class, 'store'])->name('setups.year.store');
    Route::get('/year/edit/{id}',[YearController::class, 'edit'])->name('setups.year.edit');
    Route::post('/year/update/{id}',[YearController::class, 'update'])->name('setups.year.update');
    Route::get('/year/delete/{id}',[YearController::class, 'destroy'])->name('setups.year.delete');
    //fee Catagory
    Route::get('/fee/catagory/view',[FeeController::class, 'show'])->name('setups.fee.catagory.view');
    Route::get('/fee/catagory/add',[FeeController::class, 'create'])->name('setups.fee.catagory.add');
    Route::post('/fee/catagory/store',[FeeController::class, 'store'])->name('setups.fee.catagory.store');
    Route::get('/fee/catagory/edit/{id}',[FeeController::class, 'edit'])->name('setups.fee.catagory.edit');
    Route::post('/fee/catagory/update/{id}',[FeeController::class, 'update'])->name('setups.fee.catagory.update');
    Route::get('/fee/catagory/delete/{id}',[FeeController::class, 'destroy'])->name('setups.fee.catagory.delete');
    //fee ammount
    Route::get('/fee/ammount/view',[FeeAmmountController::class, 'show'])->name('setups.fee.ammount.view');
    Route::get('/fee/ammount/add',[FeeAmmountController::class, 'create'])->name('setups.fee.ammount.add');
    Route::post('/fee/ammount/store',[FeeAmmountController::class, 'store'])->name('setups.fee.ammount.store');
    Route::get('/fee/ammount/edit/{fee_cat_id}',[FeeAmmountController::class, 'edit'])->name('setups.fee.ammount.edit');
    Route::post('/fee/ammount/update/{fee_cat_id}',[FeeAmmountController::class, 'update'])->name('setups.fee.ammount.update');
    Route::get('/fee/ammount/delete/{id}',[FeeAmmountController::class, 'destroy'])->name('setups.fee.ammount.delete');
    Route::get('/fee/ammount/details/{fee_cat_id}',[FeeAmmountController::class, 'details'])->name('setups.fee.ammount.details');
    //subject
    Route::get('/subject/view',[SubjectController::class, 'show'])->name('setups.subject.view');
    Route::get('/subject/add',[SubjectController::class, 'create'])->name('setups.subject.add');
    Route::post('/subject/store',[SubjectController::class, 'store'])->name('setups.subject.store');
    Route::get('/subject/edit/{id}',[SubjectController::class, 'edit'])->name('setups.subject.edit');
    Route::post('/subject/update/{id}',[SubjectController::class, 'update'])->name('setups.subject.update');
    Route::get('/subject/delete/{id}',[SubjectController::class, 'destroy'])->name('setups.subject.delete');
    //Assign Subject
    Route::get('/assign/subject/view',[AssignSubjectController::class, 'show'])->name('setups.assign.subject.view');
    Route::get('/assign/subject/add',[AssignSubjectController::class, 'create'])->name('setups.assign.subject.add');
    Route::post('/assign/subject/store',[AssignSubjectController::class, 'store'])->name('setups.assign.subject.store');
    Route::get('/assign/subject/edit/{class_id}',[AssignSubjectController::class, 'edit'])->name('setups.assign.subject.edit');
    Route::post('/assign/subject/update/{class_id}',[AssignSubjectController::class, 'update'])->name('setups.assign.subject.update');
    Route::get('/assign/subject/delete/{id}',[AssignSubjectController::class, 'destroy'])->name('setups.assign.subject.delete');
    Route::get('/assign/subject/details/{class_id}',[AssignSubjectController::class, 'details'])->name('setups.assign.subject.details');
});
//Student Managment
Route::prefix('students')->group(function(){
    Route::get('/reg/view',[StudentRegController::class, 'show'])->name('students.registration.view');
    Route::get('/reg/add',[StudentRegController::class, 'create'])->name('students.registration.add');
    Route::post('/reg/store',[StudentRegController::class, 'store'])->name('students.registration.store');
    Route::get('/reg/edit/{reg_id}/{id}',[StudentRegController::class, 'edit'])->name('students.registration.edit');
    Route::post('/reg/update/{reg_id}',[StudentRegController::class, 'update'])->name('students.registration.update');
    Route::get('/class/year/wise',[StudentRegController::class, 'classYearWise'])->name('students.class.year.wise');
    Route::get('/reg/shift/{reg_id}/{id}',[StudentRegController::class, 'stdShift'])->name('students.registration.shift');
    Route::post('/reg/shift/{reg_id}',[StudentRegController::class, 'updateStdShift'])->name('students.registration.updateShift');
    Route::get('/reg/details/{reg_id}/{id}',[StudentRegController::class, 'details'])->name('students.registration.details');
    //roll generate
    Route::get('/roll/view',[StudentRollController::class, 'show'])->name('students.roll.view');
    Route::get('/roll/getStudent',[StudentRollController::class, 'getStudent'])->name('students.roll.getStudent');
    Route::post('/roll/store',[StudentRollController::class, 'store'])->name('students.roll.store');
    //student Shift
    Route::get('/shift/class/year/wise',[StudentRegController::class, 'shiftclassYearWise'])->name('students.shift.class.year.wise');
    Route::post('/shift/shiftClassStore',[StudentRegController::class, 'shiftClassStore'])->name('students.shift.shiftClassStore');
});