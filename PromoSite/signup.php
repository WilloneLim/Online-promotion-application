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
    
    <!-- Sign up form -->
    <form name="signupform" method="post"  action="includes/signupf.php" onsubmit="return validateForm()" >
    <div id="login-box">
        <img src="images/navlogo.png" height="60" alt="signuplogo" id="slogo">
        <h1 class="sign"><b>Sign up</b></h1>
          <hr>
        <div class= " col-md-12">
        <div class="row">
        <input type="text" name="cust_username" placeholder="Username"/>
        <div class="error" id="nameErr"></div>
        </div>    
          
        <div class="row">
		<input type="text" name="cust_email" placeholder="E-mail" />
        <div class="error" id="emailErr"></div>
        </div>    
            
        <div class="row">
        <input type="password" name="password" id="password"  placeholder="Password" />
        <div class="error" id="passErr"></div>
        </div>
          
        <div class="row">
        <input type="password" name="confirm_password" id="confirm_password"  placeholder="Confirm Password" />
        <div class="error" id="cfmpassErr"></div>
		</div>
        
        <div class="row">
        <div class="apa" >  
		<select id="country" name="country" >
		<option value="defaultCountry" >Please select a Country</option>
		<option value="Malaysia">Malaysia</option>
		</select>
		</div>
        <div class="error" id="countryErr"></div>
		</div>
        
        <div class="row">
		<div class="apa">
		<select id="state" name="state" >
		<option value="defaultState">Please choose a State</option>
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
		</select>
		</div>
        <div class="error" id="stateErr"></div>
		</div>
            
        <div class="row">
		<div class="apa">
		<select id="city" name="city" >
		<option value="defaultCity">Please choose a City</option>
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
		</select>
		</div>
        <div class="error" id="cityErr"></div>
		</div>
          
        <div class="row">
		<input  class="ala" type="date" name="cust_bday" placeholder="Date of Birth" />
        <div class="error" id="dateErr"></div>
        </div>
        
        <div class="row">
        <input type="submit" id="signup" name="signup_submit" value="Sign up" />
        </div>

        <div class="text-center1">
         <span class="txt1">
            Already have an account?</span>
            
            <a href="signin.php" class="txt2">Log In</a>
        </div>
        
    </div>    
    
    </div>
    </form>  
    
    <script>
        
        
    function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
        }
      function validateForm() {
    // Retrieving the values of form elements 
    var name = document.signupform.cust_username.value;
    var email = document.signupform.cust_email.value;
    var pass = document.signupform.password.value;
    var passwordcfm = document.signupform.confirm_password.value;
    var country = document.signupform.country.value;
    var state = document.signupform.state.value;
    var city = document.signupform.city.value;
    var date = document.signupform.cust_bday.value;
          
          
    var nameErr = emailErr = passErr= cfmpassErr = countryErr =  stateErr = cityErr = genderErr = dateErr = true;
   
          
   // Validate name
    if(name == "") {
        printError("nameErr", "Please enter your name");
    } else {
        var regex = /^[a-zA-Z0-9-_ \s]+$/;                
        if(regex.test(name) === false) {
            printError("nameErr", "Please enter a valid name");
        } else {
            printError("nameErr", "");
            nameErr = false;
        }
    }
    
          
          // Validate email address
    if(email == "") {
        printError("emailErr", "Please enter your email address");
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }
          
          //Validate password
          
          if(pass.length == 0 || pass.length < 6){
              printError("passErr", "Password must be at least 6 characters long");
              
          }else{
             printError("passErr", "");
             passErr = false;
          }
            if(pass != passwordcfm){
              printError("cfmpassErr", "Password doesn't match!");
              
          }else{
             printError("cfmpassErr", "");
             cfmpassErr = false;
        }
          
          
          
           // Validate country
          if(country == "defaultCountry") {
              printError("countryErr", "Please select your country");
          } else {
              printError("countryErr", "");
              countryErr = false;
          }
          
          
          //validate state
          if(state == "defaultState") {
            printError("stateErr", "Please select your state");
          } else {
              printError("stateErr", "");
              stateErr = false;
          }
          
          //validate city
          if(city == "defaultCity") {
            printError("cityErr", "Please select your city");
          } else {
              printError("cityErr", "");
              cityErr = false;
          }
          
          //validate date
          if(date == ""){
            printError("dateErr", "Please select a date");
          } else {
              printError("dateErr", "");
              dateErr = false;
          }

          
          
           if((nameErr || emailErr || passErr || cfmpassErr || countryErr || stateErr || cityErr || dateErr)  == true) {
           return false;
           }
          
      };
        
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
