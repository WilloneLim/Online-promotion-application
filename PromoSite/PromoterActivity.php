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
              <a class="nav-link" href="signin.html">Log In</a>
            </li>
          </ul>
            </div>
        </nav>
    </div>
    
<div class="container">
  <div class="container">
  <div class="row">
  <div class="col-sm-4">
  <img src="images/promo5kfc.png" alt="tealiveid" id="imginfo" style="width:200px;height:200px">
  </div>
  <div class="col-sm-6">
 <h3> Kentucky Fried Chicken</h3>
 <li>Last Online:</li>
 <li>No. Of Promotions:</li>
 <li>Average Claims:</li>
 
  </div>
  <div class="col-sm-2">
     <button><a href="adminindex.php">back</a></button>

  </div>
  
  </div>
  </div>
  </br>
  <!-- Search Bar -->
  <div class="row">
      <div class="input-field col s12" >
	   <i class="material-icons prefix">search</i>
	   <input type="text" data-ng-model="searchOrder" data-ng-keyup="change()" 
	   id="promotion" placeholder="Search for #PromotionID, or #PromotionTitle" name="username"
	   >
	   </div>
       <div>
	   <button><a href="CreatePromotion.php">add</a></button> 
	   </div>
  </div>
  
  <!-- Table -->
  <div class="table-responsive">
       <table class="table table-striped table-hover">
	       <thead>
		       <tr>
			       <th>PromotionID</th>
				   <th>Promotion Title</th>
				   <th>Last Claimed</th>
			   </tr>
		   </thead>
	   </table>
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
</html>\