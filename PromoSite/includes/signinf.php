<?php

session_start();

if (isset($_POST['login_submit'])) {
	
	include 'includes\connect.php';
	
	$email = mysqli_real_escape_string($conn, $_POST['cust_email']);
	$password = mysqli_real_escape_string($conn, $_POST['cust_password']);
	
	//Error handlers
	//Chechk if inputs are empty
	if ( empty($email) || empty($password)) {
		header("Location: ../index.php?login=empty");
		exit();
	}else{
		$sql = "SELECT * FROM customer WHERE cust_email='$email' OR cust_username='$username'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=error");
			exit();
		}else{
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($password, $row['cust_password']);
				if($hashedPwdCheck == false) {
					header("Location: ../index.php?login=error");
					exit();
				} elseif ($hashedPwdCheck == true) {
					//Log in the user here
					$_SESSION['c_id'] = $row['cust_id'];
					$_SESSION['c_username'] = $row['cust_username'];
					$_SESSION['c_email'] = $row['cust_email'];
					$_SESSION['c_country'] = $row['cust_country'];
					$_SESSION['c_state'] = $row['cust_state'];
					$_SESSION['c_bday'] = $row['cust_bday'];
					header("Location: ../index.php?login=success");
					exit();
					
					
				}
			}
		}
	}
}else{
		header("Location: ../index.php?login=error");
		exit();
	}