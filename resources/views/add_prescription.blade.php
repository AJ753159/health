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
        /* border-radius: 30px; */
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
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <form action="/add_prescription/{{ $items->appointment_id }}" method="post" enctype="multipart/form-data">
    @csrf  
    <div class="table">
    <table>
        <tr style="background: rgba(251, 201, 177, 0.9);">
            {{-- <th>Department</th> --}}
            <th>Date <br> visited</th>
            <th>Prescribtion</th>
            <th>Report</th>
        </tr>

        <tr>
            {{-- <td>{{ $user-> {'department'} }}</td> --}}
            <div class="date">
                
            </div>
            <td style="text-align: center"><input type="text" id="datepicker" name="date_visited" value="{{ $items-> {'date_visited'} }}" /></td>
            <td><textarea name="prescription" value="{{ $items-> {'prescription'} }} "></textarea></td>
            <td>{{ $items->{'appointment_id'} }}</td>
            
            {{-- <td><img src= "report/{{ $user ->{'report'} }}" style="width: 206px;height: 203px;" /></td> --}}
        </tr>

        <tr style="background: none; text-align: center">
            <td colspan="3"><button type="submit"> Upadate Prescription</button></td>
        </tr>
    </table>
    </div>
    </form>
    {{-- @endif --}}
    <div class="footer">
        <p>All Rights Reserved.</p>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
</body>
</html>
