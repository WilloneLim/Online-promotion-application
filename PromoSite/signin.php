<?php
include 'connect.php';
session_start();

$message ="";

if ( ! empty( $_POST ) ) {
    if (isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        // Getting submitted user data from database

        $sqla = "SELECT * FROM customer WHERE cust_username ='".$_POST['username']."'";
        $result = mysqli_query($conn,$sqla);
        $row  = mysqli_fetch_array($result);

        $sqlb = "SELECT * FROM promoter WHERE promoter_username ='".$_POST['username']."'";
        $resultb = mysqli_query($conn,$sqlb);
        $rowb  = mysqli_fetch_array($resultb);

        $sqlc = "SELECT * FROM admin WHERE admin_username ='".$_POST['username']."'";
        $resultc = mysqli_query($conn,$sqlc);
        $rowc  = mysqli_fetch_array($resultc);

        if(is_array($row)) {
            if(password_verify($_POST['password'],$row['cust_password']) == 1){
                $_SESSION["cust_id"] = $row['cust_id'];
                header("Location:index.php");
            }
        } else {

            if(is_array($rowb)) {
                    $_SESSION["pro_id"] = $rowb['promoter_id'];
                    header("Location:promoter.php?id=".$_SESSION["pro_id"]);
            } else {

                if(is_array($rowc)) {
                    if(password_verify($_POST['password'],$rowc['admin_password']) == 1){
                        $_SESSION["admin_id"] = $rowc['admin_id'];
                        header("Location:adminindex.php");
                    }
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

    }

    #togglePass{
        margin-top: 10px;
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
<!--    <link rel="stylesheet" type="text/css" href="css/main2.css">-->


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

 <div class="container my-5 ">
    <!-- Sign up form -->
   <form method="post" name="loginform" onsubmit="return validateForm()">

        <div class="col-md-8 d-block mx-auto border shadow-lg p-3 mb-5 bg-white rounded">
        <div class="row">
        <img src="images/navlogo.png" alt="signuplogo" class="col-md-2 d-block mx-auto my-4">
        <h1 class="col-md-12 text-center"><b>Log In</b></h1>

        </div>
        <hr/>
        <div class= "col-md-5 d-block mx-auto">
        <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="Username"/>
        <div class="error" id="nameErr"></div>
        </div>

        <div class="form-group">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
        <div class="error" id="passErr"></div>

        <label><input type = "checkbox" id="togglePass" value="value"> Show password</label>
        </div>


        <p class="text-center text-danger p-0 m-0"><?php echo $message; ?></p>

         <input type="submit" name="login_submit" class="btn btn-primary d-block mx-auto" value="Log In" />


        <div class="seperator d-block mx-auto"><i>OR</i></div>
        <a id="facebook-button" class="btn btn-social btn-facebook d-block mx-auto">
        <i class="fa fa-facebook"></i> Log in with <b>Facebook</b></a>
        <a  id="twitter-button" class="btn btn-social btn-twitter d-block mx-auto">
        <i class="fa fa-twitter"></i> Log in with <b>Twitter</b></a>
        <a  id="google-button" class="btn btn-social btn-google d-block mx-auto">
        <i class="fa fa-google"></i> Log in with <b>Google</b></a>

        <div class="text-center2">
         <span class="txt2">
            Create an account?</span>

            <a href="signup.php" class="txt2">Sign Up</a>
        </div>
    </div>

    </div>
    </form>
    </div>


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
