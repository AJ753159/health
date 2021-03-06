<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient</title>
	{{-- <link href="mainT.css" rel="stylesheet" type="text/css" /> --}}
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
        background: rgba(227, 175, 188, 0.65);
        height: 100%;
    }
    .header{
        display:flex;
        position: relative;
        top: 0;
        display: flex;
    }
    a{
      text-decoration: none;
    }
    h2{
      bottom: 50px;
      right: 200px;
      position: absolute;
    }
    .mainarea1{
        display: flex;
        flex-wrap: wrap;
        overflow-y:  scroll;
        scroll-behavior: smooth;
        padding: 10% auto 0 5%;
        height: 75%;
        width: 95%;
        padding-left: 5%;
        justify-content: space-around;
    }

    .tile1{
        display: flex;
        flex-direction: column; 
        width: 100%;
      }

    .tile2{
        margin: 10% 15%;
        display: flex;
        flex-direction: column; 
        width: 85%;
      }
    .tile{
        margin: 10% 15%;
        display: flex;
        flex-direction: column; 
        width: 100%;
      }
    .icon a{
      color: black;
    }

    .image1{
      width: 320px; 
      height: 100px;
    }
    .image2{
      width: 70px; 
      height: 69px;
      position: absolute; 
      right: 50px; 
      padding: 1%;
    }

    .image{
      height: 50%;
      width: 60%;
      flex-direction: column;
    }


    .image:hover{

      filter: drop-shadow( 0 0  .40rem rgba(0,0,0,0.55));

    }


    .Option2{
      text-align: center;
    }

    .Option1{
     width:95%;
      font-size: 1.2rem;
      text-align: center;
      flex-direction: column;
    }

    .Info-1{
      flex: 1;
      flex-basis: 30%;
      margin-top: 3%;

    }
    .Info-2{
      flex: 1;
        /* flex-basis: 30%; */
        margin-top: 3%;
    }

    .Info-3{
      flex: 1;
      flex-basis: 30%;
      margin-top: 10%;

    }
    .Info-4{
      flex: 1;
      flex-basis: 30%;
    }

    .Info-5{
      flex: 1;
      flex-basis: 30%;
      margin-top: 10%;
    }
    .Info-6{
      flex-basis: 30%;
      margin-bottom: 3%;
    }
    

    @media screen and (max-width:500px){
      .image1{
        height: 100px;
        width: 200px;
      }
      .image2{
        width: 50px;
        left: 100%;
      }
    }   

  </style>
</head>
<body>
  @include('flash')
    <div class="header">
      <div class="Info-1">
        <div class="tile1">
            <div class="icon">
                <a href="">
                  <img class="image1" src="pathology/Logo-removebg-preview.png">
                </a>
            </div>
        </div>
      </div>
      <div class="Info-2">
        <div class="tile1">
          <div class="icon">
            <h2>{{ $data -> {'Name'} }}</h2>
            <a href="logout">
              <img class="image2" src="pathology/Logout-removebg-preview.png">
            </a>
          </div>
        </div>
      </div>
    </div>
	<div class="mainarea1">
 		<div class="Info-3">
    	<div class="tile" style="width: 70%; ">
      	<div class="icon" style="width: 262px; height: 245px; background: #DBDBDB; text-align: center;">
      		<a href="patient_profile">
      			<img class="image" src="pathology/view-profile1.png" style="width: 150px; height: 146px; margin: 5%; ">
      			<div class="Option1">
      				<h5>View Profile</h5>
  				  </div>
      		</a>
  		  </div>
  		</div>
		</div>
		<div class="Info-4">
  		<div class="tile2">
    			<div class="icon" style="width: 261px; height: 246px; background: #DBDBDB; text-align: center;" >
          		<a href="book_appointment">
          			<img class="image" src="pathology/appointment.png" style="width: 214px; height: 175px; margin: 5%; ">
            		<div class="Option2">
                	<h5>Book Appointment</h5>
            		</div>
          		</a>
      		</div>
  		</div>
		</div>
    <div class="Info-5">
      <div class="tile2">
          <div class="icon" style="width: 262px; height: 245px; background: #DBDBDB; text-align: center;" >
              <a href="book_test">
                <img class="image" src="pathology/Pathology.jpg" style="width: 218px; height: 173px; margin: 5%; ">
                <div class="Option2">
                    <h5>Book Pathology Test</h5>
                </div>
              </a>
          </div>
      </div>
    </div>
    <div class="Info-6">
      <div class="tile2">
          <div class="icon" style="width: 261px; height: 230px; background: #DBDBDB; text-align: center;" >
              <a href="view_report">
                <img class="image" src="pathology/view_report1.png" style="width: 150px; height: 145px; margin: 5%;">
                <div class="Option2">
                    <h5>View Report</h5>
                </div>
              </a>
          </div>
      </div>
    </div>
  </div>    
  @include('footer')
</body>
</html>