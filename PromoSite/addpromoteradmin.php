<?php 
include 'connect.php'; 
session_start();

// define variables and set to empty values
$pro_name = $pro_desp = $pro_email = $pro_pass = $pro_cpass = $msg = $pro_key = $pro_date = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pro_name = test_input($_POST["pro_name"]);
    $pro_desp = test_input($_POST["pro_desp"]);
    $pro_email = test_input($_POST["pro_email"]);
    $pro_pass = test_input($_POST["pro_pass"]);
    $pro_cpass = test_input($_POST["pro_cpass"]);

    if($pro_name=="" || $pro_desp=="" || $pro_email=="" || $pro_pass=="" || $pro_cpass==""){
        $msg .= "<br/><h5 class='col-md-12 text-center bg-info text-white py-2'>Please Fill Every Box.</h5>";
    }else{
        
        if($pro_pass != $pro_cpass){
            $msg .= "<p>Passwords do not match.</p>";
        }
        
        
        if(!empty($_POST['pro_key'])) {
        $checked_count = count($_POST['pro_key']);
    //    echo "You have selected following ".$checked_count." option(s): <br/>";
            foreach($_POST['pro_key'] as $selected) {
                $pro_key .= " ".$selected;
            }
        }else{
            $msg .= "<p>Please Select Atleast One Keyword.</p>";
        }


        if(!isset($_POST['pro_cover'])) {

            if(file_exists('images/' . $_FILES['pro_cover']['name'])){
                $msg .= "<p>File with that name already exists. (Cover Image)</p>";
            }else{

            $destFile = "images/".$_FILES['pro_cover']['name'];
            move_uploaded_file( $_FILES['pro_cover']['tmp_name'], $destFile );
            $pro_cover = $_FILES['pro_cover']['name'];
            }

        }else {
            $msg .= "<p>Please Select A Cover Image.</p>";
        }  
        
        if(!isset($_POST['pro_profile'])) {

            if(file_exists('images/' . $_FILES['pro_profile']['name'])){
                $msg .= "<p>File with that name already exists. (Profile Image)</p>";
            }else{

            $destFile = "images/".$_FILES['pro_profile']['name'];
            move_uploaded_file( $_FILES['pro_profile']['tmp_name'], $destFile );
            $pro_profile = $_FILES['pro_profile']['name'];
            }

        }else {
            $msg .= "<p>Please Select A Profile Image.</p>";
        }  
    }
    
    if($msg == ""){
        $pro_date = date("Y/m/d");
        $sql = "INSERT INTO promoter (promoter_email, promoter_username, promoter_password, promoter_description, promoter_profile, promoter_cover, promoter_keywords) VALUES ('".$pro_email."', '".$pro_name."', '".$pro_pass."', '".$pro_desp."', '".$pro_profile."', '".$pro_cover."', '".$pro_key."')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New record added!');</script>";
            header('Location: adminindex.php');
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
            <li class="nav-item">
              <a class="nav-link" href="signin.php">Sign Out</a>
            </li>
          </ul>
            </div>
        </nav>
    </div>
    
<div ng-app="">
<div class="container">
    <hr class="w-75 mt-5 "/>
    <h1 class="text-center mt-0">Create new Promoter Account</h1>
    <hr class="w-75"/>
    
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
              <input type="file" class="custom-file-input" id="customFileA" name="pro_cover">
              <label class="custom-file-label" for="customFileA">Choose Cover Image (820 X 315)</label>
            </div>
            <br/>
            <h5 class="text-muted font-weight-normal">Please select a profile image</h5>
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="customFileB" name="pro_profile">
              <label class="custom-file-label" for="customFileB">Choose Profile Image (360 X 360)</label>
            </div>
            
            
            <div class="form-group mt-3">
            <label for="title">Username</label><small class="text-muted ml-2"> Brand Name</small>
            <input class="form-control" id="title" type="text" placeholder="eg. KFC, Lazada" name="pro_name" ng-model="title">
            </div>
            <div class="form-group mt-3">
            <label for="desp">Description</label><small class="text-muted ml-2"> About Brand</small>
            <textarea class="form-control" id="desp" ng-model="desp" placeholder="eg. Our brand sells..." name="pro_desp" rows="3"></textarea>
            </div>
            <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="pro_email">
            </div>
            <br/>
            <br/>
            <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="pro_pass">
            </div>
            <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="pro_cpass">
            </div>
            <br/>
            <h5 class="font-weight-normal">Keywords</h5>
            <hr class="w-50 ml-0 mt-1" />
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="cbkey1" value="food" name="pro_key[]">
              <label class="form-check-label" for="cbkeyf">Food</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="cbkey2" value="drink" name="pro_key[]">
              <label class="form-check-label" for="cbkeyd">Drinks</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="cbkey3" value="clothes" name="pro_key[]">
              <label class="form-check-label" for="cbkeyc">Clothes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="cbkey3" value="shoe" name="pro_key[]">
              <label class="form-check-label" for="cbkeys">Shoes</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="cbkey3" value="bag" name="pro_key[]">
              <label class="form-check-label" for="cbkeyb">Bags</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="cbkey3" value="other" name="pro_key[]">
              <label class="form-check-label" for="cbkeyo">Others</label>
            </div>
            
            <br/>
            <br/>
            <br/>
            <div class="row">
            <a href="adminindex.php" class="col-md-3 btn btn-danger mb-5 mx-auto font-weight-bold">Cancel</a>
            <button type="submit" class="col-md-7 btn btn-warning mb-5 mx-auto font-weight-bold" name="upload" value="upload">Create Promoter Account</button>
            
            </div>
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
                 <hr class="w-75"/>
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
                    if(num == 1){
                        $("#previewc").show();
                        $('#previewc').attr('src', e.target.result);
                    } else {
                        $("#previewp").show();
                        $('#previewp').attr('src', e.target.result);
                    }
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