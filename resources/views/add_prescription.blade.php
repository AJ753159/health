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
        $( "#datepicker" ).datepicker({ minDate: 0, maxDate: "0D", dateFormat: 'yy-mm-dd' });
        
    } );
    </script>
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
    input[type=text]{
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
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
        padding-bottom: 20px;
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
    textarea {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        resize: vertical;
    }   
    </style>
    <title>Admin Profile</title>
</head>
<body>
    <form action="/add_prescription/{{ $items->appointment_id }}" method="post" enctype="multipart/form-data">
    @csrf  
        <div class="table">
            <table>
                <tr style="background: rgba(251, 201, 177, 0.9);">
                    <th>Date <br> visited</th>
                    <th>Prescribtion</th>
                    <th>Appointment ID</th>
                </tr>
                <tr>
                    <td style="text-align: center"><input type="text" id="datepicker" name="date_visited" value="{{ $items-> {'date_visited'} }}" /></td>
                    <td><textarea name="prescription" value="{{ $items-> {'prescription'} }} "></textarea></td>
                    <td>{{ $items->{'appointment_id'} }}</td>
                </tr>
                <tr style="background: none; text-align: center">
                    <td colspan="3"><button type="submit"> Update Prescription</button></td>
                </tr>
            </table>
        </div>
    </form>
    @include('footer')
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
</body>
</html>
