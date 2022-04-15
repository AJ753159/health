<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor/Nurse Dashboard</title>
  <style type="text/css">
    *{ 
      padding: 0; 
      margin: 0 
    }
    body{
        background-color: #CAB1A5;
        position: relative;
        min-height: 100vh;
    }
    .header1{
        align-items: center;
        display:flex;
        flex-wrap: wrap;
    }
    a{
      text-decoration: none;
    }
    .mainarea{
        display: flex;
        flex-wrap: wrap;
        /* overflow-y:  scroll; */
        scroll-behavior: smooth;
        padding: 10% auto 0 5%;
        height: 60%;
        width: 95%;
        padding-left: 5%;
        justify-content: space-around;      
    }
    .tile1{
        display: flex;
        flex-direction: column; 
        width: 90%;
      }
    .tile{
        margin: 10% 15%;
        display: flex;
        flex-direction: column; 
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
    .Option1{
      width:95%;
      font-size: 1.2rem;
      text-align: center;
      flex-direction: column;
    }
    .Option2{
      width:95%;
      text-align: center; 
      flex-direction: column;
      font-size: 1.2rem;
    }



    .Info-1{
      flex: 1;
      flex-basis: 30%;
      margin-top: 3%;

    }
    .Info-2{
      flex: 1;
      margin-top: 3%;
    }

    .Info-3{
      flex: 1;
      flex-basis: 30%;
      margin-top: 3%;

    }
    .Info-4{
      flex: 1;
      flex-basis: 30%;
      margin-top: 3%;
    }

    @media screen and (max-width:500px){
      .image1{
        height: 100px;
        width: 200px;
      }
      .image2{
        width: 50px;
        left: 90%;
      }
    }

  </style>
</head>
<body>
  @include('flash')
  <div class="container">
    <div class="mainarea">
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
            <a href="logout">
                  <img class="image2" src="pathology/Logout-removebg-preview.png">
                </a>
            </div>
        </div>
      </div>
    </div>
  	<div class="mainarea">
   		<div class="Info-3">
      	<div class="tile" style="width: 70%; ">
        	<div class="icon" style="width: 262px; height: 245px; background: #DBDBDB;  ">
            <a href="doctor_profile">
              <img class="image" src="pathology/doctor_profile.jpg" style="width: 228px; height: 181px;padding: 5%; ">
              <div class="Option1">
                <h5>View Profile</h5>
              </div>
            </a>
          </div>
      	</div>
    	</div>
    		<div class="Info-4">
      		<div class="tile">
        			<div class="icon" style="width: 270px; height: 246px; background: #DBDBDB;" >
              		<a href="view_appointment">
              			<img class="image" src="pathology/view_appointment.jpg" style="width: 243px; height: 182px; padding: 5%;">
  	            		<div class="Option2">
  	                		<h5>View Appointment</h5>
  	            		</div>
              		</a>
          		</div>
      		</div>
    		</div>
    </div>    
  </div>
  @include('footer')

</body>
</html>