<?php
include 'connect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Promo</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0" />
    <!-- Bootstrap -->

    <link rel="icon" type="image/png" href="images/Logo.png"/>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css.map">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css.map">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css.map">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css.map">
    <link rel="stylesheet" href="css/bootstrap.css.map">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css.map">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="header">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="navover">
        <div class="container">
        <a class="navbar-brand" href="#">
            <img src="images/navnav.png" height="30" alt="PromoAlert Logo">
        </a>
          <ul class="navbar-nav">
              <li class="nav-item mr-3">
                    <a class="nav-link" href="proapplication.php">Promoter</a>
                </li>
                <li class="nav-item">
                <?php

                    if ( isset( $_SESSION['cust_id'] ) ) {
                        echo'<a class="nav-link" href="myaccount.php">My Account</a>';
                    } else {
                        echo '<a class="nav-link" href="signin.php">Log In</a>';
                    }

                 ?>
                </li>
            </ul>
            </div>
        </nav>
    </div>
    
    <div class="wrapper"></div>
    
<!-- Footer -->
<footer class="page-footer bg-secondary font-small mt-5 pt-4">
  <div class="container-fluid text-center text-md-left">
    <div class="row mx-auto">
      
        <hr class="clearfix w-100 d-md-none pb-3">
        <div class="col-md-1"></div> 
      <div class="col-md-5 mb-md-0 mb-3">
        <h5 class="text-uppercase text-white font-weight-bold">Contact Us</h5>
          <hr class="bg-light w-50 ml-0"/>
        <p class="text-white">
            <b>Jimsley Lim</b><br/>
            +6016-889 7598
            <br/>
            <br/>
            <b>Nicholas Bong</b><br/>
            +6016-816 2962</p>
          <br/>
          <br/>

      </div>
        <div class="col-md-5 mt-md-0 mt-3">
        <h5 class="text-uppercase text-white font-weight-bold">Introducing Xense,</h5>
            <hr class="bg-light w-50 ml-0"/>
        <p class="text-white"><b>A fusion of technology and human senses.</b><br/>From programmers to business developer, Xense comprises of talented and excellence-driven individuals with high enthusiasm in the development of technology solution. 
        We aim high at embracing technology with a passion for sustainability, innovation and empowerment by using our creative gifts that drives this foundation.</p>
          <br/>
          <br/>

      </div>
    </div>
  </div>

  <!-- Copyright -->
  <div class="footer-copyright text-white bg-dark text-center py-3">© 2019 Copyright:
    <a href="#"> Xense.com</a>
  </div>
  <!-- Copyright -->

</footer> 
  <!-- Copyright -->

</footer>
</body>
</html>