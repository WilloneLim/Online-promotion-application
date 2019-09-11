<?php
include 'connect.php';
session_start();

if ( isset( $_SERVER['HTTP_REFERER'] ) && strstr( $_SERVER['HTTP_REFERER'], 'salesinput.php' ) ) {
    echo "<script>alert ('Succesful Claim Completed');</script>";
}

if(isset($_GET['id'])){
    
    if(isset($_POST['search']))
    {

         $valueToSearch = $_POST['valueToSearch'];
         $query = "SELECT * FROM `promotion` WHERE CONCAT(`promo_id`) LIKE '%".$valueToSearch."%'";
         $search_result = filterTable($query);
    }else {
         $query = "SELECT * FROM `promotion` WHERE promoter_id = '".$_GET['id']."'";
         $search_result = filterTable($query);
    }

    $pro_img = $pro_name = $pro_desp = "";


    
    $sqla = "SELECT * FROM promoter WHERE promoter_id =".$_GET['id'];
            $resulta = $conn->query($sqla);

            if ($resulta->num_rows > 0) {
                // output data of each row
                while($rowa = $resulta->fetch_assoc()) {
                    $pro_name = $rowa['promoter_username'];
                    $pro_img = $rowa['promoter_profile'];
                    $pro_desp = $rowa['promoter_description'];
                }
            }
}


 function filterTable($query)
    {
        $connect = mysqli_connect("localhost", "root", "", "promoalert");
        $filter_Result = mysqli_query($connect, $query);
        return $filter_Result;

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
<!--    <link rel="stylesheet" type="text/css" href="css/main.css">-->
</head>
<body>
    <div class="header">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
        <a href="index.php" class="navbar-brand">
            <img src="images/navnav.png" height="30" alt="PromoAlert Logo">
        </a>
          <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" onclick="myLogout()">Log Out</a>
                </li>
            </ul>
            </div>
        </nav>
    </div>
    
    <div class="container">
        
<?php if(isset($_GET['id'])){ ?>
        
      <div class="row border mt-3 ">
          <div class="col-md-3 image">
              <img class="img-fluid m-3" src="images/<?php echo $pro_img; ?>" alt="promoterIMG" style="margin-top:20px;">
          </div>
          <div class="col-md-6 title m-3 border" style="margin-top:20px;">
              <h1><b><?php echo $pro_name; ?></b></h1>
              <p>Last Online: TO BE ADDED</p>
              <p>No. of promotions: </p>
              <p>Average claims: TO BE ADDED</p>
          </div>
          <div class="col-md-2 mt-3">
              <a href="promoapplication.php?id=<?php echo $_GET['id']; ?>" class="btn btn-primary btn-block">Apply for new promotion</a>
              <a href="#" class="btn btn-primary btn-block disabled">View / Edit Customer View</a>
              
          </div>
      </div>
         <form action="promoter.php" method="POST">
     <div class="input-group mb-3" style="margin-top:20px;">
  <input type="text" class="form-control" name="valueToSearch" placeholder="Search" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" name="search" value="Search">Search</button>
  </div>
</div>
    

    <div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Promotion Title</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <?php while($row  = mysqli_fetch_array($search_result)):?>
        
        <tr>
            <td><?php echo $row['promo_id'];?></td>
            <td><a href="promotionamount.php?id=<?php echo $_GET['id']; ?>"><?php echo '<img src="images/'.$row['promo_img'].'" alt="tealiveid" id="imginfo" style="width:300px;height:150px">'; ?></a></td>
            <td><?php echo $row['promo_title'];?></td>
            <td><a href="scanning.php?id=<?php echo $row['promo_id']; ?>" class="btn btn-success py-5 mt-3 w-100">Scan QR</a></td>
            <td><a href="promotionamount.php?id=<?php echo $row['promoter_id']; ?>" class="btn btn-warning py-5 mt-3 w-100">View Statistics</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
    
      </div> 
      </form>
        
<?php }else{ 
        
        echo "<h1 class='text-center mt-5 pt-1'>Oops... this promoter is missing</h1>";
        echo "<br/>";
        echo "<br/>";
        echo "<img src='images/error.png' class='mx-auto d-block w-10 mb-5 pb-5' alt='...'>";
    }
        
?>     
    </div>
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
    function myLogout() {
      var txt;
      if (confirm("Are you sure you want to log out?")) {
            window.location.href ="logout.php";
      }
      document.getElementById("demo").innerHTML = txt;
    }
    </script>    
</body>
</html>