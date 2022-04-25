<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registercontroller;
use App\Http\Controllers\PatientController;
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


Route::post('/check',[PatientController::class,'check']);
Route::post('/verify',[registercontroller::class,'verify']);

Route::group(['middleware'=>['StaffAuth']],function(){
   Route::get('/view_report',function() {
      return view('view_report');
   });
   Route::get('/view_test',function() {
      return view('view_test');
   });
   
   
   
   
   
   
   //doctor routes
   Route::get('/DoctorNurseDashboard',[registercontroller::class,'DoctorNurseDashboard'])->middleware('DisableBackBtn');
   Route::get('/doctor_profile',[registercontroller::class,'doctor_profile']);
   Route::get('/view_appointment',[registercontroller::class,'view_appointment']);
   Route::get('/add_prescription/{appointment_id}',[registercontroller::class,'add_prescription']);
   Route::post('/add_prescription/{appointment_id}',[registercontroller::class,'add']);
   Route::get('/prescription/{id}',[registercontroller::class,'prescription']);
   Route::get('/downloadreport/{file_name}', [registercontroller::class, 'downloadFile']);
   Route::get('/report/{appointment_id}',[registercontroller::class,'report']);
   
   //patient routes
   Route::get('/Patient',[PatientController::class,'Patient'])->middleware('DisableBackBtn');
   Route::get('/patient_profile',[PatientController::class,'patient_profile']);
   Route::get('/view_report',[PatientController::class,'index']);
   Route::get('/book_appointment',[PatientController::class,'dropdown']);
   Route::get('/getdoctor',[PatientController::class,'getdoctor']);
   Route::post('/bookappoint',[PatientController::class,'bookappoint']);
   Route::get('/book_test',[PatientController::class,'booktest']);
   Route::post('/booktest',[PatientController::class,'test']);
   Route::get('/downloadFile/{file_name}', [PatientController::class, 'downloadFile']);
   
   
   
   
   
   
   //admin Dashboard route
   Route::post('/search',[registercontroller::class,'search']);
   Route::get('/view-update_profile',[registercontroller::class,'view_update_profile']);
   Route::get('/admin',[registercontroller::class,'admin'])->middleware('DisableBackBtn');
   Route::get('/admin_profile',[registercontroller::class,'admin_profile']);
   Route::post('/newstaff',[registercontroller::class,'newstaff']);
   Route::get('/getemployee',[registercontroller::class,'getemployee']);
   Route::get('/edit_profile/{Employee_ID}',[registercontroller::class,'edit_profile']);
   Route::post('/edit_profile/{Employee_ID}',[registercontroller::class,'edit']);
   Route::get('/update_profile/{Employee_ID}',[registercontroller::class,'update_profile'])->name('update_profile');
   Route::get('/generate_login',function() {
      return view('generate_login');
   });
   
   
   //nonmedical dashboard route
   Route::get('/nonmedical_profile',[registercontroller::class,'nonmedical_profile']);
   Route::get('/nonmedical',[registercontroller::class,'nonmedical'])->middleware('DisableBackBtn');
   Route::get('/registration_non-medical_staff',[registercontroller::class,'registration_non_medical_staff']);
   Route::post('/register',[registercontroller::class,'store']);
   
   
   
   //Pathology dashboard route
   Route::get('/pathology_profile',[registercontroller::class,'pathology_profile']);
   Route::get('/pathologyLab',[registercontroller::class,'pathologyLab'])->middleware('DisableBackBtn');
   Route::get('/view_test',[registercontroller::class,'view_test']);
   Route::post('/upload/{id}/{Employee_ID}',[registercontroller::class,'upload']);
});


Route::group(['middleware'=>['login']],function(){
   Route::get('/staff_login',function() {
      return view('staff_login');
   });

   Route::get('/patient_login',function() {
      return view('patient_login');
   });

   Route::get('/', function () {
      return view('homepage');
  });
});

Route::get('/logout', function() {
   session()->forget('loginId');
   return redirect('/');
});