<?php

session_start();

if (isset($_POST['signup_submit'])) {
	 include_once 'connect.php';
	 
	 $username = mysqli_real_escape_string($conn, $_POST['cust_username']);
	$email = mysqli_real_escape_string($conn, $_POST['cust_email']);
	$password = mysqli_real_escape_string($conn, $_POST['cust_pwd']);
	$country = mysqli_real_escape_string($conn, $_POST['country']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $bday = mysqli_real_escape_string($conn, $_POST['cust_bday']);	
	
	//Error handlers
	//Check for empty fields
	if (empty($username) || empty($email) ||
	empty($password) || empty($country) || empty($state) || empty($city) || empty($bday)) {
		header("Location: ../signup.php?signup=empty");
	    exit();
		
	}else {
		//Check if input character are valid
		if (!preg_match("/^[a-zA-Z]*$/", $username)) {
			
			header("Location: ../signup.php?signup=invalid");
			exit();
		}else{
			//check if the email is valide
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=email");
			exit();
			}else{
				$sql = "SELECT * FROM customer WHERE cust_username='$username'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				
				if($resultCheck > 0) {
					header("Location: ../signup.php?signup=usertaken");
			        exit();
				}else{
		
					//hashing the password
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					
					//Insert the user into the database
					$sql = "INSERT INTO customer (cust_username, cust_email, cust_password, cust_country, 
					cust_city, cust_state, cust_bday) VALUES ('$username', '$email', '$hashedPwd', '$country', '$state', '$city', '$bday');";
					mysqli_query($conn, $sql);
					header("Location: ../signup.php?signup=success");
			        exit();
					
				}
			}
		}
	}
	
}else{
	header("Location: ../signup.php");
	exit();

}