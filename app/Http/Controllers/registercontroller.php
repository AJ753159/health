<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;
class registercontroller extends Controller
{
    //
    public function display()
    {
        return view('registration_non-medical_staff');
    }
    public function save(Request $request)
    {
        $user_Name = $request->input('Name');
        $user_Address = $request->input('Address'); 
        $user_mobileno = $request->input('mobileno');
        $user_gender = $request->input('gender');
        $user_Aadharno = $request->input('Aadharno');
        $user_image = $request->input('image');
        $user_Aadharimg = $request->input('Aadharimg');

        DB::insert('insert into patient (Name,Address,mobileno,gender,Aadharno,image,Aadharimg) values (?,?,?,?,?,?,?)',[$user_Name,$user_Address,$user_mobileno,$user_gender,$user_Aadharno,$user_image,$user_Aadharimg]);

        return redirect('patient-register')->with('success','data saved');
    }


    // public function create()
    // {
    //     // $data = $REQUEST->input();
    //     // $REQUEST->session()->put('name',$data['name']);
    //     // // echo session('getData');
    //     // return redirect('nonmedical');
    //     return view('registration_non-medical_staff ');
    // }

    // public function store()
    // {
    //     // var_dump(request()->all());
    //     $attributes = request()->validate([
    //         'name' => 'required|max:255',
    //         'address' => 'required|max:255',
    //         'mobile no.' => 'required|max:255',
    //         'gender' => 'required|max:255|min:4',
    //         'aadhar no.' => 'requiredmax:255',
    //         // 'img' => 'required',
    //         // 'addharimg' => 'required',
    //     ]);

    //     User::create($attributes);

    //     return redirect('/');

    // }

}
 