<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css">
    *{
        padding: 0;
        margin: 0;
    }
    body{
        margin-top: 10px;
        background-color: #CAB1A5;
        height: 100%;
        width: 100%;
        position: relative;
    }
    .profile_img{
        padding-top: 20px;
        display: flex;
        flex-wrap: wrap;
        /* width: 100%; */
        justify-content: center;

    }
    .table{
        display: flex;
        flex-wrap: wrap;
        width:100%;
        justify-content: center;
        /* padding-bottom: 30px; */

    }
    .table1{
        display: flex;
        flex-wrap: wrap;
        width:100%;
        justify-content: center;
        padding-bottom: 40px;

    }
    table{
        border-spacing: 10px;
        width:50%;
        
    }
    tr{
        background: #DEC7BC;
        
    }
    td{
        padding: 10px;
    }
    /* table, tr,td {
        text-align: center;
        
        background: #E3AFBC;
        /* border: 5px solid #e8bfcaa6 ; */
        /* border-collapse: collapse; */
        /*}  */
    
    button {
        background: #A8ADD9;
        color: white;
        padding: 14px 20px;
        /* margin: 8px 0; */
        border:none;
        cursor: pointer;
        /* width: 30%; */
        position: relative;
        border-radius: 50px;
    }
    button:hover {
        opacity: 0.8;
    }
    /* .container{
        min-height: 100vh;
    } */
    </style>
    <title>Admin Profile</title>
</head>
<body>
    <div class="container">
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        {{-- @if ($data->{'emp_role'} == 'admin') --}}
        <div class="profile_img">
            {{-- <img src="pathology/patient.png" style="width:150px; height:150px; "> --}}
            {{-- {{ $data -> {'image'} }} --}}
            <img src= "/image/{{ $data -> {'image'} }}" style="width: 206px;height: 203px;" />
        </div>
        <div class="table">
        <table>
            <tr>
            <td><b>Name: </b>{{ $data -> {'Name'} }}</td>
            <td><b>Mobile No. </b> {{ $data -> {'mobileno'} }}</td>
            </tr>
            <tr>
            <td><b>Date of Birth: </b> {{ $data -> {'DOB'} }}</td>
            <td><b>Gender: </b>{{ $data -> {'gender'} }}</td>
            </tr>
            <tr>
            <td><b>Email: </b>{{ $data -> {'email'} }}</td>
            <td><b>Aadhar No. </b>{{ $data -> {'Aadharno'} }}</td>
            </tr>
            <tr>
                <td colspan="3"><b>Address: </b>{{ $data -> {'Address'} }}</td>
                
            </tr>
            <tr>
                <td><b>Blood Group: </b>{{ $data -> {'blood_group'} }}</td>
                <td><b>Height: </b>{{ $data -> {'height'} }} cm</td>
            </tr>
            <tr>
                <td><b>Weight: </b>{{ $data -> {'weight'} }} kg</td>
                <td><b>BMI: </b>{{ $data -> {'BMI'} }}</td>
            </tr>
        </table>
        
        </div>
        <div class="table1">
        <table>
            <tr style="background: rgba(251, 201, 177, 0.9);">
                {{-- <th>Department</th> --}}
                <th>Date <br> visited</th>
                <th>Prescribtion</th>
                <th>Report</th>
            @foreach ($users as $user)
            <tr>
                {{-- <td>{{ $user-> {'department'} }}</td> --}}
                <td style="text-align: center">{{ $user-> {'date_visited'} }}</td>
                <td>{{ $user-> {'prescription'} }}</td>
                <td><button onclick="window.location.href = '/report/{{ $user-> {'appointment_id'} }}';">Download Report</button></td>
            </tr>
            @endforeach
            <tr style="background: none; text-align: center">
                <td colspan="3" style="margin: 18px"><button type="button" onclick="window.location.href = '/add_prescription/{{ $items->appointment_id }}';"> Add Prescription</button></td>
            </tr>
        </table>
        </div>
        {{-- @endif --}}
        @include('footer')
    </div>
</body>
</html>
