<?php

include 'connect.php';
session_start();

$check = 0;

if(isset($_SESSION['cust_id'])){
    $sqla = "SELECT * FROM customer WHERE cust_id=".$_SESSION['cust_id'];
    $result = mysqli_query($conn,$sqla);
    $row  = mysqli_fetch_array($result);
}

$myfile = fopen("url.txt", "r") or die("Unable to open file!");
$url = fgets($myfile);

fclose($myfile);

if(isset($_GET['id'])){
    $sqlb = "SELECT * FROM promotion WHERE promo_id=".$_GET['id'];
    $resultb = mysqli_query($conn,$sqlb);
    $rowb  = mysqli_fetch_array($resultb);
}

$myurl = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$myurl2= parse_url($myurl,PHP_URL_FRAGMENT);

if ( isset( $_SERVER['HTTP_REFERER'] ) && strstr( $_SERVER['HTTP_REFERER'], 'facebook.com' ) ) {
    $check =123;
    if(!isset($_SESSION['cust_id'])){
        header("Location: signin.php");
    }
}

//if ($myurl2 == "!/three"){
//    header("Location: index.php");
//}
//
//echo $myurl2;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Promo</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta property="og:url"           content="<?php echo $url; ?>share.php?id=<?php echo $_GET['id']; ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="PromoAlert - <?php echo $rowb['promo_title']; ?>" />
    <meta property="og:description"   content="Click me and start getting rewards for sharing" />
    <meta property="og:image"         content="<?php echo $url; ?>images/<?php echo $rowb['promo_img']; ?>" />
    <meta property="og:image:width"   content="1200" />
    <meta property="og:image:height"  content="628" />
    <!-- Bootstrap -->
    <!--test-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
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
<!--    <link rel="stylesheet" href="css/bootstrap.min.css">-->
    <link rel="stylesheet" href="css/bootstrap.min.css.map">
    <link rel="stylesheet" href="css/main2.css">
    
    <style>
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
    <nav class="navbar navbar-expand-sm navbar-dark" id="navover">
        <div class="container">
        <a class="navbar-brand m-0 p-0" href="index.php">
            <img src="images/navnav.png" height="30" alt="PromoAlert Logo">
        </a>
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link text-light" href="proapplication.php" id="navi">Want to be a promoter? <b>APPLY HERE</b></a>
                </li>
                <li class="nav-item">
                <?php

                    if ( isset( $_SESSION['cust_id'] ) ) {
                        echo'<a class="nav-link bg-warning text-dark w-100 px-4 font-weight-bold" id="navi" href="myaccount.php">My Account</a>';
                    } else {
                        echo '<a class="nav-link bg-warning text-dark w-100 px-4 font-weight-bold" id="navi" href="signin.php">Log In</a>';
                    }

                 ?>
                </li>
            </ul>
            </div>
        </nav>
<!--
        <h2 class="display-4 text-center text-light mt-5">Join as a promoter!!!</h2>
        <h4 class="text-center  text-light font-weight-normal">Build your profile</h4>
-->         <div class="col-md-5 mx-auto">
            <div class="row mt-5 pt-5" id="mystepper">
            <p class="stepper mx-auto active" id="s1">1</p>
            <p class="stepper disabled" id="s2" disabled>2</p>
            <p class="stepper mx-auto disabled" id="s3" disabled>3</p>
            </div>
    </div>
    </div>
<div class="container">

    

<!--
    <div class="">
    <img src="images/load.gif" alt="loading...">
    </div>
-->
    
    <div class="border m-2" ng-view></div>

    <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <?php
            if ( isset( $_SESSION['cust_id'] ) ) {
                echo '<h4 class="modal-title">Select your prefered platform</h4>';
            }else{
                echo '<h4 class="modal-title">You must be logged in</h4>';
            }
            ?>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

            <?php
            if ( isset( $_SESSION['cust_id'] ) ) {
//                echo '<button id="share-button" title="Facebook" class="btn btn-facebook btn-lg border bg-primary text-light"><i class="fa fa-facebook fa-fw"></i>Facebook</button>';
                echo '<p class=text-muted">If you do not see a link please wait or refresh the page</p>';
                echo '<iframe src="https://www.facebook.com/plugins/share_button.php?href='.$url.'share.php?id='.$_GET['id'].'&layout=button_count&size=large&appId=388469038426420&width=84&height=28" width="84" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>';

            }else{
                echo '<a href="signin.php" class="btn btn-info mx-2 w-25" role="button">Log In</a>';
                echo '<a href="signup.php" class="btn btn-info mx-2 w-25" role="button">Register</a>';
            }
            ?>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" data-dismiss="modal"  id="fb-btn">Next</button>
        </div>

      </div>
    </div>
  </div>

</div>

<?php
if (!isset($_GET['id'])){
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
}

?>
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
<script>
var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "step1.php?id=<?php echo $_GET['id']; ?>"
    })
    .when("/two", {
        templateUrl : "step2.php?id=<?php echo $_GET['id']; ?>"
    })
    .when("/three", {
        templateUrl : "step3.php?id=<?php echo $_GET['id']; ?>&ck=<?php echo $check; ?>"
    });
});
</script>

<script>
document.getElementById('fb-btn').addEventListener('click', function () {
        window.location.hash = '#!two';
        $('#myModal').modal('hide');
        $('#s1').removeClass("active");
        $('#s2').removeClass("disabled");
        $('#s2').addClass("active");
        $('#s1').addClass("disabled");
    });
</script>

<script>
     document.getElementById('share-button').addEventListener('click', function () {
        FB.init({
          appId: '314324989262843', //replace with your app ID
          version: 'v2.3'
        });
        FB.ui({
            method: 'feed',
            name: 'Facebook Dialogs',
            link: "<?php echo $url; ?>/Online-promotion-application/PromoSite/share.php?id=<?php echo $_GET['id']; ?>" ,
            picture: 'http://fbrell.com/f8.jpg',
            caption: 'Reference Documentation',
            description: 'Dialogs provide a simple, consistent interface for applications to interface with users.'
        }, function (response) {
            if (!response) {
                    alert("Sharing Failed. Please try again.");


            }
            else {
                    window.location.hash = '#!two';
                    $('#myModal').modal('hide');
                    $('#s1').removeClass("active");
                    $('#s2').removeClass("disabled");
                    $('#s2').addClass("active");
                    $('#s1').addClass("disabled");
            }
        });
    });
</script>
<script>

if(<?php echo $check; ?> == <?php echo '123'; ?>){

    window.location.hash = '#!three';
    $('#s2').disabled = true;
    $('#s1').removeClass("active");
    $('#s3').removeClass("disabled");
    $('#s3').addClass("active");
    $('#s1').addClass("disabled");

}
</script>
<script>
function back(page) {
    if (page == 1){
        window.location.hash = '#!/';
    }else{
        window.location.hash = '#!two';
    }
}
</script>
<script>
var hash = location.hash.substr(1);

if (hash == "!/two"){
    $('#s1').removeClass("active");
    $('#s2').removeClass("disabled");
    $('#s2').addClass("active");
    $('#s1').addClass("disabled");
}else if (hash == "!/three"){
    $('#s1').removeClass("active");
    $('#s3').removeClass("disabled");
    $('#s3').addClass("active");
    $('#s1').addClass("disabled");
}

</script>

</body>
</html>
