<?php

if(isset($_POST['search']))
{

	 $valueToSearch = $_POST['valueToSearch'];
	 $query = "SELECT * FROM `promotion` WHERE CONCAT(`promo_id`, `promo_img`, `promo_title`) LIKE '%".$valueToSearch."%'";
     $search_result = filterTable($query);
}else {
	 $query = "SELECT * FROM `promotion`";
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
<!--    <link rel="stylesheet" type="text/css" href="css/main.css">-->
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
              <a class="nav-link" href="signin.php">Log In</a>
            </li>
          </ul>
            </div>
        </nav>
    </div>
    
    <div class="container">
      <div class="row">
          <div class="col-md-6 image">
              <img class="img-fluid" src="images/promo1.png" alt="tealiveid" style="margin-top:20px;">
          </div>
          <div class="col-md-6 title" style="margin-top:20px;">
              <p><b>Kentucky Fried Chicken</b></p>
              <p>Last Online:</p>
              <p>No. of promotions:</p>
              <p>Average claims:</p>
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
            <th>Promotion ID</th>
            <th>Image</th>
            <th>Promotion Title</th>
        </tr>
        </thead>
        <?php while($promotion = mysqli_fetch_array($search_result)):?>
        
        <tr>
            <td><?php echo $promotion['promo_id'];?></td>
            <td><a href="#"><img src="<?= $promotion['promo_img'] ?>" class="img-responsive" id="images" alt="product" style="width:220px;"/></a></td>
            <td><?php echo $promotion['promo_title'];?></td>
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
</body>
</html>