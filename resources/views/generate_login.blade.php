<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css">
    *{
        padding: 0;
        margin:0;
    }
    body{
        background: rgba(131, 103, 123, 0.4);
        /* justify-content: center; */
        /* padding: 140px */
        /* margin-top: 50px; */
        text-align: center;


    }

    .name{
        display: flex;
        flex-wrap: wrap;
        padding: 10px;
        justify-content: center;
    }
    .name input[type=number]{
        width: 70%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        /* border-radius: 30px; */
    }
    .address{
        display: flex;
        flex-wrap: wrap;
        padding: 10px;
        justify-content: center;
    }
    .address input[type=text]{
        width: 70%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        /* border-radius: 30px; */
    }

    .mobile{
        display: flex;
        flex-wrap: wrap;
        padding: 10px;
        justify-content: center;
    }
    .mobile input[type=number]{
        width: 35%;
        padding: 12px 20px;
        /* margin: 8px 10px; */
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        border-radius:  30px;
    }
    .mobile input[type=text]{
        width: 35%;
        padding: 12px 20px;
        /* margin: 8px 10px; */
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        border-radius: 30px;
    }
    .aadhar{
        display: flex;
        flex-wrap: wrap;
        padding: 10px;
        justify-content: center;
    }
    .aadhar input[type=number]{
        /* width: 886px; */
        /* height: 98px; */
        width: 70%;
         padding: 12px 20px;
         margin: 8px 0;
         display: inline-block;
         border: 1px solid #ccc;
         box-sizing: border-box;
         /* border-radius: 30px; */
        }
    .photo{
        display: flex;
        flex-wrap: wrap;
        padding: 20px;
        padding-left: 70px;
        justify-content: center;
    }
    .photo label{
        font-family: sans-serif;
        font-size: 20px;
    }

    .select_role{
        /* width: 70%; */
        display: flex;
        flex-wrap: wrap;
        padding: 10px;
        justify-content: center;
    }
    select{
        width: 70%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        /* border-radius: 30px; */
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
    .danger{
			  /* background: white; */
			  color: #CC0000
		  }
    .image3{
        width: 70px; 
        height: 69px;
        position: absolute; 
        top: 30px; 
        left: 10px;
        padding: 1%;
    }
    </style>
    <title>Registration</title>
</head>
<body>

    @include('flash')
    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="/newstaff" enctype="multipart/form-data">
        @csrf
        <div class="name">
            <input type="number" id="name" placeholder="Enter Employee Id" name="Employee_ID">
        </div>
        @if ($errors->has('Employee_ID'))
            <span class="danger">{{ $errors->first('Employee_ID') }}</span>
        @endif

        <div class="address">
            <input type="text" id="name" placeholder="Enter Name of Employee" name="Employee_name">
        </div>
        @if ($errors->has('Employee_name'))
            <span class="danger">{{ $errors->first('Employee_name') }}</span>
        @endif

        <div class="address">
            <input type="text" id="address" placeholder="Enter Email Address of Employee" name="Email_id">
        </div>
        @if ($errors->has('Email_id'))
            <span class="danger">{{ $errors->first('Email_id') }}</span>
        @endif

        <div class="aadhar">
            <input type="number" id="aadhar no." placeholder="Enter Mobile No" name="Mobile_No">
        </div>
        @if ($errors->has('Mobile_No'))
            <span class="danger">{{ $errors->first('Mobile_No') }}</span>
        @endif

        <div class="select_role">
            <select name="emp_role">
                <option value="">Select role</option>
                <option value="doctor">Doctor</option>
                <option value="nonmedical">Non Medical</option>
                <option value="pathology">Pathology</option>
            </select>
        </div>
        @if ($errors->has('emp_role'))
            <span class="danger">{{ $errors->first('emp_role') }}</span>
        @endif
        <br><br>
        
        <button type="submit">Generate Login</button>
    </form>
    @include('footer')

        

</body>
</html>
