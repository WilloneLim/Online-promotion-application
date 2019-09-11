<?php
include 'connect.php';
session_start();

        $sqla = "SELECT * FROM customer WHERE cust_id ='".$_SESSION["cust_id"]."'";
        $result = mysqli_query($conn,$sqla);
        $row  = mysqli_fetch_array($result);


        $query = "SELECT * FROM claims WHERE cust_id ='".$_SESSION["cust_id"]."'";
        $resultq =$conn->query($query);

        
    

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
            height: 310px;
        }
        #navover{
            background-image: linear-gradient(to top, rgba(255,0,0,0), black);
        }
    
        .tab {
          overflow: hidden;
          border: 1px solid darkgray;
          background-color: orange;
        }

        /* Style the buttons inside the tab */
        .tab button {
          background-color: inherit;
          float: left;
          border: none;
          outline: none;
          cursor: pointer;
          transition: 0.3s;
          font-size: 17px;
            font-weight: bold;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
          background-color: darkorange;
        }

        /* Create an active/current tablink class */
        .tab button.active {
          background-color: darkorange;
        }

        /* Style the tab content */
        .tabcontent {
          display: none;
        }
    
    </style>
</head>
<body>
    <div class="header">
    <nav class="navbar navbar-expand-sm navbar-dark" id="navover">
        <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="images/navnav.png" height="30" alt="PromoAlert Logo">
        </a>
          <ul class="navbar-nav">
              <li class="nav-item mr-3">
                  <a class="nav-link text-light" href="proapplication.php">Want to be a promoter? <b>APPLY HERE</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-warning text-dark w-100 px-4 font-weight-bold" onclick="myLogout()">Log Out</a>
                </li>
            </ul>
            </div>
        </nav>
            <h4 class="text-center mt-5 pt-5 text-light display-4">Welcome  <em class="text-warning pl-2"><?php echo $row['cust_username']; ?></em></h4>
    </div>
<br/>
<div class="container p-0 mb-5">
    <div class="col-md-12">

    <div class="tab row">
      <button class="tablinks col-md-4 m-0 py-3 border border-warning text-dark" onclick="openCity(event, 'wishlist')">WISHLIST</button>
      <button class="tablinks col-md-4 m-0 py-3 border border-warning text-dark" onclick="openCity(event, 'transactions')">TRANSACTIONS</button>
      <button class="tablinks col-md-4 m-0 py-3 border border-warning text-dark" onclick="openCity(event, 'brands')">QR VAULT</button>
    </div>

    <div id="wishlist" class="tabcontent">
      <h3 class="text-center mt-5">My Wishlist</h3>
        <hr/>
        <br/>
        <br/>
      <p class="text-muted text-center">TO BE IMPLEMENTED.</p>
        <br/>
        <br/>
    </div>

    <div id="transactions" class="tabcontent">
      <h3 class="text-center mt-5">My Transactions</h3>
        <hr/>
              <div class="table-responsive">
               <table class="table table-striped table-hover">
                   <thead>
                       <tr>
                           <th>Transaction date</th>
                           <th>Promotion</th>
                           <th>Promoter</th>
                       </tr>
                   </thead>
                   <?php
                   if ($resultq->num_rows > 0) {
                        // output data of each row
                        while($rowq = $resultq->fetch_assoc()) {
                            
                            $queryb = "SELECT * FROM promotion WHERE promo_id ='".$rowq['promo_id']."'";
                            $resultb = mysqli_query($conn,$queryb);
                            $rowb  = mysqli_fetch_array($resultb);
                            
                            $queryc = "SELECT * FROM promoter WHERE promoter_id ='".$rowb['promoter_id']."'";
                            $resultc = mysqli_query($conn,$queryc);
                            $rowc  = mysqli_fetch_array($resultc);
                   ?>

                      <tr>
                         <td><?php echo $rowq['tran_date'];?></td>
                          <td><?php echo $rowb['promo_title'];?></td>
                         <td><?php echo $rowc['promoter_username'];?></td>
                      </tr>
                   <?php
                        }
                   }
                   ?>
               </table>
          </div>
    </div>

    <div id="brands" class="tabcontent">
      <h3 class="text-center mt-5">My QR Vault</h3>
        <hr/>
        <br/>
        <br/>
      <p class="text-muted text-center">TO BE IMPLEMENTED.</p>
        <br/>
        <br/>
    </div>
    <br/>
</div>
</div>


    <script>
    function myLogout() {
      var txt;
      if (confirm("Are you sure you want to log out?")) {
            window.location.href ="logout.php";
      }
      document.getElementById("demo").innerHTML = txt;
    }
    </script>
    <script>
    openCity(event, 'wishlist')
        
    function openCity(evt, tab) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(tab).style.display = "block";
      evt.currentTarget.className += " active";
    }
    </script>
    
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
    
</body>
</html>
