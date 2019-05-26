<?php
include 'connect.php';
session_start();

// define variables and set to empty values
$app_name = $app_desp = $app_email = $app_pass = $app_cpass = $msg = $app_key = $app_date = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $app_name = test_input($_POST["app_name"]);
    $app_desp = test_input($_POST["app_desp"]);
    $app_email = test_input($_POST["app_email"]);
    $app_pass = test_input($_POST["app_pass"]);
    $app_cpass = test_input($_POST["app_cpass"]);

    if($app_name=="" || $app_desp=="" || $app_email=="" || $app_pass=="" || $app_cpass==""){
        $msg .= "<br/><h5 class='col-md-12 text-center bg-info text-white py-2'>Please Fill Every Box.</h5>";
    }else{

        if($app_pass != $app_cpass){
            $msg .= "<br/><b>Passwords do not match.</b>";
        }


        if(!empty($_POST['app_key'])) {
        $checked_count = count($_POST['app_key']);
    //    echo "You have selected following ".$checked_count." option(s): <br/>";
            foreach($_POST['app_key'] as $selected) {
                $app_key .= " ".$selected;
            }
        }else{
            $msg .= "<br/><b>Please Select Atleast One Keyword.</b>";
        }


        if(!isset($_POST['app_cover'])) {

            if(file_exists('uploadedimage/' . $_FILES['app_cover']['name'])){
                $msg .= "<br/><b>File with that name already exists.</b>";
            }else{

            $destFile = "uploadedimage/".$_FILES['app_cover']['name'];
            move_uploaded_file( $_FILES['app_cover']['tmp_name'], $destFile );
            $app_cover = $_FILES['app_cover']['name'];
            }

        }else {
            $msg .= "<br/><b>Please Select A Cover Image.</b>";
        }

        if(!isset($_POST['app_profile'])) {

            if(file_exists('uploadedimage/' . $_FILES['app_profile']['name'])){
                $msg .= "<br/><b>File with that name already exists.</b>";
            }else{

            $destFile = "uploadedimage/".$_FILES['app_profile']['name'];
            move_uploaded_file( $_FILES['app_profile']['tmp_name'], $destFile );
            $app_profile = $_FILES['app_profile']['name'];
            }

        }else {
            $msg .= "<br/><b>Please Select A Profile Image.</b>";
        }
    }

    if($msg == ""){
        $app_date = date("Y/m/d");
        $sql = "INSERT INTO application (app_email, app_username, app_password, app_desp, app_profile, app_cover, app_key, app_date) VALUES ('".$app_email."', '".$app_name."', '".$app_pass."', '".$app_desp."', '".$app_profile."', '".$app_cover."', '".$app_key."', '".$app_date."')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Your application has been submitted!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

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
    <link rel="stylesheet" href="css/main2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="header">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
        <a class="navbar-brand" href="index.php">
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
<div ng-app="">
<div class="container">
  <h2 class="text-center mt-5">Join as a promoter!!!</h2>
    <h4 class="text-center font-weight-normal">Build your profile</h4>
    <h4 class="text-center font-weight-normal"><?php echo $msg ?></h4>

    <?php if(!empty($response)) { ?>
    <div class="response <?php echo $response["type"]; ?>">
    <?php echo $response["message"]; ?>
    </div>
    <?php }?>

    <div class="row mt-5 shadow-lg">
    <div class="col-md-5 border">

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
            <br/>
            <h5 class="text-muted font-weight-normal">Please select a cover image</h5>
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="customFileA" name="app_cover">
              <label class="custom-file-label" for="customFileA">Choose Cover Image (820 X 315)</label>
            </div>
            <br/>
            <h5 class="text-muted font-weight-normal">Please select a profile image</h5>
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="customFileB" name="app_profile">
              <label class="custom-file-label" for="customFileB">Choose Profile Image (360 X 360)</label>
            </div>


            <div class="form-group mt-3">
            <label for="title">Username</label><small class="text-muted ml-2"> Brand Name</small>
            <input class="form-control" id="title" type="text" placeholder="eg. KFC, Lazada" name="app_name" ng-model="title">
            </div>
            <div class="form-group mt-3">
            <label for="desp">Description</label><small class="text-muted ml-2"> About Brand</small>
            <textarea class="form-control" id="desp" ng-model="desp" placeholder="eg. Our brand sells..." name="app_desp" rows="3"></textarea>
            </div>
            <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="app_email">
            <small class="text-muted ml-2"> You will receive a confirmation email once your application is validated</small>
            </div>
            <br/>
            <br/>
            <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="app_pass">
            </div>
            <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="app_cpass">
            </div>
            <br/>
            <h5 class="font-weight-normal">Keywords</h5>
            <hr class="w-50 ml-0 mt-1" />
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="cbkey1" value="food" name="app_key[]">
              <label class="form-check-label" for="cbkeyf">Food</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="cbkey2" value="drink" name="app_key[]">
              <label class="form-check-label" for="cbkeyd">Drinks</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="cbkey3" value="clothes" name="app_key[]">
              <label class="form-check-label" for="cbkeyc">Clothes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="cbkey3" value="shoe" name="app_key[]">
              <label class="form-check-label" for="cbkeys">Shoes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="cbkey3" value="bag" name="app_key[]">
              <label class="form-check-label" for="cbkeyb">Bags</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="cbkey3" value="other" name="app_key[]">
              <label class="form-check-label" for="cbkeyo">Others</label>
            </div>

            <br/>
            <br/>
            <p class="text-muted">Satisfied with what you see? Send us your application.</p>
            <button type="submit" class="btn btn-warning btn-block mb-3" name="upload" value="upload">Submit Application</button>

        </form>

    </div>
    <div class="col-md-7 border px-0">
        <h5 class="bg-light text-black-50 m-0 py-2 pl-2"> Preview:</h5>
        <img src="images/defaultcover.png" id="previewc" class="d-block w-100" alt="Example">
        <div class="row">
            <div class="col-md-4 border ml-3 shadow-lg mb-5" id="headline">
                <img src="images/defaultprofile.png" class="mx-auto mt-3 d-block w-50 border" id="previewp" alt="Example">
                <h4 class="text-center">{{title}}</h4>
                <p class="predesp">{{desp}}</p>
            </div>
            <div class="col-md-7 border ml-4 shadow-lg" id="headline">
                <h3 class="text-center mt-2">Our Promos</h3>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</div>

</div>
</div>

<br/>
<br/>
<footer class="page-footer bg-secondary font-small pt-4">
  <div class="container-fluid text-center text-md-left">
    <div class="row">
      <div class="col-md-6 mt-md-0 mt-3">
        <h5 class="text-uppercase text-white font-weight-bold">Footer text 1</h5>
        <p class="text-white">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita sapiente sint, nulla, nihil
          repudiandae commodi voluptatibus corrupti animi sequi aliquid magnam debitis, maxime quam recusandae
          harum esse fugiat. Itaque, culpa?</p>
          <br/>
          <br/>

      </div>
        <hr class="clearfix w-100 d-md-none pb-3">
      <div class="col-md-6 mb-md-0 mb-3">
        <h5 class="text-uppercase text-white font-weight-bold">Footer text 2</h5>
        <p class="text-white">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis modi earum
          commodi aperiam temporibus quod nulla nesciunt aliquid debitis ullam omnis quos ipsam, aspernatur id
          excepturi hic.</p>
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
    function preview(input,num) {
            if (input.files && input.files[0]) {
                var freader = new FileReader();
                freader.onload = function (e) {

                    var img = new Image;

                    img.onload = function() {

                        if(num == 1){
                            if(img.width==820 || img.height == 315){
                                $("#previewc").show();
                                $('#previewc').attr('src', e.target.result);
                            }else{
                                alert ('Cover image must be 820px x 315px');
                                $("#customFileA").val(null);
                                $("#previewc").attr("src","images/defaultcover.png");

                            }
                        }else{
                            if(img.width==360 || img.height == 360){
                                $("#previewp").show();
                                $('#previewp').attr('src', e.target.result);
                            }else{
                                alert ('Profile image must be 360px x 360px');
                                $("#customFileB").val(null);
                                $("#previewp").attr("src","images/defaultprofile.png");

                            }
                        }
                    };

                    img.src = freader.result;

                }
                freader.readAsDataURL(input.files[0]);
            }
        }


        $("#customFileA").change(function(){
            preview(this,1);
        });

        $("#customFileB").change(function(){
            preview(this,2);
        });
</script>
<script>
    // Add the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</body>
</html>
