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
    

    // public function check(REQUEST $request)
    // {
    //     $attributes = request()->validate([
    //         'Aadharno' => 'required',
    //         'mobileno' => 'required',
    //     ]);
    //     $user = User::where('Aadharno','=',$request->Aadharno)->first();
    //     if($user){
    //         if($user->mobileno == $request->mobileno){
    //             $request->session()->put('loginId', $user->Name);
    //             return redirect('/Patient');
    //         }
    //         else{
    //             return back()->with('fail','mobileno. doesnot maches');
    //         }
    //     }
    //     else{
    //         return back()->with('fail','this user is not registered');
    //     }
    // }
    // public function patient()
    // {
    //     // $data = array();
    //     if(Session()->has('loginId')){
    //         $data = User::where('Name','=', Session()->get('loginId'))->first();
    //     }
    //     return view('Patient', compact('data'));
    // }
    // public function patient_profile()
    // {
    //     // $data = array();
    //     if(Session()->has('loginId')){
    //         $data = User::where('Name','=', Session()->get('loginId'))->first();
    //     }
    //     return view('patient_profile', compact('data'));
    // }
    // public function index()
    // {
    //     if(Session()->has('loginId')){
    //         $data = User::where('Name','=', Session()->get('loginId'))->first();
    //     }
    //     // $users = array();
    //     // $id = DB::table('view_report')->find($Aadharno); 
    //     // $users = DB::select('select * from view_report where Aadharno =' $Aadharno);
    //     // $users = DB::select('select * from view_report');  //all data
    //     $users = DB::table('view_report')->select('*')->where('Aadharno' ,$data->Aadharno)->get();
    //     return view('view_report',compact('users'));
    //  }

    //staffs Login
    public function verify(REQUEST $request)
    {
        $attributes = request()->validate([
            'Employee_ID' => 'required|numeric',
            'password' => 'required|numeric|digits:10',
        ], [
            'Employee_ID.required' => 'Employee_ID is required',
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


    //Doctor Dashboard Fucntion call
    public function DoctorNurseDashboard()
    {
        // $data = array();
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        return view('DoctorNurseDashboard', compact('data'));
    }


    //Doctor profile
    public function doctor_profile()
    {
        // $data = array();
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        return view('doctor_profile', compact('data'));
    }

    public function view_appointment()
    {
        // $data = array();
        if(Session()->has('loginId')){
            $data = DB::table('doctors')->select('*')->where('doctor_name','=', Session()->get('loginId'))->first();
        }
        $users = DB::table('bookings')->select('bookings.id','bookings.Aadharno','bookings.time','users.Name as u_name')->leftjoin('users', 'users.Aadharno', '=', 'bookings.Aadharno')->where('doctor_id','=',$data->doctor_id)->get();
        // $users = DB::table('booktests')->select('booktests.id','booktests.date','booktests.time','booktests.report_name','users.Name as u_name')->leftjoin('users', 'users.Aadharno', '=', 'booktests.Aadharno')->get();
        return view('view_appointment', compact('users'));
    }

    public function prescription(Request $request ,$id)
    {
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        // $users = array();
        // $id = DB::table('view_report')->find($Aadharno); 
        // $users = DB::select('select * from view_report where Aadharno =' $Aadharno);
        // $users = DB::select('select * from view_report');  //all data
        // DB::table()->SELECT('*')->WHERE() EXISTS (SELECT ProductName FROM Products WHERE Products.SupplierID = Suppliers.supplierID AND Price = 22);
        // $data = DB::table('users')->select('users.*','bookings.*',)->leftjoin('bookings', 'bookings.Aadharno', '=', 'users.Aadharno')->get();
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
        // $users = array();
        // $id = DB::table('view_report')->find($Aadharno); 
        // $users = DB::select('select * from view_report where Aadharno =' $Aadharno);
        // $users = DB::select('select * from view_report');  //all data
        // DB::table()->SELECT('*')->WHERE() EXISTS (SELECT ProductName FROM Products WHERE Products.SupplierID = Suppliers.supplierID AND Price = 22);
        // $data = DB::table('users')->select('users.*','bookings.*',)->leftjoin('bookings', 'bookings.Aadharno', '=', 'users.Aadharno')->first();

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
        return redirect("/prescription/$data->id")->with('status', 'Updated successfully');
    }
    


    public function report(Request $request, $appointment_id){
        $users = DB::table('booktests')->select('*')->where('appointment_id' ,$request->appointment_id)->get();
        return view('report',compact('users'));
    }
    public function downloadFile($file_name){
        // $file = Storage::disk('public')->get($file_name);
        $filepath = public_path("report\\$file_name" );
        return Response::download($filepath); 
        // return (new Response($file_name, 200))
        //       ->header('Content-Type', 'file/pdf');
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
        // $data = array();
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
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'image/';
        //     $profileImage = $image->getClientOriginalName();
        //     $image->move($destinationPath, $profileImage);
        //     $attributes['image'] = "$profileImage"; // it stores the image but in db the filename is random
        // }
        // if ($image = $request->file('Aadharimg')) {
        //     $destinationPath = 'image/';
        //     $profileImage = $image->getClientOriginalName();
        //     $image->move($destinationPath, $profileImage);
        //     $attributes['Aadharimg'] = "$profileImage"; // it stores the image but in db the filename is random
        // }

        // $user = User::create($attributes);

        // auth()->login($user);

        // DB::table('staffs')->insert()
        DB::insert('insert into staffs (Employee_ID, Employee_name, Email_id, Mobile_No, emp_role) values (?, ?, ?, ?, ?)', [$attributes['Employee_ID'], $attributes['Employee_name'], $attributes['Email_id'], $attributes['Mobile_No'], $attributes['emp_role']]);
        if($attributes['emp_role'] = 'doctor'){
            $doctor_id = $this->generateUniqueCode();
            DB::insert('insert into doctors (doctor_id, Employee_ID, doctor_name, Email_id, Mobile_No) values (?, ?, ?, ?, ?)', [$doctor_id, $attributes['Employee_ID'], $attributes['Employee_name'], $attributes['Email_id'], $attributes['Mobile_No']]);
        }
        return redirect('/generate_login')->with('status', 'Login has been created');

    }
    public function generateUniqueCode()
    {
        do {
            $doctor_id = random_int(000000, 999999);
        } while (DB::table('doctors')->where("doctor_id", "=", $doctor_id)->first());
  
        return $doctor_id;
    }
    // $appointment_id = random_int(00000000000, 9999999999);
    //view Update Profile Function call
    public function view_update_profile()
    {
        // $data = array();
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        // $items = DB::table('staffs')->select('emp_role','id')->get();
        $items=DB::table('staffs')->distinct()->select('emp_role')->orderBy('emp_role','asc')->get();
        return view('view-update_profile', compact('items'));
    }
    // public function dropdown()
    // {
    //     if(Session()->has('loginId')){
    //         $data = User::where('Name','=', Session()->get('loginId'))->first();
    //     }


    //     $user=DB::table('doctors')->distinct()->select('department')->orderBy('department','asc')->get();
    //     // // $items = DB::table('doctors')->select('*')->get();
    //     // // $selectedID = 2;
    //     return view('book_appointment', compact('data','user'));
        
    // }



    //Admin View Update search
    public function search(REQUEST $request)
    {
        // $data = array();
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        // $items = DB::table('staffs')->where('emp_role','=',$request->emp_role)->first();
        // return view('view-update_profile', compact('items'));
        // dd(request()->all());
        $attributes = request()->validate([
            // 'emp_role' => 'required',
            'Employee_ID' => 'required',
        ]);
        $data = DB::table('staffs')->select('*')->where('Employee_ID','=',$request->Employee_ID)->first();
        if($data){
            if($data->emp_role == 'doctor'){
                return view('update_profile', compact('data'));
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
        // $items = DB::table('doctors')->select('*')->get();
        // $selectedID = 2;
        // return view('book_appointment', $data);

        //$request->department 
        return response()->json($doc);
    }

    public function edit_profile(Request $request)
    {
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        // $users = array();
        // $id = DB::table('view_report')->find($Aadharno); 
        // $users = DB::select('select * from view_report where Aadharno =' $Aadharno);
        // $users = DB::select('select * from view_report');  //all data
        $data = DB::table('staffs')->select('*')->where('Employee_ID','=',$request->Employee_ID)->first();
        return view('edit_profile',compact('data'));
     }

    public function edit(Request $request ,$Employee_ID)
    {  
        // dd(request()->Employee_ID);
        // dd(request()->all());
        $attributes = request()->validate([
            'Email_id' => 'required',
            'Mobile_No' => 'required',
            'profileImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'qualifications' => 'required',
            'Employee_name' => 'required',
            'Gender' => 'required',
            'Address' => 'required',

            
        ]);
        if ($image = $request->file('profileImage')) {
            $destinationPath = 'image/';
            $profileImage = $image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $attributes['profileImage'] = "$profileImage"; // it stores the image but in db the filename is random
        }

        DB::table('staffs')->where('Employee_ID', $request->Employee_ID)->update(['Email_id' => $attributes['Email_id'],'Mobile_No' => $attributes['Mobile_No'],'profileImage' => $attributes['profileImage'],'qualifications' => $attributes['qualifications'],'Employee_name' => $attributes['Employee_name'],'Gender' => $attributes['Gender'],'Address' => $attributes['Address']]);
        return redirect("/update_profile/$Employee_ID")->with('status', 'Report Has Been uploaded');
        // echo "Record updated successfully.<br/>";
    }
    public function update_profile(Request $request ,$Employee_ID)
    {
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        // $users = array();
        // $id = DB::table('view_report')->find($Aadharno); 
        // $users = DB::select('select * from view_report where Aadharno =' $Aadharno);
        // $users = DB::select('select * from view_report');  //all data
        
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
        // $data = array();
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        return view('nonmedical_profile', compact('data'));
    }

    //Registeration page function call
    public function registration_non_medical_staff()
    {
        // $data = array();
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        return view('registration_non-medical_staff', compact('data'));
    }

    //
    public function create()
    {
        // $data = $REQUEST->input();
        // $REQUEST->session()->put('name',$data['name']);
        // // echo session('getData');
        // return redirect('nonmedical');
        // return view('registration_non-medical_staffs ');
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
            $attributes['image'] = "$profileImage"; // it stores the image but in db the filename is random
        }
        if ($image = $request->file('Aadharimg')) {
            $destinationPath = 'image/';
            $profileImage = $image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $attributes['Aadharimg'] = "$profileImage"; // it stores the image but in db the filename is random
        }

        $user = User::create($attributes);

        // auth()->login($user);

        return redirect('/registration_non-medical_staff')->with('status', 'Patient Has Been Created');

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
        // $data = array();
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
        // $users = array();
        // $id = DB::table('view_report')->find($Aadharno); 
        // $users = DB::select('select * from view_report where Aadharno =' $Aadharno);
        // $users = DB::select('select * from view_report');  //all data
        $users = DB::table('booktests')->select('booktests.id','booktests.date','booktests.time','booktests.report_name','users.Name as u_name')->leftjoin('users', 'users.Aadharno', '=', 'booktests.Aadharno')->get();

        return view('view_test',compact('users'));
     }

    public function upload(Request $request ,$id)
    {  
        // dd(request()->all());
        $attributes = request()->validate([
            'report' => 'required|file|mimes:pdf|max:2048',
        ]);
        if ($image = $request->file('report')) {
            $destinationPath = 'report/';
            $profileImage = $image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $attributes['report'] = "$profileImage"; // it stores the image but in db the filename is random
        }
        // auth()->login($user);
        // DB::insert('insert into booktests (report) values (?)', [$attributes['report']]);
        // $user = User::create($attributes);
        DB::table('booktests')->where('id', $request->id)->limit(1)->update(['report' => $attributes['report']]);
        return redirect('/view_test')->with('status', 'Report Has Been uploaded');
    }
}
 
