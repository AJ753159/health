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
    .footer{
        background: #575459;
        width: 100%;
        height: 50px;
        /* position: fixed; */
        bottom:0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .footer p{
        color: white;
    }
    button {
        background: #A8ADD9;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border:none;
        cursor: pointer;
        /* width: 30%; */
        position: relative;
        border-radius: 50px;
    }
    button:hover {
        opacity: 0.8;
    }
    </style>
    <title>Admin Profile</title>
</head>
<body>
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
    <div class="table">
    <table>
        <tr style="background: rgba(251, 201, 177, 0.9);">
            {{-- <th>Department</th> --}}
            <th>Date <br> visited</th>
            <th>Prescribtion</th>
            <th>Report</th>
        </tr>
        {{-- $mi = new MultipleIterator();
        $mi->attachIterator(new ArrayIterator($array1));
        $mi->attachIterator(new ArrayIterator($array2));
        foreach($mi as list($array1data, $array2data)) {
            var_dump($array1data,$array2data);
        } --}}
        {{-- @foreach(array_merge($reports, $users) as $item)
        <tr>
            <td style="text-align: center">{{ $item-> {'date_visited'} }}</a></td>
            <td>{{ $item-> {'prescription'} }}</td>
            <td>{{ $item->{'report_name'} }}</td>
        </tr>
        @endforeach --}}
        @foreach ($users as $user)
        <tr>
            {{-- <td>{{ $user-> {'department'} }}</td> --}}
            <td style="text-align: center">{{ $user-> {'date_visited'} }}</td>
            <td>{{ $user-> {'prescription'} }}</td>
            <td><button onclick="window.location.href = '/report/{{ $user-> {'appointment_id'} }}';">Download Report</button></td>
            
            {{-- <td><img src= "report/{{ $user ->{'report'} }}" style="width: 206px;height: 203px;" /></td> --}}
        </tr>
        @endforeach
        <tr style="background: none; text-align: center">
            <td colspan="3"><button type="button" onclick="window.location.href = '/add_prescription/{{ $items->appointment_id }}';"> Add Prescription</button></td>
        </tr>
    </table>
    </div>
    {{-- @endif --}}
    <div class="footer">
        <p>All Rights Reserved.</p>
    </div>

</body>
</html>
