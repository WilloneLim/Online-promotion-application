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
        box-sizing: border-box;
        margin-bottom: 20px;
        margin-left: 260px;
        padding: 8px;
        width: 260px;
        height: 32px;
        border: none;
        border-bottom: 1px solid #AAA;
        font-family: sans-serif;
        font-weight: 400;
        font-size: 15px;
        transition: 0.2s ease;
	}
	
	
    .apa:focus {
       border-bottom: 2px solid #16a085;
       color: #16a085;
       transition: 0.2s ease;
    }
	
	.apa #country {
		display: block;
        box-sizing: border-box;
        margin-bottom: 20px;
        margin-left: 260px;
        padding: 8px;
        width: 260px;
        height: 32px;
        border: none;
        border-bottom: 1px solid #AAA;
        font-family: sans-serif;
        font-weight: 400;
        font-size: 15px;
        transition: 0.2s ease;
	}
	
	
	
	.apa #state {
		display: block;
        box-sizing: border-box;
        margin-bottom: 20px;
        margin-left: 260px;
        padding: 8px;
        width: 260px;
        height: 32px;
        border: none;
        border-bottom: 1px solid #AAA;
        font-family: sans-serif;
        font-weight: 400;
        font-size: 15px;
        transition: 0.2s ease;
	}
	
	.apa #city {
		display: block;
        box-sizing: border-box;
        margin-bottom: 20px;
        margin-left: 260px;
        padding: 8px;
        width: 260px;
        height: 32px;
        border: none;
        border-bottom: 1px solid #AAA;
        font-family: sans-serif;
        font-weight: 400;
        font-size: 15px;
        transition: 0.2s ease;
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
        <h1><b>Sign up</b></h1>
          <hr>
        <div class="input1">
        <input type="text" name="cust_username" placeholder="Username" required/>
		<input type="text" name="cust_email" placeholder="E-mail" required/>
        <input type="password" name="cust_pwd" placeholder="Password" required/>
		<br>
		<div class="apa" >
		<select id="country" name="country" required="required">
		<option value="" selected>Please choose a Country</option>
		<option value="Malaysia">Malaysia</option>
		</select>
		</div>
		<br>
		<div class="apa">
		<select id="state" name="state" required="required">
		<option value="" selected>Please choose a State</option>
		<option value="Sarawak">Sarawak</option>
		</select>
		</div>
		<br>
		<div class="apa">
		<select id="city" name="city" required="required">
		<option value="" selected>Please choose a City</option>
		<option value="Kuching">Kuching</option>
		<option value="Serian">Serian</option>
		<option value="Kota Samarahan">Kota Samarahan</option>
		<option value="Sibu">Sibu</option>
		</select>
		</div>
		<br>
		<input  class="ala" type="date" name="cust_bday" placeholder="Date of Birth" required/>
    </div>
        <input type="submit" name="signup_submit" value="Sign up" />
  

        <div class="text-center">
         <span class="txt1">
            Already have an account?</span>
            
            <a href="signin.html" class="txt2">Log In</a>
        </div>
        
    </div>    
    
    
    </form>  
       
       
       
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