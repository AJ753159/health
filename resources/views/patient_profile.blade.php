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
        background: rgba(227, 175, 188, 0.65);
        width: 100%;
    }
    .profile_img{
        padding-top: 20px;
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        justify-content: center;

    }
    .table{
        display: flex;
        flex-wrap: wrap;
        width:100%;
        justify-content: center;
        /* padding: 20px; */

    }
    table{
        border-spacing: 10px;
        width:50%;
        
    }
    tr{
        background: #E3AFBC;
        
    }
    td{
        padding: 10px;
    }
    /* table, tr,td {
        text-align: center;
        
        background: #E3AFBC;
        /* border: 5px solid #e8bfcaa6 ; */
        /* border-collapse: collapse; */
        /* } */ 
    .footer{
        background: #575459;
        width: 100%;
        height: 10vh;
        /* position: fixed; */
        bottom:0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .footer p{
        color: white;
    }
    </style>
    <title>patient_profile</title>
</head>
<body>
    <div class="profile_img">
        {{-- <img src="pathology/patient.png" style="width:150px; height:150px; "> --}}
        {{-- {{ $data -> {'image'} }} --}}
        <img src= "image/{{ $data -> {'image'} }}" style="width: 206px;height: 203px;" />
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
        <tr style="text-align: center">
            <td colspan="3">Dolo650 : 1-1<br>cortex : 1-1-1</td>
        </tr>
        <tr style="text-align: center">
            <td colspan="3">Toba 1-1</td>

        </tr>
        <tr style="text-align: center">
            <td colspan="3">Phenethelline  Once in week</td>
        </tr>
        
      </table>
    </div>
    <div class="footer">
        <p>All Rights Reserved.</p>
    </div>
</body>
</html>
