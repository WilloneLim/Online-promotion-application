<?php
include 'connect.php';
session_start();

if(isset($_POST['search']))
{

	 $valueToSearch = $_POST['valueToSearch'];
	 $query = "SELECT * FROM `application` WHERE CONCAT(`app_id`, `app_username`) LIKE '%".$valueToSearch."%'";
     $search_result = filterTable($query);
}else {
	 $query = "SELECT * FROM `application`";
	 $search_result = filterTable($query);
}

function filterTable($query)
{
	$connect = mysqli_connect("localhost", "root", "", "promoalert");
	$filter_Result = mysqli_query($connect, $query);
	return $filter_Result;

}


$conn->close();
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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!--    <link rel="stylesheet" href="css/main.css">-->
</head>
<body>
    <div class="header">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
        <a class="navbar-brand" href="adminindex.php">
            <img src="images/navnav.png" height="30" alt="PromoAlert Logo">
        </a>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Applications
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="promoapplicantview.php">Promotions</a>
                <a class="dropdown-item" href="applicantview.php">Promoters</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signin.php">Sign Out</a>
            </li>
          </ul>
            </div>
        </nav>
    </div>

<div class="container">
<hr class="w-75 mt-5 "/>
<h1 class="text-center mb-2">New Applications</h1>
<hr class="w-75"/>

<form action="applicantview.php" method="POST">
<a href="addpromoteradmin.php" class="btn btn-primary float-right mb-3">+</a>


<div class="input-group mb-3">
  <input type="text" class="form-control" name="valueToSearch" placeholder="Search for #ID, or #Username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" name="search" value="Search">Search</button>
  </div>
</div>
  <!-- Table -->
  <div class="table-responsive">
       <table class="table table-striped table-hover">
	       <thead>
		       <tr>
			       <th>Application ID</th>
				   <th>Applicant Name</th>
				   <th>Email</th>
                   <th></th>
                   <th></th>
			   </tr>
		   </thead>
		   <?php while($row = mysqli_fetch_array($search_result)):?>

		      <tr id="<?php echo $row['app_id'];?>">
			     <td><?php echo $row['app_id'];?></td>
				 <td><?php echo $row['app_username'];?></td>
				 <td><?php echo $row['app_email'];?></td>
				 <td><a class="btn btn-success text-white w-100"> View </a></td>
				 <td><a href="javascript:delete_id(<?php echo $row['app_id'];?>)" class="btn btn-danger text-white w-100 remove" id="del_click">Delete</a></td>
			  </tr>

		   <?php endwhile; ?>
	   </table>
  </div>
 </form>


</div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>

<script type="text/javascript">
function delete_id(id)
{
     if(confirm('Sure To Remove This Record ?'))
     {
        window.location.href='delete.php?del_id='+id;
     }
}
</script>
</body>
</html>
