<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ChronicDiseasController;

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
Route::get('/',[HomeController::class,'index'])->middleware('auth')->name('index');
Route::get('/admin', function () { return view('Panel.index');})->middleware('auth')->name('index');
Route::get('doctor/', function () { return view('DoctorDash.index');})->name('DoctorDash.index');
Route::get('/receptionPanel', function () { return view('RecDash.index');})->middleware('auth')->name('index');


Route::name('appointments.')->prefix('appointments/')->group(function () {
    Route::get('/', [AppointmentController::class,'index'])->middleware('auth')->name('index');
    Route::get('create', [AppointmentController::class,'create'])->middleware('auth')->name('create');
    Route::get('{appointment}', [AppointmentController::class,'show'])->middleware('auth')->name('show');
    Route::post('/', [AppointmentController::class,'store'])->middleware('auth')->name('store');
    Route::get('{id}/edit', [AppointmentController::class,'edit'])->middleware('auth')->name('edit');
    Route::put('{appointment}', [AppointmentController::class,'update'])->middleware('auth')->name('update');
    Route::delete('{appointment}', [AppointmentController::class,'destroy'])->middleware('auth')->name('destroy');
});


Route::get('/cronic',[ChronicDiseasController::class , 'index'])->middleware('auth')->middleware('auth')->name('chronic.index');
Route::get('/cronic/create',[ChronicDiseasController::class , 'create'])->middleware('auth')->name('chronic.create');
Route::get('/cronic/show/{id}',[ChronicDiseasController::class , 'show'])->middleware('auth')->name('chronic.show');
Route::get('/cronic/edit/{id}',[ChronicDiseasController::class , 'edit'])->middleware('auth')->name('chronic.edit');
Route::post('/cronic/store',[ChronicDiseasController::class , 'store'])->middleware('auth')->name('chronic.store');
Route::post('/cronic/update/{id}',[ChronicDiseasController::class , 'update'])->middleware('auth')->name('chronic.update');

Route::delete('/cronic/destroy/{id}',[ChronicDiseasController::class , 'destroy'])->middleware('auth')->name('chronic.destroy');
Route::resource('pateint',PatientsController::class);
// ->with('pateints');

Route::resource('recepte',ReceptionController::class);
Route::resource('doc',DoctorController::class)->middleware('auth');


//doctordash routes
Route::get('doctorPateint/', function () { return view('DoctorDash.patient.index2');})->name('DoctorDash.index');

// Route::get('/receptionPatient', function () { return view('RecDash.index');})->middleware('auth')->name('index');




//receptionDash
// Route::get('/receptionDash', function () { return view('receptionPanel');})->middleware('auth')->name('doctor.panel');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
