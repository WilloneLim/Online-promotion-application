<?php
include 'connect.php';

$msg = $uname = $email = $country = $state = $city = $date = $password = $cpassword = "";

$sql = "SELECT * FROM promotion";
    $result = $conn->query($sql);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = test_input($_POST["cust_username"]);
    $email = test_input($_POST["cust_email"]);
    $password = test_input($_POST["password"]);
    $cpassword = test_input($_POST["ccpassword"]);
    $country = test_input($_POST["country"]);
    $state = test_input($_POST["state"]);
    $city = test_input($_POST["city"]);
    $date = test_input($_POST["cust_bday"]);


    if($uname=="" || $email=="" || $password=="" || $cpassword == "" || $country=="" || $state=="" || $city=="" || $date == ""){
        $msg = "Please Fill Every Box.";
    }else{

       if($password != $cpassword){
           $msg = $cpassword;
       }else{
           $pieces = explode("/", $date);
           if(date("Y") < $pieces[2]){
               $msg = "Please select correct birthdate";
           }else{

               $sql = "INSERT INTO customer (cust_username, cust_email, cust_password, cust_country, cust_city, cust_state, cust_bday) VALUES ('".$uname."', '".$email."', '".$password."', '".$country."', '".$city."', '".$state."', '".$date."')";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('You have been registered successfully!!! Now Please Log In');</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

           }
       }
    }

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

        }
    }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//geodata.solutions/includes/countrystatecity.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

	<style>
	.ala {
		display: block;
        margin-bottom: -5px;
        margin-left: 263px;
        width: 260px;
        height: 32px;
        border: none;
        font-family: sans-serif;
        font-weight: 400;
        font-size: 15px;
        transition: 0.2s ease;
        text-transform: uppercase;
	}


    .apa:focus {
       border-bottom: 2px solid #16a085;
       color: #16a085;
       transition: 0.2s ease;
    }

	.apa #country {
		display: block;
        margin-bottom: 20px;
        margin-left: 260px;
        width: 260px;
        height: 32px;
        border: none;
        font-family: sans-serif;
        font-weight: 400;
        font-size: 15px;
        -webkit-transition: height 0.3s ease-in-out;
        -o-transition: height 0.3s ease-in-out;
        -moz-transition: height 0.3s ease-in-out;
        transition: height 0.3s ease-in-out;

	}



	.apa #state {
		display: block;
        margin-bottom: 20px;
        margin-left: 260px;
        width: 260px;
        height: 32px;
        border: none;
        font-family: sans-serif;
        font-weight: 400;
        font-size: 15px;
        transition: 0.2s ease;

	}

	.apa #city {
		display: block;
        margin-bottom: 20px;
        margin-left: 260px;
        width: 260px;
        height: 32px;
        border: none;
        font-family: sans-serif;
        font-weight: 400;
        font-size: 15px;
        transition: 0.5s ease;

	}

    .error {
     color: red;
     font-size: 90%;
     display: table;
   }


	</style>


</head>

