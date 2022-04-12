<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
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
            'Employee_ID' => 'required',
            'Mobile_No' => 'required',
        ]);
        $user = DB::table('staffs')->select('*')->where('Employee_ID','=',$request->Employee_ID)->first();
        if($user){
            if($user->Mobile_No == $request->Mobile_No){
                $request->session()->put('loginId', $user->Employee_name);
                if($user->emp_role == 'doctor'){
                    return redirect('/DoctorNurseDashboard');
                }
                elseif($user->emp_role == 'admin'){
                    return redirect('/admin');
                }
                elseif($user->emp_role == 'pathology'){
                    return redirect('/pathologyLab');
                }
                else{
                    return redirect('/nonmedical');
                }
            }
            else{
                return back()->with('fail','mobileno. doesnot maches');
            }
        }
        else{
            return back()->with('fail','this user is not registered');
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

    //Admin Profile function call
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
            'Employee_ID' => 'required',
            'Email_id' => 'required',
            'Mobile_No' => 'required',
            'emp_role' => 'required',
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
        DB::insert('insert into staffs (Employee_ID, Email_id, Mobile_No, emp_role) values (?, ?, ?, ?)', [$attributes['Employee_ID'], $attributes['Email_id'], $attributes['Mobile_No'], $attributes['emp_role']]);

        return redirect('/generate_login')->with('status', 'Login has been created');

    }
    // $appointment_id = random_int(00000000000, 9999999999);
    //view Update Profile Function call
    public function view_update_profile()
    {
        // $data = array();
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        $items = DB::table('staffs')->select('emp_role','id')->get();
        return view('view-update_profile', compact('items'));
    }



    //Admin View Update search
    public function search(REQUEST $request)
    {
        // $data = array();
        if(Session()->has('loginId')){
            $data = DB::table('staffs')->select('*')->where('Employee_name','=', Session()->get('loginId'))->first();
        }
        // $items = DB::table('staffs')->where('emp_role','=',$request->emp_role)->first();
        // return view('view-update_profile', compact('items'));
        $attributes = request()->validate([
            'emp_role' => 'required',
            'Employee_ID' => 'required',
        ]);
        $data = DB::table('staffs')->select('*')->where('Employee_ID','=',$request->Employee_ID)->first();
        if($data){
            if($data->emp_role == 'doctor'){
                return view('doctor_profile', compact('data'));
            }
            elseif($data->emp_role == 'admin'){
                return view('admin_profile', compact('data'));
            }
            elseif($data->emp_role == 'pathology'){
                return view('pathologyLab', compact('data'));
            }
            elseif($data->emp_role == 'nonmedical'){
                return view('nonmedical_profile', compact('data'));
            }
        }
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
            'mobileno' => 'required',
            'gender' => 'required',
            'Aadharno' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Aadharimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            $data = User::where('Name','=', Session()->get('loginId'))->first();
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
            'report' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
 
