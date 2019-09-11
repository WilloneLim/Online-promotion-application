<?php
include 'connect.php';

$msg = $uname = $email = $country = $state = $city = $date = $password = $cpassword = $chk = "";

$a_email = array();

$sql = "SELECT * FROM customer";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $a_email[] = $row['cust_email'];
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = mysqli_real_escape_string($conn,test_input($_POST["cust_username"]));
    $email = mysqli_real_escape_string($conn,test_input($_POST["cust_email"]));
    $password = mysqli_real_escape_string($conn,test_input($_POST["password"]));
    $cpassword = mysqli_real_escape_string($conn,test_input($_POST["ccpassword"]));
    $country = mysqli_real_escape_string($conn,test_input($_POST["country"]));
    $state = mysqli_real_escape_string($conn,test_input($_POST["state"]));
    $city = mysqli_real_escape_string($conn,test_input($_POST["city"]));
    $date = mysqli_real_escape_string($conn,test_input($_POST["cust_bday"]));

    if($uname=="" || $email=="" || $password=="" || $cpassword == "" || $country=="" || $state=="" || $city=="" || $date == ""){
        $msg = "Please Fill Every Box.";
    }else{
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if ($email == $row['cust_email']){
                    $chk = "yes";
                }
            }
        }
        if ($chk == "yes"){
            $msg = "Email has been used";
        }else{

       if($password != $cpassword){
           $msg = "Passwords dont match!";
       }else{
           $pieces = explode("/", $date);
           $age = date("Y") - $pieces[2];
           if(date("Y") <= $pieces[2] || ($age <= 10)){
               $msg = "Please select correct birthdate";
           }else{
               
               $password = password_hash($password, PASSWORD_DEFAULT);
               $sql = "INSERT INTO customer (cust_username, cust_email, cust_password, cust_country, cust_city, cust_state, cust_bday) VALUES ('".$uname."', '".$email."', '".$password."', '".$country."', '".$city."', '".$state."', '".$date."')";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('You have been registered successfully!!! Now Please Log In');</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

               }
           }
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

<!--
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
-->

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

	<style>
        body{
            background-image: url('images/signinimg.png');
            background-repeat:no-repeat;
            background-size: 100% auto;
            background-position: center;
            background-attachment: fixed;
        }

    .error {
     color: red;
     font-size: 90%;
     display: table;
   }

    #up{
        background-color: white;
        opacity: 0.95;
    }
        
	</style>


</head>

<body id="main" class="bg-dark">

    <div class="container my-5">
    <!-- Sign up form -->
    <form name="signupform" method="post"  action="signup.php" >

        <div class="col-md-8 d-block mx-auto shadow-lg p-3 mb-5 rounded" id="up">
        <div class="row">
        <a href="index.php" class="d-block mx-auto my-4"><img src="images/navlogo.png" alt="signuplogo"></a>
        <h1 class="col-md-12 text-center"><b>Register</b></h1>
            <h5 class="col-md-6 text-center font-weight-normal text-danger d-block mx-auto mt-3"><?php echo $msg; ?></h5>

        </div>
        <hr>
        <div class= "col-md-8 d-block mx-auto">
        <div class="form-group">
        <input type="text" name="cust_username" class="form-control" placeholder="Username"/>
        
        </div>

        <div class="form-group">
		<input type="text" id="fname" name="cust_email" class="form-control" placeholder="E-mail" />
        <div class="error" id="emailErr"></div>
        </div>

        <div class="form-group">
        <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
        </div>

        <div class="form-group mb-0">
        <input type="password" name="ccpassword" class="form-control" id="ccpassword" placeholder="Password" />
        </div>
        <div class="error mt-0 mb-2" id="pwordErr"></div>

        <select name="country" class="countries custom-select mr-sm-2 mb-2" id="countryId">
            <option value="">Select Country</option>
        </select>
        <select name="state" class="states  custom-select mr-sm-2  mb-2" id="stateId">
            <option value="">Select State</option>
        </select>
        <select name="city" class="cities  custom-select mr-sm-2  mb-2" id="cityId">
            <option value="">Select City</option>
        </select>

        <input id="datepicker" name="cust_bday" placeholder="Your Birth Date"/>
        <div class="error mt-0 mb-2" id="dateErr"></div>

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
        var emails = <?php echo json_encode($a_email); ?>;
        
        document.getElementById("fname").onchange = function() {myFunction("email")};
        
        
        document.getElementById("password").onchange = function() {myFunction("password")};
        document.getElementById("ccpassword").onchange = function() {myFunction("password")};
        
        document.getElementById("datepicker").onchange = function() {myFunction("date")};
        
        

        function myFunction(type) {
            var x = document.getElementById("fname");
            var y = document.getElementById("emailErr");
            
            var chk1 = 0;
            var chk2 = 0;
            
            var a = document.getElementById("password");
            var b = document.getElementById("ccpassword");
            var c = document.getElementById("pwordErr");
            
            
            var d = document.getElementById("datepicker");
            var e = document.getElementById("dateErr");
            
            var array = d.value.split("/");
            var now = new Date().getFullYear();
            
            var hasNumber = /\d/;
            var isEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            
            if(type == "email"){
                if(!isEmail.test(x.value)){
                    y.innerHTML = "Please enter a valid email";
                }else{
                    for (i = 0; i < emails.length; i++) { 
                        if(x.value == emails[i]){
                            chk1 = 1;
                        }
                    }
                    if(chk1 == 1){
                        y.innerHTML = "This email is taken!";
                    }else{
                        y.innerHTML = "";
                    }
                }
                
            }else if(type == "password"){
                if(a.value.length < 6 || a.value.length > 18){
                    c.innerHTML = "Passwords must have 6 to 18 characters";
                }else{
                    if(!hasNumber.test(a.value)){
                        c.innerHTML = "Passwords must include at least 1 number";
                    }else{
                        if(a.value != b.value && b.value != ""){
                            c.innerHTML = "Passwords do not match!";
                        }else{
                            c.innerHTML = "";
                        }
                    }
                }
            }else{
                if((now-Number(array[2])) < 10){
                    e.innerHTML = "Are you sure you're "+(now-Number(array[2]))+" years old?";
                }else{
                    e.innerHTML = "";
                }
                
            }
        }
    </script>
</body>
</html>
