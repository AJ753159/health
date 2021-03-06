<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="home.css"> -->
    <style type="text/css">
        *{
    padding: 0;
    margin: 0;
}
body{
    background: #6798FF4D;
    width: 100%;
    position: relative;
    min-height: 100vh;
}
.rect1{
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    width: 100%;
}
.rect1 img{
    width: 320px; 
    height: 100px;    
    padding-left: 40px;
}
.rect2{
    display: flex;
    flex-wrap:wrap ;
    background: #D0D9EC;
    width: 100%;
    justify-content: center;

}
.rect2 marquee{
    font-family: sans-serif;
    font-size: 30px;
    padding-top: 10px;
    padding: 10px;
}
.rect3{
    display: flex;
    flex-wrap: wrap;
    background: #6798FF80;
    width: 100%;
    justify-content:space-around;

}
.rect3> .img1{
    padding: 40px;
}
.rect3> .slogan{
    font-size:20px;
    font-family: sans-serif;
    padding-top: 175px;
    padding-bottom: 100px;
    padding-right: 120px;

}
.rect4{
    display: flex;
    flex-wrap:wrap ;
    background: #D0D9EC;
    width: 100%;
    justify-content: center;

}
.rect4 p{
    font-family: sans-serif;
    font-size: 30px;
    padding-top: 10px;
    padding: 10px;
}
.rect5{
    display: flex;
    flex-wrap: wrap;
    background: #6798FF4D;
    width: 100%;
    justify-content:space-around;

}
.rect5 img{
    padding-top: 50px;
    /* padding-bottom: 75px; */
    padding-left: 120px;
    padding-right: 120px;
    width: 200px;
}
/* .rect5 a:hover:after {
  content: attr(title);
} */
.rect6{
    display: flex;
    flex-wrap: wrap;
    background: #6798FF4D;
    width: 100%;
    /* justify-content:space-around; */
    justify-content: center;

}
.rect6 img{
    padding-top: 50px;
    padding-bottom: 50px;
    padding-left: 220px;
    padding-right: 220px;
    width: 200px;
}
.rect7{
    display: flex;
    flex-wrap:wrap ;
    background: #D0D9EC;
    width: 100%;
    justify-content: center;

}
.rect7 p{
    font-family: sans-serif;
    font-size: 30px;
    padding-top: 10px;
    padding: 10px;
}
.rect8{
    display: flex;
    flex-wrap: wrap;
    background: #6798FF80;
    width: 100%;
    justify-content:space-around;

}
.rect8 img{
    height: 150px;
    width: 200px;
    padding: 10px;
    padding-top: 50px;
    padding-bottom: 50px;
}
.rect9{
    display: flex;
    flex-wrap:wrap ;
    background: #575459;
    width: 100%;
    justify-content: center;

}
.rect9 p{
    font-family: sans-serif;
    font-size: 30px;
    padding-top: 10px;
    padding: 10px;
}
.footer{
    background: #575459;
    width: 100%;
    height: 10vh;
    /* position: fixed; */
    bottom:0;
    display: flex;
    align-items: center;
    justify-content: center;
}
.footer p{
    color: white;

}



    </style>
    <title>HealthCare</title>
</head>
<body>
    <div class="rect1">
        <img src="pathology/Logo-removebg-preview.png" alt="Logo">
    </div>
    <div class="rect2">
        <marquee>Announcements</marquee>
    </div>
    <div class="rect3">
        <div class="img1"  >
            <img src="pathology/Homepage.jpg" alt="img1" style="width: 600px;height: 350px;">
        </div>
        <div class="slogan">
            <h1><span>Stay</span> safe, <span>Stay</span> healthy</h1>
            <h1>Caring for you!!</h1>
        </div>
    </div>
    <div class="rect4">
        <p>Greetings!!!</p>
    </div>
    <div class="rect5">
        <a href="staff_login"><img src="pathology/doctor.png" alt="doctor" title="Doctor Login"></a>
        <a href="patient_login"><img src="pathology/patient.png" alt="patient" title="Patient Login"></a>
        <a href="staff_login"><img src="pathology/Pathology.png" alt="pathology" title="Pathology Login"></a>
    </div>

    <div class="rect6">
        <a href="staff_login"><img src="pathology/Ellipse 4.png" alt="reception" title="Reception Login"></a>
        <a href="staff_login"><img src="pathology/Ellipse 5.png" alt="admin" title="Admin Login"></a>
    </div>
    <div class="rect7">
        <p>Our Facilities</p>
    </div>
    <div class="rect8">
        <img src="pathology/img1.jpg">
        <img src="pathology/img2.jpg">
        <img src="pathology/img3.jpg">
        <img src="pathology/img4.jpg">
        <img src="pathology/img5.jpg">
    </div>
    @include('footer')


</body>
</html>
