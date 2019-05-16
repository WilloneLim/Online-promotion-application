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
    
	<style>
	.ala {
		display: block;
        margin-bottom: -5px;
        margin-left: 260px;
        width: 260px;
        height: 32px;
        border: none;
        font-family: sans-serif;
        font-weight: 400;
        font-size: 15px;
        transition: 0.2s ease;
        border: 1px solid #AAA;
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
        border: 1px solid #AAA;
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
        border: 1px solid #AAA;
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
        border: 1px solid #AAA;
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
    
    <!-- Sign up form -->
    <form method="post"  action="includes/signupf.php">
    <div id="login-box">
        <img src="images/navlogo.png" height="60" alt="signuplogo" id="slogo">
        <h1 class="sign"><b>Sign up</b></h1>
          <hr>
        <div class="input1">
        <input type="text" name="cust_username" minlength="3" maxlength="15" placeholder="Username" required/>
		<input type="text" name="cust_email" placeholder="E-mail" required/>
        <input type="password" name="password" id="password" minlength="3" maxlength="15" placeholder="Password" required/>
        <input type="password" name="confirm_password" id="confirm_password"  minlength="3" maxlength="15" placeholder="Confirm Password" required/>
		
        <div class="apa" >  
		<select id="country" name="country" required="required">
		<option value=""  disabled selected>Please select a Country</option>
		<option value="Malaysia">Malaysia</option>
		</select>
		</div>
		
		<div class="apa">
		<select id="state" name="state" required="required">
		<option value=""  disabled selected>Please choose a State</option>
		<option value="Johor">Johor</option>
		<option value="Kedah">Kedah</option>
		<option value="Kelantan">Kelantan</option>
		<option value="Malacca">Malacca</option>
		<option value="Negeri Sembilan">Negeri Sembilan</option>
		<option value="Pahang">Pahang</option>
		<option value="Pulau Pinang">Pulau Pinang</option>
		<option value="Perak">Perak</option>
		<option value="Perlis">Perlis</option>
		<option value="Sabah">Sabah</option>
		<option value="Sarawak">Sarawak</option>
		<option value="Selangor">Selangor</option>
		<option value="Terengganu">Terengganu</option>
		<option value="Wilayah Persekutuan - Kuala Lumpur">Wilayah Persekutuan - Kuala Lumpur</option>
		<option value="Wilayah Persekutuan - Labuan">Wilayah Persekutuan - Labuan</option>
		<option value="Wilayah Persekutuan - Putrajaya">Wilayah Persekutuan - Putrajaya</option>
		</option>
		</select>
		</div>
		
		<div class="apa">
		<select id="city" name="city" required="required">
		<option value="" disabled selected>Please choose a City</option>
		<option value="Johor Bahru">Johor Bahru</option>
		<option value="Alor Setar">Alor Setar</option>
		<option value="Kota Bharu">Kota Bharu</option>
		<option value="Malacca City">Malacca City</option>
		<option value="Seremban">Seremban</option>
		<option value="Kuantan">Kuantan</option>
		<option value="Georgetown">Georgetown</option>
		<option value="Ipoh">Ipoh</option>
		<option value="Kangar">Kangar</option>
		<option value="Shah Alam">Shah Alam</option>
		<option value="Kota Kinabalu">Kota Kinabalu</option>
		<option value="Kuala Lumpur">Kuala Terengganu</option>
		<option value="Kuching">Kuching</option>
		<option value="Kuala Lumpur">Kuala Lumpur</option>
		<option value="Victoria">Victoria</option>
		<option value="Putrajaya">Putrajaya</option>
		</option>
		</select>
		</div>
		
		<input  class="ala" type="date" name="cust_bday" placeholder="Date of Birth" required/>
        </div>
        <input type="submit" id="signup" name="signup_submit" value="Sign up" />
  

        <div class="text-center1">
         <span class="txt1">
            Already have an account?</span>
            
            <a href="signin.php" class="txt2">Log In</a>
        </div>
        
    </div>    
    
    
    </form>  
    
    <script>
     var password = document.getElementById("password"), 
         confirm_password = document.getElementById("confirm_password");

     function validatePassword(){
        if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Doesn't Match");
     } else {
        confirm_password.setCustomValidity('');
            }
     }

     password.onchange = validatePassword;
     confirm_password.onkeyup = validatePassword;
    </script>
       
       
    <!--Twitter-->
    <script>
        $('#twitter-button').on('click', function() {
  // Initialize with your OAuth.io app public key
  OAuth.initialize('YOUR_OAUTH_KEY');
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
