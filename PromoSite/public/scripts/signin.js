//const loggedBoth = document.querySelectorAll('.loggedBoth');

if (window.location.href.indexOf("signin") > -1) {

//login 
const loginForm = document.querySelector('#loginform');
    
const fb_login = document.querySelector('#facebook-button');
const go_login = document.querySelector('#google-button');
    
loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    
//get user input
    const email = loginForm['login_email'].value;
    const password = loginForm['login_password'].value;
    
    
    auth.signInWithEmailAndPassword(email, password).then(cred => {
        //reset form
        loginForm.reset(); 
        loginForm.querySelector('.error').innerHTML = "";
        
        chkStatus();
        
    }).catch(err => {
        loginForm.querySelector('.error').innerHTML = err.message;
    });
    
    });
    
    fb_login.addEventListener("click", loginFB);
    go_login.addEventListener("click", loginGO);
    
    function loginFB(){
        var provider = new firebase.auth.FacebookAuthProvider();
        
        firebase.auth().signInWithPopup(provider).then(function(result) {
          // This gives you a Facebook Access Token. You can use it to access the Facebook API.
          var token = result.credential.accessToken;
          // The signed-in user info.
          var user = result.user;
            
            loginRedirect();
            
        }).catch(function(error) {
          // Handle Errors here.
          var errorCode = error.code;
          var errorMessage = error.message;
          // The email of the user's account used.
          var email = error.email;
          // The firebase.auth.AuthCredential type that was used.
          var credential = error.credential;
            
            console.log(error);
          // ...
        });
    }
    
    
    function loginGO(){
        var provider = new firebase.auth.GoogleAuthProvider();
        
        firebase.auth().signInWithPopup(provider).then(function(result) {
          var token = result.credential.accessToken;
          var user = result.user;
            
            loginRedirect();
            
        }).catch(function(error) {
          var errorCode = error.code;
          var errorMessage = error.message;
          var email = error.email;
          var credential = error.credential;
            console.log(error);
        });
        
        
    }
    
    function loginRedirect(){
        
         var usera = firebase.auth().currentUser;
        
        usera.getIdTokenResult().then(idTokenResult => {
            console.log(idTokenResult.claims.name);
        
        var docRef = db.collection("users").doc(usera.uid);

        docRef.get().then(function(doc) {
            if (doc.exists) {
                console.log("Document data:", doc.data());
                chkStatus();
            } else {
                console.log(idTokenResult.claims.name);
                
                
                db.collection('users').doc(usera.uid).set({
                    username: idTokenResult.claims.name,
                    wishlist: [],
                    vault: []

                }).then(function(doc) {
                    console.log("Dooon");
                    chkStatus()
                });
                
            }
        }).catch(function(error) {
            console.log("Error getting document:", error);
        });   
        
        });
    }
    
    function chkStatus(){
        
        var usera = firebase.auth().currentUser;
        
        usera.getIdTokenResult().then(idTokenResult => {
           if (idTokenResult.claims.admin){
                window.location.replace("adminconsole.html");
            }else if(idTokenResult.claims.promoter){
                window.location.replace("promoter.html");
            }else{
                window.location.replace("index.html");
            }
        });
    }

}

    
    



