<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Response;
class registercontroller extends Controller
{
    
    //---------------------------------------staffs Login--------------------------------------------------------
    public function verify(REQUEST $request)
    {
        $attributes = request()->validate([
            'Employee_ID' => 'required|numeric',
            'password' => 'required|numeric|digits:10',
        ], [
            'Employee_ID.required' => 'Employee ID is required',
            'password.required' => 'Password is required'
        ]);
        $user = DB::table('staffs')->select('*')->where('Employee_ID','=',$request->Employee_ID)->first();
        if($user){
            if($user->Mobile_No == $request->password){
                $request->session()->put('loginId', $user->Employee_name);
                if($user->emp_role == 'doctor'){
                    return redirect('/DoctorNurseDashboard')->with('success','Login Successfully');
                }
                elseif($user->emp_role == 'admin'){
                    return redirect('/admin')->with('success','Login Successfully');
                }
                elseif($user->emp_role == 'pathology'){
                    return redirect('/pathologyLab')->with('success','Login Successfully');
                }
                else{
                    return redirect('/nonmedical')->with('success','Login Successfully');
                }
            }
            else{
                return back()->with('fail','Incorrect Password');
            }
        }
        else{
            return back()->with('fail','Incorrect Employee ID');
        }
    }


    //-----Doctor Dashboard Fucntion call-----------------------------
    public function DoctorNurseDashboard()
    {
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        return view('DoctorNurseDashboard', compact('data'));
    }


    //----------Doctor profile----------------------------
    public function doctor_profile()
    {

        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        return view('doctor_profile', compact('data'));
    }

    public function view_appointment()
    {
        if(Session()->has('loginId')){
            $data = DB::table('doctors')->select('*')->where('doctor_name','=', Session()->get('loginId'))->first();
        }
        $users = DB::table('bookings')->select('bookings.id','bookings.Aadharno','bookings.time','bookings.date','users.Name as u_name')->leftjoin('users', 'users.Aadharno', '=', 'bookings.Aadharno')->where('doctor_id','=',$data->doctor_id)->get();
        return view('view_appointment', compact('users'));
    }

    public function prescription(Request $request ,$id)
    {
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        $items = DB::table('bookings')->select('*')->where('id', '=', $request->id)->first();
        $data = DB::table('users')->select('*')->where('Aadharno','=',$items->Aadharno)->first();
        $users = DB::table('bookings')->select('*')->where('Aadharno', '=', $items->Aadharno)->get();
        $reports = DB::table('booktests')->select('*')->where('appointment_id', '=', $items->appointment_id)->first();
        return view('prescription',compact('data','users','items','reports'));
     }



    public function add_prescription(Request $request, $appointment_id){
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        $items = DB::table('bookings')->select('*')->where('appointment_id', '=', $request->appointment_id )->first();
        return view('add_prescription',compact('items'));
    }



    public function add(Request $request, $appointment_id){
        // dd(request()->all()); 
        $attributes = request()->validate([
            'date_visited' => 'required',
            'prescription' => 'required',
        ]);  

        DB::table('bookings')->where('appointment_id', $request->appointment_id)->update(['date_visited' => $attributes['date_visited'],'prescription' => $attributes['prescription']]);
        $data = DB::table('bookings')->select('id')->where('appointment_id', '=', $request->appointment_id )->first();
        return redirect("DoctorNurseDashboard")->with('info', 'Updated successfully');
    }
    


    public function report(Request $request, $appointment_id){
        $users = DB::table('booktests')->select('*')->where('appointment_id' ,$request->appointment_id)->get();
        return view('report',compact('users'));
    }
    public function downloadFile($file_name){
        $filepath = public_path("report\\$file_name" );
        return Response::download($filepath); 
    }








    //Admin Dashboard function call
    public function admin()
    {
        $data = array();
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        return view('admin', compact('data'));
    }


    //Admin profile Function call
    public function admin_profile()
    {
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        return view('admin_profile', compact('data'));
    }

