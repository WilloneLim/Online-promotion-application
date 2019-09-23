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
    <link rel="stylesheet" href="css/main2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	  
	  <script src="croppie.js"></script>

   
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
	
	<?php
	 if(isset($_GET['id'])) {
		 
		 $sql = "SELECT * FROM application WHERE app_id = ".$_GET['id'];
		 
		 $result = $conn->query($sql) or die($conn->error);
		 while($row = $result->fetch_assoc()){
			 echo '<div ng-app="">';
			 echo '<div class="container">';
			 echo '<hr class="w-75 mt-5" />';
			 echo '<h1 class="text-center mt-0">';
			 echo 'Create new Promoter Account';
			 echo '</h1>';
			 echo '<hr class="w-75" />';
			      echo '<div class="row mt-5 shadow-lg">';
				  echo '<div class="col-md-5 border">';
				     echo '<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>';
					 echo '<br/>';
					   echo '<h5 class="text-muted font-weight-normal">';
					       echo 'Please select a cover image';
					   echo '</h5>';
					   echo '<div class="custom-file mb-3">';
					    
						 echo '<label class="form-control"  for="customFileA">';
						     echo $row['app_cover'];
						 echo '</label>';
						 
					   echo '</div>';
					   echo '<br/>';
					   echo '<h5 class="text-muted font-weight-normal">';
					   echo 'Please select a profile image';
					   echo '</h5>';
					      echo '<div class="custom-file mb-3">';
						     
							  echo '<label class="form-control" for="customFileB">';
							     echo $row['app_profile'];
							  echo '</label>';
					      echo '</div>';
						  
						  echo '<div class="form-group mt-3">';
						  echo '<label for="title">';
						      echo 'Username';
						  echo '</label>';
						  echo '<small class="text-muted ml-2"> ';
						      echo 'Brand Name';
						  echo '</small>';
							   echo '<label class="form-control" for="title">';
							     echo $row['app_username'];
							  echo '</label>';
						
						  echo '</div>';
						  
						  echo '<div class="form-group mt-3">';
						  echo '<label for="desp">';
						      echo 'Description';
						  echo '</label>';
						  echo '<small class="text-muted ml-2"> ';
						      echo 'About Brand';
						  echo '</small>';
						      echo '<label class="form-control" for="title">';
							     echo $row['app_desp'];
							  echo '</label>';
						  echo '</div>';
						  
						  
						  echo '<div class="form-group">';
						      echo '<label for="email">';
							      echo 'Email address';
							  echo '</label>';
							   echo '<label class="form-control" for="title">';
							     echo $row['app_email'];
							  echo '</label>';
							  echo '<small class="text-muted ml-2">';
							     echo 'You will receive a confirmation email once your application is validated';
							  echo '</small>';
							  
						  echo '</div>';
						  
						  echo '</br>';
						  echo '</br>';
						  
						   echo '<div class="form-group">';
						      echo '<label for="password">';
							      echo 'Password';
							  echo '</label>';
							   echo '<label class="form-control" for="password">';
							     echo $row['app_password'];
							  echo '</label>';
							  
						  echo '</div>';
						  
						  echo '</br>';
						  
						  echo '<h5 class="font-weight-normal">';
						  echo 'Keywords';
						  echo '</h5>';
						  echo '<hr class="w-50 ml-0 mt-1" />';
						  echo '<div class="form-check form-check-inline ">';
						  echo '<input class="form-check-input" type="checkbox" id="cbkey1" value="food" name="pro_key[]">';
						  echo $row['app_key'];
						  echo '</div>';
						  echo '</br>';
						  echo '</br>';
						  echo '<div class="row">';
						  echo '<a class="col-md-3 btn btn-danger mb-5 mx-auto font-weight-bold">';
						  echo 'Cancel';
						  echo '</a>';
						  echo '<button type="submit" class="col-md-7 btn btn-warning mb-5 mx-auto font-weight-bold" name="upload" value="upload">';
						  echo 'Create Promoter Account';
						  echo '</button>';
					      echo '</div>';
					 echo '</form>';
					
				  echo '</div>';
				  
				  echo '<div class="col-md-7 border px-0">';
				      echo '<h5 class="bg-light text-black-50 m-0 py-2 pl-2">';
					  echo 'Preview:';
					  echo '</h5>';
					  echo '<img src="images/'.$row['app_cover'].'"id="previewc" class="d-block w-100" alt="Example">';
					  echo '<div class="row">';
					      echo '<div class="col-md-4 border ml-3 shadow-lg mb-5" id="headline">';
						     echo '<img src="images/'.$row['app_profile'].'" class="mx-auto mt-3 d-block w-50 border" id="previewp" alt="Example">';
							 echo '<div class="container" width="820" height="315" >';
							 echo '</div>';
							 echo '<h4 class="text-center">';
							    echo $row['app_username'];
							 echo '</h4>';
							 echo '<p class="predesp">';
							     echo $row['app_desp'];
							 echo '</p>';
						  echo '</div>';
						  
						  echo '<div class="col-md-7 border ml-4 shadow-lg" id="headline">';
						     echo '<h3 class="text-center mt-2">';
							      echo 'Our Promos';
							 echo '</h3>';
							 echo '<br/>';
							 echo '<br/>';
							 echo '<br/>';
							 echo '<br/>';
							 echo '<br/>';
							 echo '<br/>';
							 echo '<br/>';
							 echo '<br/>';
							 echo '<br/>';
							 echo '<br/>';
							 echo '<br/>';
							 echo '<br/>';
						  echo '</div>';
				  
				  echo '</div>';
				  
				  echo '</div>';
			 echo '</div>';
			 echo '</div>';
		 }
	 }
	
	?>

</html>