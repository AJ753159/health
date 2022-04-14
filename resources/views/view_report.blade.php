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
        background: rgba(227, 175, 188, 0.65);
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
        /* padding: 20px; */

    }
    table{
        border-spacing: 10px;
        width:80%;
        padding: 10px;
        
    }
    tr{
        background: #E3AFBC;
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
    a:link, a:visited {
  /* background-color: #f44336; */
  color: black;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
    .footer p{
        color: white;

    }
    </style>
    <title>View Report</title>
</head>
<body>
    <div class="table">
      <table>
          <tr>
            <th>Sr no.</th>
            <th>Date</th>
            <th>Test Name</th>
            <th>Report</th>
          </tr>
          @foreach ($users as $user)
         <tr>
            <td>{{ $user->{'id'} }}</td>
            <td>{{ $user->{'date'} }}</td>
            <td>{{ $user->{'report_name'} }}</td>
            <td><button onclick="window.location.href = '/downloadFile/{{ $user->report }}';">Download Report</button></td>
            
            {{-- <td><img src= "report/{{ $user ->{'report'} }}" style="width: 206px;height: 203px;" /></td> --}}
         </tr>
         @endforeach
        {{-- <tr>
          <td>1</td>
          <td>14-12-2021</td>
          <td>LFT</td>
          <td><button>View Document </button></td>
        </tr>
        <tr>
            <td>2</td>
            <td>15-11-2021</td>
            <td>Urine Test</td>
            <td><button>View Document </button></td>
        </tr>
        <tr>
            <td>3</td>
            <td>10-04-2021</td>
            <td>Malaria Test</td>
            <td><button>View Document </button></td>
        </tr>
        <tr>
            <td>4</td>
            <td>14-12-2020</td>
            <td>CBC</td>
            <td><button>View Document </button></td>
        </tr> --}}
      </table>
    </div>

    <div class="footer">
        <p>All Rights Reserved!</p>
    </div>


</body>
</html>
