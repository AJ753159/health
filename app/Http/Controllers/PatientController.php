<?php

namespace App\Http\Controllers;

// use App\Models\patient_login;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use File;
use Response;
class PatientController extends Controller
{
    // public function check(Request $request)
    // {
    //     // dd(request()->all());
    //     // $request->validate([
    //     //     'Date'=>'required',
    //     //     'Test Name'=>'required',
    //     //     ''
    //     // ]);
    //     // $creds = $request->only('Aadharno','password');
    //     // if(\Patient::asttempt($creds)){
    //     //     return redirect('Patient');
    //     // }
    // }
    // public function index() {
    //     $users = DB::select('select * from view_report');
    //     return view('view_report',['users'=>$users]);
    //  }
     public function check(REQUEST $request)
    {
        $attributes = request()->validate([
            'Aadharno' => 'required|numeric',
            'password' => 'required|numeric|digits:10',
        ], [
            'Aadharno.required' => 'Aadhar No is required',
            'password.required' => 'Password is required'
        ]);
        $user = User::where('Aadharno','=',$request->Aadharno)->first();
        if($user){
            if($user->mobileno == $request->password){
                $request->session()->put('loginId', $user->Name);
                return redirect('/Patient')->with('success','Login Successfully');
            }
            else{
                return back()->with('fail','Incorrect Password');
            }
        }
        else{
            return back()->with('fail','Incorrect Aadhar No.');
        }
    }
    public function patient()
    {
        // $data = array();
        if(Session()->has('loginId')){
            $data = User::where('Name','=', Session()->get('loginId'))->first();
        }
        
        return view('Patient', compact('data'));
    }
    public function patient_profile()
    {
        // $data = array();
        if(Session()->has('loginId')){
            $data = User::where('Name','=', Session()->get('loginId'))->first();
        }
        $users = DB::table('bookings')->select('*')->where('Aadharno' ,$data->Aadharno)->get();
        return view('patient_profile', compact('data','users'));
    }
    public function index()
    {
        if(Session()->has('loginId')){
            $data = User::where('Name','=', Session()->get('loginId'))->first();
        }
        // $users = array();
        // $id = DB::table('view_report')->find($Aadharno); 
        // $users = DB::select('select * from view_report where Aadharno =' $Aadharno);
        // $users = DB::select('select * from view_report');  //all data
        $users = DB::table('booktests')->select('*')->where('Aadharno' ,$data->Aadharno)->get();
        return view('view_report',compact('users'));
     }
    // public function book_appointment()
    // {
    //     if(Session()->has('loginId')){
    //         $data = User::where('Name','=', Session()->get('loginId'))->first();
    //     }


    //     // $data['department']=DB::table('doctors')->distinct()->select('department')->orderBy('department','asc')->get();
    //     // // $items = DB::table('doctors')->select('*')->get();
    //     // // $selectedID = 2;
    //     return view('dropdown', compact('data'));
    // }
    public function dropdown()
    {
        if(Session()->has('loginId')){
            $data = User::where('Name','=', Session()->get('loginId'))->first();
        }


        $user=DB::table('doctors')->distinct()->select('department')->orderBy('department','asc')->get();
        // // $items = DB::table('doctors')->select('*')->get();
        // // $selectedID = 2;
        return view('book_appointment', compact('data','user'));
        
    }
    public function getdoctor(Request $request)
    {
        if(Session()->has('loginId')){
            $data = User::where('Name','=', Session()->get('loginId'))->first();
        }


        $doc=DB::table('doctors')->select('doctor_name','doctor_id')->where('department' ,$request->department)->get();
        // $items = DB::table('doctors')->select('*')->get();
        // $selectedID = 2;
        // return view('book_appointment', $data);

        //$request->department 
        return response()->json($doc);
    }

    public function bookappoint(Request $request){
        if(Session()->has('loginId')){
            $data = User::where('Name','=', Session()->get('loginId'))->first();
        }
        $appointment_id = $this->generateUniqueCode();
        // $appointment_id = random_int(00000000000, 9999999999);
        // dd(request()->all());
        $attributes = request()->validate([
            'department' => 'required',
            'doctor_id' => 'required',
            'time' => 'required',
            'date' => 'required',
        ]);
        DB::insert('insert into bookings (appointment_id,department, doctor_id, time, date, Aadharno) values (?, ?, ?, ?, ?, ?)', [$appointment_id,$attributes['department'], $attributes['doctor_id'], $attributes['time'], $attributes['date'],$data->Aadharno]);

        return redirect('/book_appointment')->with('status', 'Appoinment has been created');
    }
    public function generateUniqueCode()
    {
        do {
            $appointment_id = random_int(00000000000, 9999999999);
        } while (DB::table('bookings')->where("appointment_id", "=", $appointment_id)->first());
  
        return $appointment_id;
    }
    public function booktest()
    {
        // $data = array();
        if(Session()->has('loginId')){
            $data = User::where('Name','=', Session()->get('loginId'))->first();
        }
        $user=DB::table('tests')->distinct()->select('test_name','test_id')->orderBy('test_name','asc')->get();
        $user1=DB::table('bookings')->distinct()->select('appointment_id','doctor_id')->where('Aadharno', $data->Aadharno)->get();
        return view('book_test', compact('data','user','user1'));
    }
    public function test(Request $request){
        if(Session()->has('loginId')){
            $data = User::where('Name','=', Session()->get('loginId'))->first();
        }
        
        $user1=DB::table('bookings')->distinct()->select('doctor_id')->where('appointment_id', $request->appointment_id)->first();
        $user2=DB::table('tests')->select('test_name')->where('test_id', $request->test_id)->first();
        // dd(request()->all());
        $attributes = request()->validate([
            'test_id' => 'required',
            'appointment_id' => 'required',
            'time' => 'required',
            'date' => 'required',
        ]);
        DB::insert('insert into booktests(appointment_id, test_id, report_name, time, date, Aadharno, doctor_id) values (?, ?, ?, ?, ?, ?, ?)', [$attributes['appointment_id'],$attributes['test_id'], $user2->test_name, $attributes['time'], $attributes['date'],$data->Aadharno, $user1->doctor_id]);

        return redirect('/book_test')->with('status', 'Appointment has been created');
    }
    public function downloadFile($file_name){
        // $file = Storage::disk('public')->get($file_name);
        $filepath = public_path("report\\$file_name" );
        return Response::download($filepath); 
        // return (new Response($file_name, 200))
        //       ->header('Content-Type', 'file/pdf');
    }
}
