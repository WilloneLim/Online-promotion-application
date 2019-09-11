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
    
    <style>
        .header{
            background-image: url('images/cp.png');
            background-repeat:no-repeat;
            background-size: 100% auto;
            background-position: center;
            background-attachment: fixed;
            background-color: black;
            opacity: 0.9;
            height: 450px;
        }
        #navover{
            background-image: linear-gradient(to top, rgba(255,0,0,0), black);
        }
    
    </style>
</head>
<body>
    <div class="header">
    <nav class="navbar navbar-expand-sm navbar-dark" id="navover">
        <div class="container">
        <a class="navbar-brand" href="#">
            <img src="images/navnav.png" height="30" alt="PromoAlert Logo">
        </a>
          <ul class="navbar-nav">
              <li class="nav-item mr-3">
                  <a class="nav-link text-light" href="proapplication.php">Want to be a promoter? <b>APPLY HERE</b></a>
                </li>
                <li class="nav-item">
                <?php

                    if ( isset( $_SESSION['cust_id'] ) ) {
                        echo'<a class="nav-link bg-warning text-dark w-100 px-4 font-weight-bold" href="myaccount.php">My Account</a>';
                    } else {
                        echo '<a class="nav-link bg-warning text-dark w-100 px-4 font-weight-bold" href="signin.php">  Log In  </a>';
                    }

                 ?>
                </li>
            </ul>
            </div>
        </nav>
        
        <h2 class="display-4 text-center mt-5 pt-5 text-light">Reach your customers in a better way</h2>
        <a href="proapplication.php" class="btn btn-warning font-weight-bold d-block mx-auto text-dark mt-4">Apply with us</a>
    </div>

<div class="container">
<!--<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>-->

<h1 class="text-center mt-5 font-weight-normal">Our Promotions</h1>
    <hr/>
  <div class="filter d-flex justify-content-center" id="mySort">
    <button data-name='*' class="stext active">All</button>
    <button data-name=".food" class="stext p-2">Food</button>
    <button data-name=".drinks" class="stext p-2">Drinks</button>
    <button data-name=".bags" class="stext p-2">Bags</button>
    <button data-name=".shoes" class="stext p-2">Shoes</button>
    <button data-name=".clothes" class="stext p-2">Clothes</button>
    <button data-name=".other" class="stext p-2">Other</button>

  </div>
    <br/>
  <div class="row grid">
    <?php

    $sql = "SELECT * FROM promotion";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            echo '<div class="col-md-12 pb-5 grid-item '.$row['promo_keywords'].'">';
            echo '<div class="col-md-8 shadow-lg mx-auto p-2">';

            echo '<a href="share.php?id='.$row['promo_id'].'"><img class="img-fluid p-2 mt-2" src="images/'.$row['promo_img'].'" alt="IMG-PRODUCT"></a>';

            echo '<h5 class="pt-2 pl-3">'.$row['promo_title'].'</h5>';

            $sqla = "SELECT * FROM promoter WHERE promoter_id =".$row['promoter_id'];
            $resulta = $conn->query($sqla);

            if ($resulta->num_rows > 0) {
                // output data of each row
                while($rowa = $resulta->fetch_assoc()) {
                    echo '<a href="promoterview.php?id='.$row['promoter_id'].'" class="text-muted pl-3">'.$rowa['promoter_username'].'</a>';
                }
            }

            echo '<input class="float-right pb-3 pr-2" type="image" src="images/wishlist_false.png" />';

            echo '<br/>';
            echo '<br/>';
            echo '</div>';
            echo '</div>';
        }

    } else {
        echo "0 results";
    }
    $conn->close();

    ?>
</div>
</div>

    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

    $(function () {
      $('[data-toggle="popover"]').popover()
    })
    </script>
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script>
      var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
        masonry: {
            columnWidth: 40,
            isFitWidth: true
        },
        getSortData: {
          name: function (element) {
            return $(element).text();
          }
        }
      });
      $('.filter button').on("click", function () {
        var value = $(this).attr('data-name');
          $grid.isotope({
            filter: value
          });
        $('.filter button').removeClass('active');
        $(this).addClass('active');
      })
      $('.sort button').on("click", function () {
        var value = $(this).attr('data-name');
        $grid.isotope({
          sortBy: value
        });
        $('.sort button').removeClass('active');
        $(this).addClass('active');
      })
    </script>
     <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
          if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            document.getElementById("myBtn").style.display = "block";
          } else {
            document.getElementById("myBtn").style.display = "none";
          }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
//          document.body.scrollTop = 0;
//          document.documentElement.scrollTop = 0;
            window.scrollTo(0, 620);
        }
    </script>
</body>
</html>
