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
        /* padding: 20px; */

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
    <title>View Report</title>
</head>
<body>
    <div class="table">
      <table>
          <tr>
            <th>Sr No.</th>
            <th>Name of Patient</th>
            
            <th>Time</th>
    
          </tr>
        <tr>
          <td>1</td>
          <td>Sanjay Ahire</td>
          <td>09:00</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Manisha Kotak</td>
            <td>10:30</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Prem Singh</td>
            <td>11:00</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Sanika Patil</td>
            <td>13:00</td>
        </tr>
      </table>
    </div>

    <div class="footer">
        <p>All Rights Reserved!</p>
    </div>


</body>
</html>
