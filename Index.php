<?php

include('server.php');

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <title>INDEX</title>
</head>
<style type="text/css">
  *{
    padding: 1px;
}
html {
  scroll-behavior: smooth;
}
.contact-form{
    background: #fff;
    margin-top: 1%;
    margin-bottom: 5%;
    width: 77%;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 6rem;
    width: 11%;
    margin-top: -3%;
    transform: rotate(29deg);
}
.contact-form form{
    padding: 14%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: -10%;
    text-align: center;
    color: #0062cc;
}
.contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #0062cc;
    border: none;
    cursor: pointer;
}
.row{
   color: white;
   margin-top:40px;
}
</style>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php"><img src="Assets/Images/logogar.png" width="100px" height="40px">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#services">Services</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#contact">Contact us</a>
        </li>
    </ul>
    <span class="navbar-text">
       <a href="Login.php"><button class="btn btn-outline-primary">Sign In</button></a>
   </span>
</div>
</nav>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
</ol>
<div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="Assets/images/c1.jpg" style=" height:650px; opacity: 0.8; filter: brightness(100%);" class="c" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
    </div>
</div>
<div class="carousel-item">
  <img class="d-block w-100" src="Assets/images/c2.jpg" style=" height: 650px; opacity: 0.8; filter: brightness(100%);" class="c" alt="Second slide">
  <div class="carousel-caption d-none d-md-block">
</div>
</div>
</div>
</div>
</div>
<div id="services" class="row" style="justify-content: center">
    <div class="card col-md-3 col-12">
        <div class="card-content">
            <div class="card-body"> <img class="img" src="Assets/Images/2.png" width="100px"/>
                <div class="shadow"></div>
                <div class="card-title">Our Mission </div>
                <div class="card-subtitle">
                    <p> <small class="text-muted">Our mission is to develop and deliver innovative, environmentally responsible technology solutions that empower businesses and individuals to thrive in a sustainable, connected world. We are dedicated to providing top-notch products and services that improve energy efficiency, reduce waste, and promote environmental stewardship. We value integrity, quality, and customer satisfaction, and we strive to make a positive impact on society and the planet.</small> </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card col-md-3 col-12 ml-2">
        <div class="card-content">
            <div class="card-body"> <img class="img" src="https://i.imgur.com/xUWJuHB.png" />
                <div class="card-title"> Our Vision </div>
                <div class="card-subtitle">
                    <p> <small class="text-muted"> To be a globally recognized leader in sustainability, innovation, and customer satisfaction. We envision a future where our products and services contribute to a more sustainable and prosperous world, creating value for our customers, employees, and stakeholders. </small> </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card col-md-3 col-12 ml-2">
        <div class="card-content">
            <div class="card-body"> <img class="img" src="Assets/Images/1.png" width="100px" />
                <div class="card-title"> We're available </div>
                <div class="card-subtitle">
                    <p> <small class="text-muted"> We are available 24/7. You can mark your attendance any time you want. All your reports will be sent to admins. </small> </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container contact-form" id="contact">
  <form method="post">
    <h3>Drop Us a Message <i class="fas fa-phone"></i></h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" required name="name" class="form-control" placeholder="Your Name *" value="" />
            </div>
            <div class="form-group">
                <input type="email" required name="email" class="form-control" placeholder="Your Email *" value="" />
            </div>
            <div class="form-group">
                <input type="number" required name="phone" class="form-control" placeholder="Your Phone Number *" value="" />
            </div>
            <div class="form-group">
                <input type="submit" required name="send_message" class="btnContact" value="Send Message" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <textarea name="message" required class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
            </div>
        </div>
    </div>
</form>
</div>
<hr>
<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2023 Copyright:
    <a href="index.php">PT.GAR</a>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>