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
        background: rgba(131, 103, 123, 0.4);
        width: 100%;
    }
    .profile_img{
        padding-top: 20px;
        display: flex;
        flex-wrap: wrap;
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
    tr{
        background: rgba(131, 103, 123, 0.4);
    }
    td{
        padding: 10px;
    }
    </style>
    <title>Admin Profile</title>
</head>
<body>
    <div class="profile_img">
        <img src= "image/{{ $data -> {'profileImage'} }}" style="width: 206px;height: 203px;" />
    </div>
    <div class="table">
    <table>
        <tr>
        <td><b>Name: </b>{{ $data -> {'Employee_name'} }}</td>
        <td><b>Mobile No. </b> +{{ $data -> {'Mobile_No'} }}</td>
        </tr>
        <tr>
        <td><b>Qualification</b>{{ $data -> {'qualifications'} }}</td>
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
    @include('footer')
</body>
</html>
