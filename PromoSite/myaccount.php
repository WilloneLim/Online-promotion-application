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
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
        <a class="navbar-brand" href="index.php">
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
<br/>
<div class="container">
    <div class="row">
      <div class="col-3 border bg-light mr-2">
          <br/>
          <img class="img-fluid rounded-circle p-3" src="images/profile_placeholder.jpg" alt="IMG-placeholder">
          <br/>
            <h4 class="p-3">
              USERNAME
              <small class="text-muted">email@hotmail.com</small>
            </h4>
<!--
              <ul class="list-group list-group-flush ">
                    <li class="list-group-item active"><a href="signin.html">My Wishlist</a></li>
                    <li class="list-group-item"><a>My Favourite Brands</a></li>
                    <li class="list-group-item"><a>My Transactions</a></li>
              </ul>
-->
                <div class="list-group list-group-flush ">
                  <a href="#" class="list-group-item active">My Wishlist</a>
                  <a href="#" class="list-group-item">My Favourite Brands</a>
                  <a href="#" class="list-group-item">My Transactions</a>
                </div>
            <br/>
        </div>
        <div class="col-8 border bg-light ml-2">
            <h1 class="text-center mt-5 mb-0 font-weight-normal">My Wishlist</h1>
            <div class="container px-5">
              <div class="filter d-flex">
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
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 grid-item drinks">Tealive
                    <img class="img-fluid" src="images/promo1.png" alt="tealiveid">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 grid-item food">McDonalds
                    <img class="img-fluid" src="images/promo2mcd.png" alt="IMG-PRODUCT">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 grid-item clothes">Hush Puppies
                    <img class="img-fluid" src="images/promo3hush.png" alt="IMG-PRODUCT">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 grid-item food">Dominos
                    <img class="img-fluid" src="images/promo4pizza.png" alt="IMG-PRODUCT">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 grid-item food">KFC
                    <img class="img-fluid" src="images/promo5kfc.png" alt="IMG-PRODUCT">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 grid-item shoes">Sketchers
                    <img class="img-fluid" src="images/promo6sketchers.png" alt="IMG-PRODUCT">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 grid-item drinks">StarBucks
                    <img class="img-fluid" src="images/promo7starbucks.png" alt="IMG-PRODUCT">
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 grid-item other">Sephora
                    <img class="img-fluid" src="images/promo8sephora.png" alt="IMG-PRODUCT">
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script>
      var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
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

</body>
</html>
