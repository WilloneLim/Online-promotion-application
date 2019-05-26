<?php
include 'connect.php';

$cust_id = $promo_id = $tran_sale = $tran_date = $msg = "";
// define variables and set to empty values
if(isset($_GET['id'])){
    $promo_id = $_GET['id'];
}
$cust_id = "1";
$tran_date = date("Y/m/d");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tran_sale = test_input($_POST["pricepaid"]);

    if($tran_sale==""){
        $msg .= "<h5 class='col-md-12 text-center bg-danger text-white py-2'>Please Enter Sales Amount.</h5>";
    }else{


        $sql = "INSERT INTO claims (cust_id, promo_id, tran_sale, tran_date) VALUES ('".$cust_id."', '".$promo_id."', '".$tran_sale."', '".$tran_date."')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Your application has been submitted!');</script>";
            header("Location: promotionamount.php?id=".$_GET['id']); 
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
    <link rel="stylesheet" type="text/css" href="css/main.css">
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.1/dist/html2canvas.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet"/>
</head>
<body id ="main">
    <div class="header">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
        <a class="navbar-brand" href="#">
            <img src="images/navnav.png" height="30" alt="PromoAlert Logo">
        </a>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Sign Out</a>
            </li>
          </ul>
            </div>
        </nav>
    </div>
    
    <div class="container">
        <h1 class="mt-5">QR code is valid!</h1>
        <div class="row bg-white shadow-lg p-3 mb-5">
        <div class="col-md-6 border-right">
            <div class="row m-2">
            <img src="images/promo1.png" class="col-md-12 h-100">
<!--            <h3>Please Enter Sale Amount:</h3>-->
            <h4 class="col-md-12 mt-3">Promotion: </h4>
            <h6 class="col-md-12">Description:</h6>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row m-2">
            <img src="images/profile_placeholder.jpg" class="col-md-5 col-sm-4 h-100 my-2">
<!--            <h3>Please Enter Sale Amount:</h3>-->
                <div class="col-md-5 col-sm-8">
                    <h6 class="p-0 mt-3">User:</h6>
                    <h6 class="p-0 mt-3">Past transations: <span class="text-muted font-weight-normal">Not yet implemented</span></h6>
                    
                </div>
            </div>
<!--
            <h3 class="p-0 mt-3">Please input amount paid: </h3>
            <h6 class="p-0 mt-3">RM </h6>
-->         <div class="row m-2">
            <div class="col-md-12">
            <form action="salesinput.php?id=<?php echo $_GET['id']; ?>" class="border-top m-0" method="POST">
            <?php echo $msg; ?>
              <h5>Please input amount paid:</h5><br>RM
              <input type="number" min="0" name="pricepaid" placeholder="0.00" step=".01">
                <?php echo "<span class='float-right font-weight-bold'>".date("Y/m/d") . "</span>"; ?>
              <input type="submit" value="Submit" class="btn btn-warning mx-auto w-100">
            </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    
</body>
</html>