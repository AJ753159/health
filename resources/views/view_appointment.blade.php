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
        background-color: #CAB1A5;
        width: 100%;
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
    }
    table{
        border-spacing: 10px;
        width:70%;
        padding: 10px;
    }
    tr{
        background: #DEC7BC;
        text-align: center;
    }
    td{
        padding: 10px;
    }
    th{
        padding: 10px;
    }
    a:link, a:visited {
        color: black;
        text-align: center;
        text-decoration: none;
    }
    </style>
    <title>View Report</title>
</head>
<body>
    <div class="table">
      <table>
        <tr>
            <th>Aadhar No.</th>
            <th>Name of Patient</th>
            <th>Date &  Time</th>
        </tr>
        @foreach ($users as $item)
        <tr>
            <td><a href="/prescription/{{ $item->id }}">{{ $item->{'Aadharno'} }}</a></td>
            <td> {{ $item->{'u_name'} }}</td>
            <td>{{ $item->{'date'} }} &nbsp;{{ $item->{'time'} }}</td>
        </tr>
        @endforeach
      </table>
    </div>
    @include('footer')
</body>
</html>
