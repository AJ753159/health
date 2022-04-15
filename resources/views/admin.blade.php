<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <style type="text/css">
    *{ 
      padding: 0; 
      margin: 0 
    }
    body{
      background: rgba(131, 103, 123, 0.4);
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
        scroll-behavior: smooth;
        padding: 10% auto 0 5%;
        height: 60%;
        width: 95%;
        justify-content: space-around;      
    }
    .tile1{
        display: flex;
        flex-direction: column; 
        width: 100%;
      }
    .tile{
        margin: 10% 15%;
        display: flex;
        flex-direction: column; 
        width: 80%;
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
      flex-direction: column;
      font-size: 1.2rem;
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
              		<a href="admin_profile">
              			<img class="image" src="pathology/view-profile1.png" style="width: 228px; height: 181px;margin: 5%; background: linear-gradient(0deg, rgba(250, 2, 2, 0.2), rgba(250, 2, 2, 0.2));">
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
              		<a href="generate_login">
              			<img class="image" src="pathology/generate_login1.png" style="width: 243px; height: 192px;margin: 5%; background: linear-gradient(0deg, rgba(255, 31, 165, 0.2), rgba(255, 31, 165, 0.2));">
  	            		<div class="Option2">
  	                		<h5>Generate Login</h5>
  	            		</div>
              		</a>
          		</div>
      		</div>
    		</div>
        <div class="Info-4">
          <div class="tile">
              <div class="icon" style="width: 270px; height: 246px; background: #DBDBDB;" >
                  <a href="view-update_profile">
                    <img class="image" src="pathology/edit_profile1.png" style="width: 243px; height: 192px; margin: 5%; background: linear-gradient(0deg, rgba(46, 67, 253, 0.2), rgba(46, 67, 253, 0.2));">
                    <div class="Option2">
                        <h5>View/update Profile</h5>
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