<body id="main">


    <div class="header">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="images/navnav.png" height="30" alt="PromoAlert Logo">
        </a>
          <ul class="navbar-nav">
            <li class="nav-item">

            </li>
          </ul>
            </div>
        </nav>
    </div>
    <div class="container my-5 ">
    <!-- Sign up form -->
    <form name="signupform" method="post"  action="signup.php" >



        <div class="col-md-8 d-block mx-auto border shadow-lg p-3 mb-5 bg-white rounded">
        <div class="row">
        <img src="images/navlogo.png" alt="signuplogo" class="col-md-2 d-block mx-auto my-4">
        <h1 class="col-md-12 text-center"><b>Register</b></h1>
            <h5 class="col-md-6 text-center border bg-danger d-block mx-auto text-light"><?php echo $msg; ?></h5>

        </div>
        <hr>
        <div class= "col-md-8 d-block mx-auto">
        <div class="form-group">
        <input type="text" name="cust_username" class="form-control" placeholder="Username"/>
        <div class="error" id="nameErr"></div>
        </div>

        <div class="form-group">
		<input type="text" name="cust_email" class="form-control" placeholder="E-mail" />
        <div class="error" id="emailErr"></div>
        </div>

        <div class="form-group">
        <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
        </div>

        <div class="form-group">
        <input type="password" name="ccpassword" class="form-control" id="ccpassword" placeholder="Password" />
        </div>

        <select name="country" class="countries custom-select mr-sm-2 mb-2" id="countryId">
            <option value="">Select Country</option>
        </select>
        <select name="state" class="states  custom-select mr-sm-2  mb-2" id="stateId">
            <option value="">Select State</option>
        </select>
        <select name="city" class="cities  custom-select mr-sm-2  mb-2" id="cityId">
            <option value="">Select City</option>
        </select>

        <input id="datepicker"  name="cust_bday" placeholder="Your Birth Date"/>

        <input type="submit" name="signup_submit" class="btn btn-primary d-block mt-4 mx-auto col-md-9 border" value="Sign up" />

        <div class="text-center mb-5">
         <span>Already have an account?</span><a href="signin.php" class="txt2">Log In</a>
        </div>

    </div>

    </div>
    </form>
    </div>

    <br/>
    <br/>
    <br/>
    <br/>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
    <script>
//
//
//    function printError(elemId, hintMsg) {
//    document.getElementById(elemId).innerHTML = hintMsg;
//        }
//      function validateForm() {
//    // Retrieving the values of form elements
//    var name = document.signupform.cust_username.value;
//    var email = document.signupform.cust_email.value;
//    var pass = document.signupform.password.value;
//    var passwordcfm = document.signupform.confirm_password.value;
//    var country = document.signupform.country.value;
//    var state = document.signupform.state.value;
//    var city = document.signupform.city.value;
//    var date = document.signupform.cust_bday.value;
//
//
//    var nameErr = emailErr = passErr= cfmpassErr = countryErr =  stateErr = cityErr = genderErr = dateErr = true;
//
//
//   // Validate name
//    if(name == "") {
//        printError("nameErr", "Please enter your name");
//    } else {
//        var regex = /^[a-zA-Z0-9-_ \s]+$/;
//        if(regex.test(name) === false) {
//            printError("nameErr", "Please enter a valid name");
//        } else {
//            printError("nameErr", "");
//            nameErr = false;
//        }
//    }
//
//
//          // Validate email address
//    if(email == "") {
//        printError("emailErr", "Please enter your email address");
//    } else {
//        // Regular expression for basic email validation
//        var regex = /^\S+@\S+\.\S+$/;
//        if(regex.test(email) === false) {
//            printError("emailErr", "Please enter a valid email address");
//        } else{
//            printError("emailErr", "");
//            emailErr = false;
//        }
//    }
//
//          //Validate password
//
//          if(pass.length == 0 || pass.length < 6){
//              printError("passErr", "Password must be at least 6 characters long");
//
//          }else{
//             printError("passErr", "");
//             passErr = false;
//          }
//            if(pass != passwordcfm){
//              printError("cfmpassErr", "Password doesn't match!");
//
//          }else{
//             printError("cfmpassErr", "");
//             cfmpassErr = false;
//        }
//
//
//
//           // Validate country
//          if(country == "defaultCountry") {
//              printError("countryErr", "Please select your country");
//          } else {
//              printError("countryErr", "");
//              countryErr = false;
//          }
//
//
//          //validate state
//          if(state == "defaultState") {
//            printError("stateErr", "Please select your state");
//          } else {
//              printError("stateErr", "");
//              stateErr = false;
//          }
//
//          //validate city
//          if(city == "defaultCity") {
//            printError("cityErr", "Please select your city");
//          } else {
//              printError("cityErr", "");
//              cityErr = false;
//          }
//
//          //validate date
//          if(date == ""){
//            printError("dateErr", "Please select a date");
//          } else {
//              printError("dateErr", "");
//              dateErr = false;
//          }
//
//
//
//           if((nameErr || emailErr || passErr || cfmpassErr || countryErr || stateErr || cityErr || dateErr)  == true) {
//           return false;
//           }
//
//      };

    </script>
</body>
</html>
