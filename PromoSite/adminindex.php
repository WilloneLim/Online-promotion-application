<?php

if(isset($_POST['search']))
{

	 $valueToSearch = $_POST['valueToSearch'];
	 $query = "SELECT * FROM `promoter` WHERE CONCAT(`promoter_id`, `promoter_username`) LIKE '%".$valueToSearch."%'";
     $search_result = filterTable($query);
}else {
	 $query = "SELECT * FROM `promoter`";
	 $search_result = filterTable($query);
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
<!--    <link rel="stylesheet" href="css/main.css">-->
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

<div class="container">
<hr class="w-75 mt-5 "/>
<h1 class="text-center mb-2">Promoter View Application</h1>
<hr class="w-75"/>

<form action="adminindex.php" method="POST">
<a href="addpromoteradmin.php" class="btn btn-primary float-right mb-3">+</a>


<div class="input-group mb-3">
  <input type="text" class="form-control" name="valueToSearch" placeholder="Search for #PromoterID, or #Promotername" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" name="search" value="Search">Search</button>
  </div>
</div>
  <!-- Table -->
  <div class="table-responsive">
       <table class="table table-striped table-hover">
	       <thead>
		       <tr>
			       <th>PromoterID</th>
				   <th>PromoterName</th>
				   <th>LastOnline</th>
			   </tr>
		   </thead>
		   <?php while($row = mysqli_fetch_array($search_result)):?>

		      <tr class="table-row" data-href="PromoterActivity.php">
			     <td><?php echo $row['promoter_id'];?></td>
				 <td><?php echo $row['promoter_username'];?></td>
				 <td>To be added</td>
			  </tr>
		   <?php endwhile; ?>
	   </table>
  </div>
 </form>
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
	
    <!-- JS script for click function-->
	<script>
	 $(document).ready(function($) {
		 $(".table-row").click(function() {
			 window.document.location = $(this).data("href");
		 });
		 
	 });
	</script>
    
</body>
</html>
