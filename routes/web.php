<?php

use App\Doctor;
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

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/polyclinic', 'PolyclinicController@index')->name('polyclinic');

Route::resource('polyclinic', 'PolyclinicController');
Route::resource('doctor', 'DoctorController');
Route::resource('patient', 'PatientController');

Route::get('/patient/get-doctor/{id}', function($id) {
    $doctor = Doctor::where('polyclinic_id', $id)->get();

    return response()->json($doctor);
});

