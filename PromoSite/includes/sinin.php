<?php
    session_start();
	
	// variable declaration
	$username = "";
	$email    = "";
    $country = "";
    $state = "";
    $city = "";
    $bday = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'promoalert');


// LOGIN USER
	if (isset($_POST['login_submit'])) {
		$username = mysqli_real_escape_string($db, $_POST['cust_username']);
		$password = mysqli_real_escape_string($db, $_POST['cust_password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM customer WHERE cust_username='$username' AND cust_password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}
			if ($username == "admin" && $password == md5("admin") ){
				$_SESSION['username'] = $username;
				header('location: ..\adminindex.php');
			}
			else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}


?>