    //New staffs create function
    public function newstaff(REQUEST $request)
    {
        // dd(request()->all());
        $attributes = request()->validate([
            'Employee_ID' => 'required|numeric|unique:staffs',
            'Email_id' => 'required|email|unique:staffs',
            'Mobile_No' => 'required|numeric|digits:10|unique:staffs',
            'emp_role' => 'required',
            'Employee_name' => 'required',
        ], [
            'Employee_ID.required' => 'Employee ID is required!!',
            'Email_id.required' => 'Email ID is required!!',
            'Mobile_No.required' => 'Mobile No is required!!',
            'emp_role.required' => 'Employee Role is required!!',
            'Employee_name.required' => 'Employee Name is required!!'
        ]);
        DB::insert('insert into staffs (Employee_ID, Employee_name, Email_id, Mobile_No, emp_role) values (?, ?, ?, ?, ?)', [$attributes['Employee_ID'], $attributes['Employee_name'], $attributes['Email_id'], $attributes['Mobile_No'], $attributes['emp_role']]);
        if($request->emp_role == 'doctor'){
            $doctor_id = $this->generateUniqueCode();
            $department = 'OPD';
            DB::insert('insert into doctors (doctor_id, Employee_ID, doctor_name, Email_id, Mobile_No, department) values (?, ?, ?, ?, ?, ?)', [$doctor_id, $attributes['Employee_ID'], $attributes['Employee_name'], $attributes['Email_id'], $attributes['Mobile_No'], $department]);
        }
        return redirect('/admin')->with('info', 'Login has been created');

    }
    public function generateUniqueCode()
    {
        do {
            $doctor_id = random_int(000000, 999999);
        } while (DB::table('doctors')->where("doctor_id", "=", $doctor_id)->first());
  
        return $doctor_id;
    }


    //view Update Profile Function call
    public function view_update_profile()
    {
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        $items=DB::table('staffs')->distinct()->select('emp_role')->orderBy('emp_role','asc')->get();
        return view('view-update_profile', compact('items'));
    }




    //Admin View Update search
    public function search(REQUEST $request)
    {
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        $attributes = request()->validate([
            'emp_role' => 'required',
            'Employee_ID' => 'required',
        ], [
            'Employee_ID.required' => 'Employee ID is required!!',
            'emp_role.required' => 'emp_role is required!!'
        ]);

        $data = DB::table('staffs')->select('*')->where('Employee_ID','=',$request->Employee_ID)->first();
        if($data){
            if($data->emp_role == 'doctor'){
                return redirect("/update_profile/$request->Employee_ID")->with(compact('data'));
            }
            elseif($data->emp_role == 'admin'){
                return view('admin_profile', compact('data'));
            }
            elseif($data->emp_role == 'pathology'){
                return view('update_profile', compact('data'));
            }
            elseif($data->emp_role == 'nonmedical'){
                return view('update_profile', compact('data'));
            }
        }
    }

    public function getemployee(Request $request)
    {
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }


