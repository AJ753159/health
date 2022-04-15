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
        background: rgba(151, 202, 239, 0.5);
        width: 100%;
        position: relative;
        min-height: 100vh;
    }
    .profile_img{
        padding-top: 20px;
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        justify-content: center;

    }
    .table{
        display: flex;
        flex-wrap: wrap;
        width:100%;
        justify-content: center;
        padding-bottom: 40px;

    }
    table{
        border-spacing: 10px;
        width:80%;
        padding: 10px;
        
    }
    tr{
        background: #91C8EF;
        text-align: center;
        
    }
    td{
        padding: 10px;
    }
    th{
        padding: 10px;
    }
    /* table, tr,td {
        text-align: center;
        
        background: #E3AFBC;
        /* border: 5px solid #e8bfcaa6 ; */
        /* border-collapse: collapse; */
        /*  */
    /* } */ 
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
    <title>View Test</title>
</head>
<body>
    @include('flash')
    <div class="table">
      <table>
          <tr>
            <th>Name of Patient</th>
            <th>Test Name</th>
            <th>Date/Time</th>
            <th>Upload Report</th>
          </tr>

        @foreach ($users as $user)
         <tr>
            <form action="/upload/{{ $user->id }}/{{ $data->Employee_ID }}" method="POST" enctype="multipart/form-data">
                @csrf
                <td>{{ $user->{'u_name'} }}</td>
                <td>{{ $user->{'report_name'} }}</td>
                <td>{{ $user->{'date'} }} <br> {{ $user->{'time'} }}</td>
            {{-- <td><button>Choose File</button>{{ $user ->{'report'} }}</td> --}}
            
                <td><input type="file" id="report" name="report" onchange="form.submit()" /></td>
            </form>
         </tr>
         @endforeach
         {{-- <td><button>Choose File</button></td> --}}
      </table>
    </div>

    @include('footer')


</body>
</html>
