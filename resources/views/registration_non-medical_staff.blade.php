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
        background-color: #5CDB9566;
        /* justify-content: center; */
        padding: 140px




    }

    .name{
        display: flex;
        flex-wrap: wrap;
        padding: 20px;
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
        padding: 20px;
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
        display: flex;
        flex-wrap: wrap;
        padding: 20px;
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
        padding: 20px;
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
        flex-wrap: wrap;
        padding: 20px;
        padding-left: 70px;
        justify-content: center;
    }
    .photo label{
        font-family: sans-serif;
        font-size: 20px;
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
			left: 35%;
			border-radius: 50px;
		  }
		  button:hover {
		  	opacity: 0.8;
		  }
    </style>
    <title>Registration</title>
</head>
<body>

    @if(\Session::has('success'))
          <div>
              <h4>{{\Session::get('success') }}</h4>
          </div>

    @endif
    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="/register">
        @csrf
        <div class="name">
            <input type="text" id="name" placeholder="Enter your name" name="Name" required>

        </div>
        <div class="address">
            <input type="text" id="address" placeholder="Enter your address" name="Address" required>
        </div>
        <div class="mobile">
            <input type="number" id="mobile no." placeholder="Enter your mobile no." name="mobileno" required>
            <input type="text" id="gender" placeholder="gender" name="gender" required>
        </div>

        <div class="aadhar">
            <input type="number" id="aadhar no." placeholder="Enter your aadhar no." name="Aadharno" required>
        </div>
        <div class="photo">
            <label for="myfile">Select photo : </label>
            <input type="file" id="file1" name="image" required>

            <label for="myfile">Select a aadhar image : </label>
            <input type="file" id="file2" name="Aadharimg" required>

        </div>
        <button type="submit">Submit</button>
    </form>


        

</body>
</html>
