<?php
include 'connect.php';
session_start();

if ( ! empty( $_POST ) ) {
    if (isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        // Getting submitted user data from database

        $sqla = "SELECT * FROM customer WHERE cust_username ='".$_POST['username']."' AND cust_password ='".$_POST['password']."'";
        $result = mysqli_query($conn,$sqla);
        $row  = mysqli_fetch_array($result);

        $sqlb = "SELECT * FROM promoter WHERE promoter_username ='".$_POST['username']."' AND promoter_password ='".$_POST['password']."'";
        $resultb = mysqli_query($conn,$sqlb);
        $rowb  = mysqli_fetch_array($resultb);

        $sqlc = "SELECT * FROM admin WHERE admin_username ='".$_POST['username']."' AND admin_password ='".$_POST['password']."'";
        $resultc = mysqli_query($conn,$sqlc);
        $rowc  = mysqli_fetch_array($resultc);

        if(is_array($row)) {
            $_SESSION["cust_id"] = $row['cust_id'];
            header("Location:index.php");
        } else {

            if(is_array($rowb)) {
            $_SESSION["pro_id"] = $rowb['promoter_id'];
            header("Location:promoter.php");
            } else {

                if(is_array($rowc)) {
                $_SESSION["admin_id"] = $rowc['admin_id'];
                header("Location:adminindex.php");
                }else{
                    $message = "Invalid Username or Password!";
                }
            }
        }


        }
    }
?>

<style>
    .error{
     color: red;
     font-size: 90%;
     display: table; 
        margin-left: 260px;
    }

</style>


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
    <link rel="stylesheet" type="text/css" href="css/main.css">


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.rawgit.com/oauth-io/oauth-js/c5af4519/dist/oauth.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.12.0/bootstrap-social.min.css">
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

    <form method="post" name="loginform" onsubmit="return validateForm()">
    <div id="login-box">

        <img src="images/navlogo.png" height="60" alt="signuplogo" id="slogo">
        <h1 class="sign"><b>Log In</b></h1>
          <hr>

        <div class="input1">
        <input type="text" name="username"  placeholder="Username" />
        <div class="error" id="nameErr"></div>
        <input type="password" name="password" id ="password"  placeholder="Password" />
        <div class="error" id="passErr"></div>
            <label><input type = "checkbox" id="togglePass" value="value"> Show password</label>
        </div>

        <input type="submit" name="login_submit" value="Log In"/>

        <div class="seperator"><i>OR</i></div>
        <a id="facebook-button" class="btn btn-social btn-facebook">
        <i class="fa fa-facebook"></i> Log in with <b>Facebook</b></a>
        <a  id="twitter-button" class="btn btn-social btn-twitter">
        <i class="fa fa-twitter"></i> Log in with <b>Twitter</b></a>
        <a  id="google-button" class="btn btn-social btn-google ">
        <i class="fa fa-google"></i> Log in with <b>Google</b></a>

        <div class="text-center2">
         <span class="txt2">
            Create an account?</span>

            <a href="signup.php" class="txt2">Sign Up</a>
        </div>

    </div>
    </form>

    <script>
     function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
     }
      function validateForm() {
    // Retrieving the values of form elements 
    var name = document.loginform.username.value;
    var pass = document.loginform.password.value;
    
    var nameErr = passErr = true;
    
    if(name == "") {
        printError("nameErr", "Please enter your name");
    } else {
        printError("nameErr", "");
        nameErr = false;
        }
          
          
     if(pass.length == 0){
         printError("passErr", "Please enter your password");      
    }else{
         printError("passErr", "");
         passErr = false;
        }     
         
    if((nameErr || passErr)  == true) {
         return false;
       }
          
    };
    
    
    </script>
    <script>
        const togglePass = document.getElementById('togglePass');

        const showhidePass = () => {
            const password = document.getElementById('password');
            if(password.type === 'password') {
                password.type = 'text';
            }else{
                password.type = 'password';
            }
        };

        togglePass.addEventListener('change', showhidePass);
    </script>
    <!--Twitter-->
    <script>
        $('#twitter-button').on('click', function() {
  // Initialize with your OAuth.io app public key
  OAuth.initialize('ATdya0ncXhQQMPaJCAgyou4wAqY');
  // Use popup for OAuth
  OAuth.popup('twitter').then(twitter => {
    console.log('twitter:', twitter);
    // Prompts 'welcome' message with User's email on successful login
    // #me() is a convenient method to retrieve user data without requiring you
    // to know which OAuth provider url to call
    twitter.me().then(data => {
      console.log('data:', data);
      alert('Twitter says your email is:' + data.email + ".\nView browser 'Console Log' for more details");
    });
    // Retrieves user data from OAuth provider by using #get() and
    // OAuth provider url
    twitter.get('/1.1/account/verify_credentials.json?include_email=true').then(data => {
      console.log('self data:', data);
    })
  });
})
    </script>


    <!--Google-->
    <script>
        $('#google-button').on('click', function() {
  // Initialize with your OAuth.io app public key
  OAuth.initialize('ATdya0ncXhQQMPaJCAgyou4wAqY');
  // Use popup for oauth
  OAuth.popup('google').then(google => {
    console.log('google:',google);
    // Retrieves user data from oauth provider
    // Prompts 'welcome' message with User's email on successful login
    // #me() is a convenient method to retrieve user data without requiring you
    // to know which OAuth provider url to call
    google.me().then(data => {
      console.log('me data:', data);
      alert('Google says your email is:' + data.email + ".\nView browser 'Console Log' for more details");
    });
    // Retrieves user data from OAuth provider by using #get() and
    // OAuth provider url
    google.get('/plus/v1/people/me').then(data => {
      console.log('self data:', data);
    })
  });
})
    </script>

    <!--Facebook-->
   <script>
      $('#facebook-button').on('click', function() {
        // Initialize with your OAuth.io app public key
        OAuth.initialize('ATdya0ncXhQQMPaJCAgyou4wAqY');
        // Use popup for oauth
        OAuth.popup('facebook').then(facebook => {
          console.log('facebook:',facebook);
          // Prompts 'welcome' message with User's email on successful login
          // #me() is a convenient method to retrieve user data without requiring you
          // to know which OAuth provider url to call
          facebook.me().then(data => {
            console.log('me data:', data);
            alert('Facebook says your email is:' + data.email + ".\nView browser 'Console Log' for more details");
          })
          // Retrieves user data from OAuth provider by using #get() and
          // OAuth provider url
          facebook.get('/v2.5/me?fields=name,first_name,last_name,email,gender,location,locale,work,languages,birthday,relationship_status,hometown,picture').then(data => {
            console.log('self data:', data);
          })
        });
      })
    </script>


</body>
</html>
