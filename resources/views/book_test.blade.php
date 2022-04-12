<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#datepicker" ).datepicker({ minDate: 1, maxDate: "+10D", dateFormat: 'yy-mm-dd' });
        
    } );
    </script>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    {{-- <script src="jquery-timepicker/jquery.timepicker.min.js">  
    </script>   --}}
    <script>
        $(document).ready(function(){  
            $('#timepicker').timepicker({
                timeFormat: 'HH:mm:ss',
                interval: 30,
                minTime: '09:00',
                maxTime: '18:00',
                // defaultTime: '11',
                startTime: '09:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });     
        });  
    </script>


    <style type="text/css">
    *{
        padding: 0;
        margin: 0;
    }
    body{
        width: 100%;
        background: #E3AFBCA6;x
    }
    .container{
        /* padding: 10px; */
    }
    .select_dept{
        display: flex;
        flex-wrap: wrap;
        padding: 20px;
        justify-content: center;
    }
    .select_doct{
        display: flex;
        flex-wrap: wrap;
        padding: 20px;
        justify-content: center;
    }
    .time{
        display: flex;
        flex-wrap: wrap;
        padding: 20px;
        justify-content: center;
    }
    select{
        width: 500px;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        /* border-radius: 30px; */
    }
    button{
        background: #A8ADD9;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border:none;
        cursor: pointer;
        width: 150px;
        position: relative;
        left: 45%;
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
    input{
        width: 500px;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        /* border-radius: 30px; */
    }
    .date{
        display: flex;
        flex-wrap: wrap;
        padding: 20px;
        justify-content: center;
    }
    
    </style>
    <title>Book Test</title>
</head>
<body>
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <form class="modal-content animate" name="Book Test" action="/booktest" method="POST" >
        @csrf
        {{-- <input type="number" id="aadhar no." placeholder="Enter your aadhar no." value="{{ $data -> {'Aadharno'} }}" name="Aadharno" required disabled hidden> --}}
        <div class="select_dept">
            <select id="test" name="test_id" required>
                <option value="0" selected disabled >Select Test</option>
                @foreach ($user as $item)
                    <option value="{{ $item->{'test_id'} }}">{{$item->{'test_name'} }}</option>
                @endforeach 
            </select>
        </div>
        <div class="select_dept">
            <select id="test" name="appointment_id" required>
                <option value="0" selected disabled >Select Appointment ID</option>
                @foreach ($user1 as $item)
                    <option value="{{ $item->{'appointment_id'} }}">{{$item->{'appointment_id'} }}</option>
                @endforeach 
            </select>
        </div>
        <div class="date">
            <input type="text" id="datepicker" name="date" placeholder="Select Appointment Date">
        </div>
        <div class="time">
            <input type='text' id="timepicker" name="time" placeholder="Select Appointment Time" required />
        </div>
        <button type="submit">Submit</button>
    </form>
    <div class="footer">
        <p>All Rights Reserved!</p>
    </div>
   
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
</body>
</html>
