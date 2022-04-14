<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#datepicker" ).datepicker({ maxDate: "+0    ", dateFormat: 'yy-mm-dd',changeMonth: true,
      changeYear: true });
        
    } );
    </script>
    <style type="text/css">
    *{
        padding: 0;
        margin:0;
    }
    body{
        background-color: #5CDB9566;
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
    .name input[type=text]{
			width: 70%;
		  	padding: 12px 20px;
		  	margin: 8px 0;
		  	display: inline-block;
		  	border: 1px solid #ccc;
		  	box-sizing: border-box;
			border-radius: 30px;
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
        border-radius: 30px;
    }

    .mobile{
        /* display: flex; */
        /* flex-wrap: wrap; */
        padding: 10px;
        justify-content: center;
    }
    .mobile input[type=number]{
        width: 35%;
        padding: 12px 20px;
        margin: 8px 10px;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        border-radius:  30px;
    }
    .mobile input[type=text]{
        width: 35%;
        padding: 12px 20px;
        margin: 8px 10px;
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
        width: 70%;
         padding: 12px 20px;
         margin: 8px 0;
         display: inline-block;
         border: 1px solid #ccc;
         box-sizing: border-box;
         border-radius: 30px;
        }
    .photo{
        display: flex;
        /* flex-wrap: wrap; */
        /* padding: 20px; */
        padding-left: 70px;
        justify-content: center;
    }
    .photo label{
        font-family: sans-serif;
        font-size: 20px;
    }
    .photo input[type=file]{

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
        padding: 12px 20px;
        color: #CC0000
    }
    </style>
    <title>Registration</title>
</head>
<body>

    {{-- @include('flash') --}}
    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="/register" enctype="multipart/form-data">
        @csrf
        <div class="name">
            <input type="text" id="name" placeholder="Enter your Name" name="Name" >
            @if ($errors->has('Name'))
                <span class="danger">{{ $errors->first('Name') }}</span>
            @endif
        </div>
        <div class="address">
            <input type="text" id="address" placeholder="Enter your Address" name="Address" >
            @if ($errors->has('Address'))
                <span class="danger">{{ $errors->first('Address') }}</span>
            @endif
        </div>
        <div class="mobile">
            <input type="number" id="mobile no." placeholder="Enter your Mobile Number" name="mobileno" >
            @if ($errors->has('mobileno'))
                <span class="danger">{{ $errors->first('mobileno') }}</span>
            @endif
            <input type="text" id="gender" placeholder="Enter your Gender" name="gender" >
            @if ($errors->has('gender'))
                <span class="danger">{{ $errors->first('gender') }}</span>
            @endif
        </div>
        <div class="mobile">
            <input type="number" id="mobile no." placeholder="Enter your Height" name="height" >
            @if ($errors->has('height'))
                <span class="danger">{{ $errors->first('height') }}</span>
            @endif
            <input type="number" id="gender" placeholder="Enter your Weight" name="weight" >
            @if ($errors->has('weight'))
                <span class="danger">{{ $errors->first('weight') }}</span>
            @endif
        </div>
        <div class="mobile">
            <input type="number" id="mobile no." placeholder="Enter your BMI" name="BMI" >
            @if ($errors->has('BMI'))
                <span class="danger">{{ $errors->first('BMI') }}</span>
            @endif
            <input type="text" id="datepicker" placeholder="Enter your Date of Birth" name="DOB" >
            @if ($errors->has('DOB'))
                <span class="danger">{{ $errors->first('DOB') }}</span>
            @endif
        </div>
        <div class="mobile">
            <input type="text" id="mobile no." placeholder="Enter your Email Address" name="email" >
            @if ($errors->has('email'))
                <span class="danger">{{ $errors->first('email') }}</span>
            @endif
            <input type="text" id="gender" placeholder="Enter your Blood Group" name="blood_group" >
            @if ($errors->has('blood_group'))
                <span class="danger">{{ $errors->first('blood_group') }}</span>
            @endif
        </div>  

        <div class="aadhar">
            <input type="number" id="aadhar no." placeholder="Enter your Aadhar Number" name="Aadharno" >
            @if ($errors->has('Aadharno'))
                <span class="danger">{{ $errors->first('Aadharno') }}</span>
            @endif
        </div>
        <div class="photo">
            <label for="myfile">Select Photo : </label>
            <input type="file" id="image" name="image" >
            @if ($errors->has('image'))
                <span class="danger">{{ $errors->first('image') }}</span>
            @endif

            <br><br>
            <label for="myfile">Select Aadhar Card Image : </label>
            <input type="file" id="Aadharimg" name="Aadharimg">
            @if ($errors->has('Aadharimg'))
                <span class="danger">{{ $errors->first('Aadharimg') }}</span>
            @endif
        </div>
        <button type="submit">Submit</button>
    </form>
    <div class="footer">
        <p>All Rights Reserved.</p>
    </div>

        

</body>
</html>
