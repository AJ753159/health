<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor/Nurse Dashboard</title>
	<!-- <link href="/../hrms/mainT.css" rel="stylesheet" type="text/css" /> -->
  <style type="text/css">
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
            background-color: #CAB1A5;
        }
        .table{
        /* display: flex;
        flex-wrap: wrap;
        width:50%;
        justify-content: center;
        background-color: white; */
        
        /* padding: 20px; */
            position: absolute;
            /* display: flex; */
            flex-wrap: wrap;
            /* width:50%; */
            /* justify-content: center; */
            width: 869px;
            height: 303px;
            left: 286px;
            top: 100px;
            /* justify-content: center; */
            background: #FFFFFF;
            /* align-items: center; */
    }
    table{
        border-spacing: 10px;
        border-spacing: 10px;
        padding-top: 100px;
        padding-left: 300px;
        /* width: 50%; */
        /* align-items: center; */
        text-align: center;
}
        
    }
    tr{
        
    }
    td{
        padding: 10px;
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

        @media screen and (max-width:500px){
          .image1{
            height: 100px;
            width: 200px;
          }
          .image2{
            width: 50px;
            /* right: 0%; */
            left: 100%;
          }
        }

  </style>
  <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500&display=swap" rel="stylesheet"> -->
</head>
<body>
    <div class="table">
    <table>
        @foreach ($users as $user)
        <tr>
           <td>{{ $user->{'report_name'} }}</td>
           <td><button onclick="window.location.href = '/downloadFile/{{ $user->report }}';">Download Report</button></td>
         </tr>
        @endforeach
    </table>
    </div>
    <div class="footer">
        <p>All Rights Reserved!</p>
    </div>
</body>
</html>