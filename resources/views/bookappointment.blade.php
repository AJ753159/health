<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <style>
        *{ 
            padding: 0; 
            margin: 0 
        }
        html {
            height: 100%;
            overflow: hidden;
            width: 100%;

        }
        body{
            background-color: #E3AFBCA6;
            height: 100%;
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
        .aadhar{
        display: flex;
        flex-wrap: wrap;
        padding: 20px;
        justify-content: center;
    }
    .aadhar input[type=text]{
        width: 70%;
         padding: 12px 20px;
         margin: 8px 0;
         display: inline-block;
         border: 1px solid #ccc;
         box-sizing: border-box;
         border-radius: 30px;
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>
<body>
    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="/register">
        @csrf
        <div class="name">
            <input type="text" id="name" placeholder="Select Department" name="Name" required>

        </div>
        <div class="name">
            <input type="text" id="address" placeholder="Select doctor" name="Address" required>
        </div>
        <div class="name">
            <input type="text" id="gender" placeholder="select time" name="gender" required>
        </div>
        <div class="form-group">
            {{-- {{ Form::label('date', 'Date:') }}
            {{ Form::text('date', $payment->date, array('class' => 'datepicker','id' => 'datepicker')) }}                            --}}
        </div>

        <script type="text/javascript">
            $(function () {
                $( "#datepicker" ).datepicker({
                    todayHighlight: true,
                    autoclose: true,
                });
            });
        </script>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>