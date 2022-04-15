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
    button {
        background: #A8ADD9;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border:none;
        cursor: pointer;
        width: 30%;
        position: relative;
        border-radius: 50px;
    }
    button:hover {
        opacity: 0.8;
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
    <title>Edit Profile</title>
</head>
<body>
    @include('flash')
    <form action="/edit_profile/{{ $data->Employee_ID }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="profile_img">
            <input type="file" id="image" name="profileImage" value=" <img src= 'image/{{ $data -> {'profileImage'} }}' style='width: 206px;height: 203px;' />" />
        </div>
        <div class="table">
        <table>
            <tr>
                <td><b>Name: </b><input type="text" name="Employee_name" value="{{ $data -> {'Employee_name'} }}" /></td>
                <td><b>Mobile No. </b> <input type="text" name="Mobile_No" value="{{ $data -> {'Mobile_No'} }}" /></td>
            </tr>
            <tr>
                <td><b>Qualification</b> <input type="text" value="{{ $data -> {'qualifications'} }}" name="qualifications" required /></td>
                <td><b>Gender: </b><input type="text" name="Gender" value="{{ $data -> {'Gender'} }}" /></td>
            </tr>
            <tr>
                <td><b>Email: </b><input type="text" name="Email_id" value="{{ $data -> {'Email_id'} }}" /></td>
                <td><b>Employee Role:</b><input type="text" name="emp_role" value="{{ $data -> {'emp_role'} }}" readonly/></td>
            </tr>
            <tr>
                <td colspan="3"><b>Address: </b><input type="text" name="Address" value="{{ $data -> {'Address'} }}" /></td>
            </tr>
            <tr style="background: none; text-align:center;">
                <td colspan="3"><button type="submit">Update</button></td>
            </tr>
        </table>
        </div>
    </form>
    @include('footer')
</body>
</html>
