
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Promo</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    
<!-- Open Graph-->
    <meta name="twitter:card"         content="summary" />
    <meta property="og:url"           content="https://onlinepromoapp.firebaseapp.com/sharing.html" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="PromoAlert" />
    <meta property="og:description"   content="Get Exclusive Promotions for sharing your love for your favourite brands" />
    <meta property="og:image"         content="<?php echo $_GET['image'];?>"/>

    <!-- Bootstrap -->
    <!--test-->
    <!--#######################################    -->
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css.map">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/main.css">
    

    
    <style>
/*
        .header{
            background-image: url('images/cp.png');
            background-repeat:no-repeat;
            background-size: 100% auto;
            background-position: center;
            background-attachment: fixed;
            background-color: black;
            opacity: 0.9;
            height: 310px;
        }
        #navover{
            background-image: linear-gradient(to top, rgba(255,0,0,0), black);
        }
    
        #navi{
            font-size: 0.9em;
        }
*/
        
    </style>
</head>
<body ng-app="myApp">
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>




<div class="header">
    <div id="navup" class="d-flex justify-content-end">
    <ul class="list-group list-group-horizontal">
      <li class="list-group-item bg-transparent border-0 p-0 m-0"><p class="text-light m-0"><i class="fa fa-mobile fa-lg" aria-hidden="true"> </i> <a href="#" style="color: white;"> Get the App</a></p></li>
      <li class="list-group-item bg-transparent border-0 p-0 m-0"><p class="mx-2 mb-0" style="color: white;"><b> | </b> </p></li>
      <li class="list-group-item bg-transparent border-0 p-0 m-0"><p class="text-light m-0 mr-5"> <a href="proapplication.html" style="color: white;"> Apply for promoter account</a></p></li>
      
    </ul>
    </div>
    <nav class="navbar navbar-expand-sm navbar-dark" id="navover">
        <div class="container">
        <a class="navbar-brand" href="#">
            <img src="images/navy.png" height="30" alt="PromoAlert Logo">
        </a>
            
          <ul class="navbar-nav">
                <li class="nav-item mr-3 loggedBoth" style="display: none;">
                  <form class="form-inline" action="/action_page.php">
                    <input class="form-control col-md-9" type="text" placeholder="Search">
                    <button type="button" class="btn btn-success col-md-1 ml-1 my-auto" id="search" ><i class="fa fa-search p-0"></i></button>
                  </form>
                </li>
                <li class="nav-item loggedIn" style="display: none;">
                    <a class="nav-link text-light font-weight-bold"  href="myaccount.html" id="account">My Account</a>
                </li>
                <li class="nav-item loggedIn" style="display: none;">
                    <a class="nav-link text-light font-weight-bold"  href="#" id="logout">Logout</a>
                </li>
                <li class="nav-item loggedOut" style="display: none;">
                    <a class="nav-link text-light font-weight-bold"  href="signup.html" id="account">Sign Up</a>
                </li>
                <li class="nav-item loggedOut" style="display: none;">
                    <a class="nav-link text-light font-weight-bold"  href="signin.html" id="account">Log In</a>
                </li>
            </ul>
            </div>
        
        </nav>
    <div style="background-color: white;">
    <ul class="list-group list-group-horizontal container">
      <li class="list-group-item border-0"><a class="text-muted" href="#">Featured</a></li>
      <li class="list-group-item border-0"><a class="text-muted" href="#">Promoters</a></li>
      <li class="list-group-item border-0"><a class="text-muted" href="#">Promotions</a></li>
      <li class="list-group-item border-0"><a class="text-muted" href="#">About</a></li>
    </ul>
    </div>
    
    </div>
    
<div class="container">
    <div class="row mt-5">
        <div class="col-md-5 mx-auto border text-center" id="success" style="display:none;">
            <h3 class="mt-5">You have successfully claimed this promotion!!!</h3>
            <div class="p-5 mx-5" id="qrcode"></div>
            <p class="font-weight-bold mb-1">Take this code to your nearest corresponding store to claim.</p>
            <p class="text-muted">This code will be saved to your QR vault in 'My Account'</p>
            <a class="btn btn-warning btn-lg btn-block mb-4" role="button" href="myaccount.html" aria-disabled="true">Go to My Account</a>
        </div>
        <div class="col-md-5 mx-auto border bg-light text-center" id="fail" style="display:none;">
            <h3 class="mt-5">Please log in to proceed</h3>
            <a class="btn btn-warning btn-block w-100 mb-4" role="button" href="signin.html" aria-disabled="true">Sign In</a>
        </div>
        <div class="col-md-5 mx-auto border text-center" id="collected" style="display:none;">
            <h3 class="mt-5">I appears you have already claimed this promotion</h3>
            <p>Please check your QR Vault for the QR code</p>
            <a class="btn btn-warning btn-lg btn-block mb-4" role="button" href="myaccount.html" aria-disabled="true">Go to My Account</a>
        </div>
    </div>
</div>


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
<script src="js/jquery.min.js"></script>
<script src="js/qrcode.min.js"></script>

<script>



</script>
<script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-functions.js"></script>
<script>
    var firebaseConfig = {
        apiKey: "AIzaSyCA_sMgKuNxk2ngSqJRSX8aAvmrn80fBPo",
        authDomain: "onlinepromoapp.firebaseapp.com",
        databaseURL: "https://onlinepromoapp.firebaseio.com",
        projectId: "onlinepromoapp"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    // make auth and firebase ref
    const auth = firebase.auth();
    const db = firebase.firestore();
    const functions = firebase.functions();


    //UPLOADCARE
    UPLOADCARE_LOCALE = "en";
    UPLOADCARE_LIVE = "false";
    UPLOADCARE_PUBLIC_KEY = "f49b7b74d9cfddb1eb86";



</script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js" charset="utf-8"></script>
<script src="scripts/auth.js"></script>
<script src="scripts/sharing.js"></script>

</body>
</html>
