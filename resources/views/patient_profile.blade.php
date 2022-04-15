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
        position: relative;
        min-height: 100vh;
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
    }
    table{
        border-spacing: 10px;
        width:50%;
        
    }
    .table1{
        display: flex;
        width:100%;
        justify-content: center;
        padding-bottom: 50px
        
    }
    tr{
        background: #E3AFBC;
        
    }
    td{
        padding: 10px;
    }
    .container{
        min-height: 100%;
    }
    </style>
    <title>patient_profile</title>
</head>
<body>
    <div class="profile_img">
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
      </table>
    </div>
    <div class="table1">
      <table>
        @foreach ($users as $user)
        <tr>
           <td>Appointment ID :-{{ $user->{'appointment_id'} }} <br> {{ $user->{'prescription'} }} <br> </td>
         </tr>
        @endforeach
      </table>
    </div>
    @include('footer')
</body>
</html>
