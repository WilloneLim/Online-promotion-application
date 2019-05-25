<?php

include 'connect.php';
session_start();

if(isset($_POST['search']))
{

	 $valueToSearch = $_POST['valueToSearch'];
	 $query = "SELECT * FROM `promotion` WHERE CONCAT(`promo_id`) LIKE '%".$valueToSearch."%'";
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
    <!--<link rel="stylesheet" href="css/main.css">-->
	
    <style>
	.data {
		list-style-type: none;
		
	}
	</style>
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
              <?php
			     if ( isset( $_SESSION['admin'])){
					 echo '<a class="nav-link" href="myaccount.php">My Account</a>';
				 }else{
					 echo '<a class="nav-link" href="signin.php">Log In</a>';
				 }
			  ?>
            </li>
          </ul>
            </div>
        </nav>
    </div>
	
	
<?php
    
     if(isset($_GET['id'])) {
		 
		 $sql = "SELECT * FROM promoter WHERE promoter_id = ".$_GET['id'];
		 
		 $result = $conn->query($sql) or die($conn->error);
		while($row = $result->fetch_assoc()) {
         echo '<div class="container">';
				 echo '<div class="container">';
				 echo '<form action="PromoterActivity.php" method="POST">';
				 echo '<div class="row">';
                 echo '<div class="col-sm-4">';
                 echo '</br>';
                 echo '</br>';
				 echo '<img src="images/'.$row['promoter_profile'].'" alt="tealiveid" id="imginfo" style="width:300px;height:200px">';
				 echo '</div>';
                 echo '<div class="col-sm-6">';
	             echo '<hr class="w-100 mt-5" />';
                 echo '<h3 class="text-center mb-2">'.$row['promoter_username'].'</h3>';
	             echo '<hr class="w-80 mt-5" />';
	             echo '<ul class="data">';
                 echo '<li>';
                 echo 'Last Online:';
				 echo '</li>';
				 echo '<li>';
				 echo 'No. Of Promotions:';
				 echo '</li>';
				 echo '<li>';
				 echo 'Average Claims:';
				 echo '</li>';
				 echo '</ul>';
 
                 echo '</div>';
                 echo '<div class="col-sm-2">';
                 echo  '<a href="adminindex.php"class="btn btn-primary float-right mb-3">';
                 echo '<<';
                 echo '</a>';

                 echo '</div>';
  
                 echo '</div>';
                 echo '</div>';
 echo '</br>';  
 
 echo '<form action="PromoterActivity.php" method="POST">';
 //Search Bar 
	
echo   '<a href="CreatePromotion.php" class="btn btn-primary float-right mb-3">';
echo '+';
echo '</a>';


echo '<div class="input-group mb-3">';
echo  '<input type="text" class="form-control" name="valueToSearch" placeholder="Search for #PromotionID, or #PromotionTitle" aria-describedby="basic-addon2">';
echo  '<div class="input-group-append">';
echo    '<button class="btn btn-outline-secondary" type="submit" name="search" value="Search">';
echo 'Search';
echo '</button>';
 echo '</div>';
echo '</div>';
//Table
 echo '<div class="table-responsive">';
   echo    '<table class="table table-striped table-hover">';
	echo       '<thead>';
	echo	       '<tr>';
	echo		       '<th>PromotionID</th>';
	echo			   '<th>Promotion Title</th>';
	echo			   '<th>Last Claimed</th>';
	echo		   '</tr>';
	echo	   '</thead>';
	echo	' <?php while($row = mysqli_fetch_array($search_result)):?>';

	echo	       '<tr class="table-row" data-href="">';
	
	echo '<a href="Promoterview.php?id='.$row['promoter_id'].'">';
	
	$sql1 = "SELECT * FROM promotion WHERE promoter_id =".$_GET['id'];
	$result1 = $conn->query($sql1);
	
	if ($result1->num_rows > 0) {
		while($nrow = $result1->fetch_assoc()){
	
	
				 echo '<td>';
				 echo '<a href="promotionamount.php?id='.$row['promoter_id'].'">';
				 echo $nrow['promo_id'];
				 echo '</a>';
				 echo '</td>';
				 echo '<td>';
				 echo '<a href="promotionamount.php?id='.$row['promoter_id'].'">';
				 echo $nrow['promo_title'];
				 echo '</a>';
				 echo '</td>';
				 echo '<td>';
				 echo 'To be added';
				 echo '</td>';
			          echo '<td>';
				 echo '<a class="btn btn-success text-white w-100" >';
				 echo 'Edit';
				 echo '</a>';
				 echo '</td>';
				 echo '<td>';
				 echo '<a href="javascript:delete_id(<?php echo' .$row['promoter_id'].';?>)" class="btn btn-danger text-white w-100 remove" id="del_click">';
				 echo 'Delete';
				 echo '</a>';
				 echo '</td>';
			  echo '</tr>';
		  echo  '<?php endwhile; ?>';
		  echo '</table>';
		  echo '</div>';
		  echo '</form>';
		  echo '</div>';
			
	           echo '<script type="text/javascript">';
echo 'function delete_id(id)
{
     if(confirm("Sure To Remove This Record ?"))
     {
        window.location.href="dep.php?del_id="+id;
     }
}';
echo '</script>';
		  
		}
	}
	 }
	 }
		 
?>
</body>
</html>