        $doc=DB::table('staffs')->select('Employee_name','Employee_ID')->where('emp_role' ,$request->emp_role)->get();
        return response()->json($doc);
    }

    public function edit_profile(Request $request)
    {
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        $data = DB::table('staffs')->select('*')->where('Employee_ID','=',$request->Employee_ID)->first();
        return view('edit_profile',compact('data'));
     }

    public function edit(Request $request ,$Employee_ID)
    {  
        // dd(request()->all());
        $attributes = request()->validate([
            'Email_id' => 'required',
            'Mobile_No' => 'required',
            'profileImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'qualifications' => 'required',
            'Employee_name' => 'required',
            'Gender' => 'required',
            'Address' => 'required',
            'emp_role' => 'required',
        ]);
        if ($image = $request->file('profileImage')) {
            $destinationPath = 'image/';
            $profileImage = $image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $attributes['profileImage'] = "$profileImage"; 
        }

        DB::table('staffs')->where('Employee_ID', $request->Employee_ID)->update(['Email_id' => $attributes['Email_id'],'Mobile_No' => $attributes['Mobile_No'],'profileImage' => $attributes['profileImage'],'qualifications' => $attributes['qualifications'],'Employee_name' => $attributes['Employee_name'],'Gender' => $attributes['Gender'],'Address' => $attributes['Address']]);

        if($attributes['emp_role'] == 'doctor'){
            DB::table('doctors')->where('Employee_ID', $request->Employee_ID)->update(['Email_id' => $attributes['Email_id'],'Mobile_No' => $attributes['Mobile_No'],'profileImage' => $attributes['profileImage'],'doctor_name' => $attributes['Employee_name'],'Gender' => $attributes['Gender'],'Address' => $attributes['Address']]);
        }
        return redirect("/admin")->with('info', 'Report Has Been uploaded');
    }
    public function update_profile(Request $request ,$Employee_ID)
    {
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        $data = DB::table('staffs')->select('*')->where('Employee_ID','=',$request->Employee_ID)->first();
        return view('update_profile',compact('data'));
     }

















    //Non medical function call
    public function nonmedical()
    {
        $data = array();
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        return view('NonMedical-staff', compact('data'));
    }

    //Nonmedical profile Function call
    public function nonmedical_profile()
    {
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        return view('nonmedical_profile', compact('data'));
    }

    //Registeration page function call
    public function registration_non_medical_staff()
    {
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        return view('registration_non-medical_staff', compact('data'));
    }


    //store patient details in db
    public function store(REQUEST $request)
    {
        // dd(request()->all());
        $attributes = request()->validate([
            'Name' => 'required',
            'Address' => 'required',
            'mobileno' => 'required|numeric|digits:10|unique:users',
            'gender' => 'required',
            'Aadharno' => 'required|numeric|digits:12|unique:users',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'BMI' => 'required|numeric',
            'DOB' => 'required',
            'email' => 'required|email|unique:users',
            'blood_group' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'Aadharimg' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ], [
            'Name.required' => 'Name is required!!',
            'Address.required' => 'Address is required!!',
            'mobileno.required' => 'Mobile No is required!!',
            'gender.required' => 'Gender is required!!',
            'Aadharno.required' => 'Aadhar Number is required!!',
            'height.required' => 'Height is required!!',
            'weight.required' => 'Weight is required!!',
            'BMI.required' => 'BMI is required!!',
            'DOB.required' => 'Date of Birth is required!!',
            'email.required' => 'Email Address is required!!',
            'blood_group.required' => 'Blood Group is required!!',
            'image.required' => 'Profile Image is required!!',
            'Aadharimg.required' => 'Aadhar Card Image is required!!'
        ]);
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = $image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $attributes['image'] = "$profileImage"; 
        }
        if ($image = $request->file('Aadharimg')) {
            $destinationPath = 'image/';
            $profileImage = $image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $attributes['Aadharimg'] = "$profileImage"; 
        }

        $user = User::create($attributes);
        return redirect('/nonmedical')->with('info', 'Patient Has Been Created');

    }
    


















    //Pathology function call
    public function pathologyLab()
    {
        $data = array();
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        return view('PathologyLab', compact('data'));
    }

    //pathology profile Function call
    public function pathology_profile()
    {
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        return view('pathology_profile', compact('data'));
    }

    public function view_test()
    {
         if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        $users = DB::table('booktests')->select('booktests.id','booktests.date','booktests.time','booktests.report_name','users.Name as u_name')->leftjoin('users', 'users.Aadharno', '=', 'booktests.Aadharno')->get();

        return view('view_test',compact('users','data'));
     }

    public function upload(Request $request ,$id, $Employee_ID)
    {  
        // dd(request()->all());
        $attributes = request()->validate([
            'report' => 'required|file|mimes:pdf|max:2048',
        ]);
        if ($image = $request->file('report')) {
            $destinationPath = 'report/';
            $profileImage = $image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $attributes['report'] = "$profileImage"; 
        }

        DB::table('booktests')->where('id', $request->id)->limit(1)->update(['report' => $attributes['report'],'uploaded_by' => $request->Employee_ID]);
        return redirect('/pathologyLab')->with('info', 'Report Has Been uploaded');
    }
}
 
