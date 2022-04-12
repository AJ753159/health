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
        background: rgba(151, 202, 239, 0.5);
        width: 100%;
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
        /* padding: 20px; */

    }
    table{
        border-spacing: 10px;
        width:50%;
        
    }
    tr{
        background: #91C8EF;
        
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
    .footer{
        background: #575459;
        width: 100%;
        height: 10vh;
        position: fixed;
        bottom:0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .footer p{
        color: white;
    }
    </style>
    <title>Doctor Profile</title>
</head>
<body>
    {{-- @if ($data->{'emp_role'} == 'nonmedical') --}}
    <div class="profile_img">
        {{-- <img src="pathology/doctor_photo.jpg" style="width:206px; height:208px; "> --}}
        <img src= "image/{{ $data -> {'profileImage'} }}" style="width: 206px;height: 203px;" />
    </div>
    <div class="table">
        <table>
          <tr>
            <td><b>Name: </b>{{ $data -> {'Employee_name'} }}</td>
            <td><b>Mobile No. </b> {{ $data -> {'Mobile_No'} }}</td>
          </tr>
          <tr>
            <td><b>Qualification</b> BDMS</td>
            <td><b>Gender: </b>{{ $data -> {'Gender'} }}</td>
          </tr>
          <tr>
            <td><b>Email: </b>{{ $data -> {'Email_id'} }}</td>
          </tr>
          <tr>
            <td colspan="3"><b>Address: </b>{{ $data -> {'Address'} }}</td>
          </tr>
        </table>
    </div>
    {{-- @endif --}}
    
    <div class="footer">
        <p>All Rights Reserved.</p>
    </div>

</body>
</html>
