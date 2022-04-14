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

Route::get('/', function () {
    return view('homepage');
    // return 'hello world';
});
// Auth::routes();



Route::get('/staff_login',function() {
   return view('staff_login');
});

Route::get('/patient_login',function() {
   return view('patient_login');
});

// Route::get('/Patient',function() {
//    return view('Patient');
// });


// Route::get('/book_appointment',function() {
//    return view('book_appointment');
// });
Route::get('/view_report',function() {
   return view('view_report');
});
Route::get('/view_test',function() {
   return view('view_test');
});




// Route::get('/doctor_profile',function() {
//    return view('doctor_profile');
// });
// Route::get('/register',[registercontroller::class,'create']);


Route::post('/check',[PatientController::class,'check']);
Route::post('/verify',[registercontroller::class,'verify']);
Route::get('/Patient',[PatientController::class,'Patient']);

//doctor routes
Route::get('/DoctorNurseDashboard',[registercontroller::class,'DoctorNurseDashboard']);
Route::get('/doctor_profile',[registercontroller::class,'doctor_profile']);
Route::get('/view_appointment',[registercontroller::class,'view_appointment']);
Route::get('/add_prescription/{appointment_id}',[registercontroller::class,'add_prescription']);
Route::post('/add_prescription/{appointment_id}',[registercontroller::class,'add']);
Route::get('/prescription/{id}',[registercontroller::class,'prescription']);
Route::get('/downloadreport/{file_name}', [registercontroller::class, 'downloadFile']);
Route::get('/report/{appointment_id}',[registercontroller::class,'report']);

//patient routes
Route::get('/patient_profile',[PatientController::class,'patient_profile']);
Route::get('/view_report',[PatientController::class,'index']);
Route::get('/book_appointment',[PatientController::class,'dropdown']);
Route::get('/getdoctor',[PatientController::class,'getdoctor']);
Route::post('/bookappoint',[PatientController::class,'bookappoint']);
Route::get('/book_test',[PatientController::class,'booktest']);
Route::post('/booktest',[PatientController::class,'test']);
Route::get('/downloadFile/{file_name}', [PatientController::class, 'downloadFile']);
// Route::get('/dropdown',[PatientController::class,'dropdown']);

// Route::view("login","registration_non-medical_staff");



// Route::get('/DoctorNurseDashboard',function() {
//    return view('DoctorNurseDashboard');
// });

// Route::get('/bookappointment',function() {
//    return view('bookappointment');
// });


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
   return redirect('/');
});



// Route::get('/patient_profile',function() {
//    return view('patient_profile');
// });





//Admin Panel

// Route::get('/view-update_profile',function() {
//    return view('view-update_profile');
// });



//admin Dashboard route
Route::post('/search',[registercontroller::class,'search']);
Route::get('/view-update_profile',[registercontroller::class,'view_update_profile']);
Route::get('/admin',[registercontroller::class,'admin']);
Route::get('/admin_profile',[registercontroller::class,'admin_profile']);
Route::post('/newstaff',[registercontroller::class,'newstaff']);
Route::get('/getemployee',[registercontroller::class,'getemployee']);
Route::get('/edit_profile/{Employee_ID}',[registercontroller::class,'edit_profile']);
Route::post('/edit_profile/{Employee_ID}',[registercontroller::class,'edit']);
Route::get('/update_profile/{Employee_ID}',[registercontroller::class,'update_profile']);
Route::get('/generate_login',function() {
   return view('generate_login');
});


//nonmedical dashboard route
Route::get('/nonmedical_profile',[registercontroller::class,'nonmedical_profile']);
Route::get('/nonmedical',[registercontroller::class,'nonmedical']);
Route::get('/registration_non-medical_staff',[registercontroller::class,'registration_non_medical_staff']);
Route::post('/register',[registercontroller::class,'store']);



//Pathology dashboard route
Route::get('/pathology_profile',[registercontroller::class,'pathology_profile']);
Route::get('/pathologyLab',[registercontroller::class,'pathologyLab']);
Route::get('/view_test',[registercontroller::class,'view_test']);
Route::post('/upload/{id}',[registercontroller::class,'upload']);
