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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
        <a class="navbar-brand" href="#">
            <img src="images/navnav.png" height="30" alt="PromoAlert Logo">
        </a>
          <ul class="navbar-nav">
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


    <?php

    if(isset($_GET['id'])){

    $sql = "SELECT * FROM promoter WHERE promoter_id = ".$_GET['id'];

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
//            echo $row['promoter_username'];
//            echo $row['promoter_description'];
//            echo $row['promoter_keywords'];
//            echo $row['promoter_profile'];
//            echo $row['promoter_cover'];

            echo '<img src="images/'.$row['promoter_cover'].'" id="backline" class="d-block w-100" alt="Example">';
            echo '</br>';
            echo '</br>';
            echo '</br>';
            echo '</br>';
            echo '<div class="container mt-5">';
            echo '<div class="row mx-auto pt-5" >';
            echo '<div class="col-md-3 border shadow-lg mb-5" id="headline">';
            echo '<img src="images/'.$row['promoter_profile'].'" class="mx-auto d-block h-25 my-4 border" alt="Example">';
            echo '<h4>'.$row['promoter_username'].'</h4>';
            echo '<p>'.$row['promoter_description'].'</p>';
            echo '</div>';
            echo '<div class="col-md-1"></div>';

            echo '<div class="col-md-8 border shadow-lg" id="headline">';
            echo '</br>';
            echo '<h3 class="text-center mt-0">Our Promos</h3>';
            echo '<hr/>';


            $sqla = "SELECT * FROM promotion WHERE promoter_id = ".$_GET['id'];
            $resulta = $conn->query($sqla);

            if ($resulta->num_rows > 0) {
                while($rowa = $resulta->fetch_assoc()) {

                    echo '<div class="col-md-10 mx-auto border p-2 mb-5">';

                    echo '<a href="share.php?id='.$rowa['promo_id'].'"><img class="img-fluid p-2 mt-2" src="images/'.$rowa['promo_img'].'" alt="IMG-PRODUCT"></a>';

                    echo '<h5 class="pt-2 pl-3">'.$rowa['promo_title'].'</h5>';

                    echo '<input class="float-right pb-3 pr-2" type="image" src="images/wishlist_false.png" />';

                    echo '<br/>';
                    echo '<br/>';
                    echo '</div>';

                }
            }

            echo '<p class="text-center text-muted"> No more promotions to display</p>';
            echo '</div>';

            echo '</div>';
            echo '</div>';
            echo '<br/>';
            echo '<br/>';

        }
    } else {
        echo "0 results";
    }
    $conn->close();


    }else {
        echo "<h1>Oops... this promoter page is missing</h1>";
        echo "<br/>";
        echo "<br/>";
        echo "<img src='images/error.png' class='mx-auto d-block w-10' alt='...'>";

    }
    ?>



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
</body>
</html>
