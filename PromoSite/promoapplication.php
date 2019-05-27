<?php
include 'connect.php';
session_start();


$msg ="";
$pro_name = "";
$pro_email = "";
$pro_password = "";

if(isset($_GET['id'])){
$sqla = "SELECT * FROM promoter WHERE promoter_id =".$_GET['id'];
            $resulta = $conn->query($sqla);

            if ($resulta->num_rows > 0) {
                // output data of each row
                while($rowa = $resulta->fetch_assoc()) {
                    $pro_name = $rowa['promoter_username'];
                    $pro_email = $rowa['promoter_email'];
                    $pro_password = $rowa['promoter_password'];
                }
            }
}



$app_title = $app_desp = $app_email = $app_pass = $app_key = $app_date = $app_sdate = $app_edate = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $app_title = test_input($_POST["app_title"]);
    $app_desp = test_input($_POST["app_desp"]);
    $app_email = test_input($_POST["app_email"]);
    $app_pass = test_input($_POST["app_pass"]);
    $app_sdate = test_input($_POST["app_sdate"]);
    $app_edate = test_input($_POST["app_edate"]);

    if($app_desp=="" || $app_email=="" || $app_pass==""|| $app_title=="" || $app_sdate=="" || $app_edate==""){
        $msg .= "<br/><h5 class='col-md-12 text-center bg-info text-white py-2'>Please Fill Every Box.</h5>";
    }else{

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

            if(file_exists('uploadedpromotion/' . $_FILES['app_cover']['name'])){
                $msg .= "<br/><b>File with that name already exists.</b>";
            }else{

            $app_cover = $_FILES['app_cover']['name'];
            }

        }else {
            $msg .= "<br/><b>Please Select A Promotional Image.</b>";
        }

        if($app_email != $pro_email || $app_pass != $pro_password){
            echo $app_email."=".$pro_email." / ".$app_pass."=".$pro_password;
            $msg .= "<br/><b>Email or Password Incorrect.</b>";
        }

    }

    if($msg == ""){
        $app_date = date("Y/m/d");
        $sql = "INSERT INTO applypromo (proapp_title, promoter_id, proapp_desp, proapp_sdate, proapp_edate, proapp_img, proapp_key, proapp_date) VALUES ('".$app_title."','".$_GET['id']."', '".$app_desp."', '".$app_sdate."', '".$app_edate."', '".$app_cover."', '".$app_key."', '".$app_date."')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Your application has been submitted!');</script>";
            $destFile = "uploadedpromotion/".$_FILES['app_cover']['name'];
            move_uploaded_file( $_FILES['app_cover']['tmp_name'], $destFile );

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

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


    <style>
    #description {
      white-space: pre-line;
    }
    </style>

</head>
<body>
    <div class="header">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
        <a class="navbar-brand" href="promoter.php?id=<?php echo $_SESSION["pro_id"]; ?>">
            <img src="images/navnav.png" height="30" alt="PromoAlert Logo">
        </a>
          <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>
            </ul>
            </div>
        </nav>
    </div>
<div ng-app="">
<div class="container">
<h2 class="text-center mt-5">Apply for a new promotion</h2>
<h4 class="text-center font-weight-normal">Build your promotion</h4>
<h4 class="text-center font-weight-normal"><?php echo $msg; ?></h4>
<div class="row mt-5">
    <div class="col-md-6 pb-5 border">
        <h5 class="col-md-12 text-black-50 py-2"> Preview:</h5>
        <div class="col-md-12 shadow-lg p-2">
            <a href="#"><img class="img-fluid p-2 mt-2" id="previewc" src="images/defaultpromotionimg.png" alt="IMG-PRODUCT"></a>
            <h5 class="pt-2 pl-3">{{title}}</h5>
            <p class="pl-3">
                <?php
                if($pro_name ==""){
                    echo "";
                }else{
                    echo 'by <a href="#" class="text-muted">'.$pro_name.'</a>';
                }
                ?>
            </p>
            <p class="pl-3" id="description">{{desp}}</p>
            <input class="float-right pb-3 pr-2" type="image" src="images/wishlist_false.png" />
            <br/>
            <br/>
        </div>
    </div>


    <div class="col-md-6 pb-5 border">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?id=".$_GET['id'];?>" enctype="multipart/form-data">
            <br/>
            <h5 class="text-muted font-weight-normal">Please select a Promotion image</h5>
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="customFileA" name="app_cover">
              <label class="custom-file-label" for="customFileA">Choose Promotional Image (820 X 315)</label>
            </div>
            <br/>
            <div class="form-group mt-3">
            <label for="title">Title</label><small class="text-muted ml-2"> Promotion Title</small>
            <input class="form-control" id="title" type="text" placeholder="eg. Buy 1 free 1" name="app_title" ng-model="title">
            </div>
            <div class="form-group mt-3">
            <label for="desp">Description</label><small class="text-muted ml-2"> About your promotion</small>
            <textarea class="form-control" id="desp" ng-model="desp" placeholder="eg. 1. ... 2. ..." name="app_desp" rows="3"></textarea>
            </div>
            <div class="form-group mt-3">
            <label for="datepickera">Start Date</label>
            <input id="datepickera" name="app_sdate" width="276" placeholder="" />
            </div>
            <div class="form-group mt-3">
            <label for="datepickerb">End Date</label>
            <input id="datepickerb" name="app_edate" width="276" placeholder="" />
            </div>

            <p id="display"></p>

            <br/>
            <br/>
            <hr/>
            <div class="form-group">
            <label for="email">Your Email address</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="app_email">
            <small class="text-muted ml-2"> Please enter email to apply for a new promotion</small>
            </div>
            <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="app_pass">
            <small class="text-muted ml-2"> Please enter password to apply for a new promotion</small>
            </div>
            <hr/>
            <br/>
            <br/>

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

</div>
</div>
</div>

<script>
    function preview(input,num) {
        var chk = 0;
            if (input.files && input.files[0]) {
                var freader = new FileReader;

                freader.onload = function (e) {

                    var img = new Image;

                    img.onload = function() {
                        if(img.width==1200 || img.height == 630){
                            $("#previewc").show();
                            $('#previewc').attr('src', e.target.result);
                        }else{
                            alert ('Promotional image must be 1200px x 630px');
                            $("#customFileA").val(null);
                            $("#previewc").attr("src","images/defaultpromotionimg.png");

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

</script>
<script>
    // Add the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<script>

$('#datepickera').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy/mm/dd'
});

$('#datepickerb').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'yyyy/mm/dd'
});

</script>
</body>
</html>
