<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registercontroller;
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
    return view('homepage');
    // return 'hello world';
});

Route::get('/admin',function() {
   return view('admin');
});
Route::get('/pathologyLab',function() {
   return view('PathologyLab');
});
Route::get('/staff_login',function() {
   return view('staff_login');
});
Route::get('/patient_login',function() {
   return view('patient_login');
});

Route::get('/Patient',function() {
   return view('Patient');
});
Route::get('/registration_non-medical_staff',function() {
   return view('registration_non-medical_staff');
});
// Route::get('/registration_non-medical_staff',function() {
//    return view('registration_non-medical_staff');
// });


Route::get('/register',[registercontroller::class,'create']);
Route::post('/register',[registercontroller::class,'store']);

Route::get('/patient-register',[registercontroller::class,'display']);
Route::post('/register',[registercontroller::class,'save']);


Route::view("login","registration_non-medical_staff");

Route::get('/nonmedical',function() {
   return view('NonMedical-Staff');
});

Route::get('/DoctorNurseDashboard',function() {
   return view('DoctorNurseDashboard');
});

Route::get('/bookappointment',function() {
   return view('bookappointment');
});


// Route::get('/login', function() {
//    if(session()->has('name'))
//    {
//       return redirect('nonmedical');
//    }
//    return view('registration_non-medical_staff');
// });


Route::get('/logout', function() {
   if(session()->has('name'))
   {
      session()->pull('name');
   }
   return redirect('registration_non-medical_staff');
});


