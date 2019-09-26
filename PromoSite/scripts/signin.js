//const loggedBoth = document.querySelectorAll('.loggedBoth');

if (window.location.href.indexOf("signin") > -1) {

//login 
const loginForm = document.querySelector('#loginform');
loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    
    
//get user input
    const email = loginForm['login_email'].value;
    const password = loginForm['login_password'].value;
    
    
    auth.signInWithEmailAndPassword(email, password).then(cred => {
        //reset form
        loginForm.reset(); 
        loginForm.querySelector('.error').innerHTML = "";
        
         var usera = firebase.auth().currentUser;
    
    usera.getIdTokenResult().then(idTokenResult => {
//            user.admin = idTokenResult.claims.admin;
//            user.promoter = idTokenResult.claims.promoter;
            console.log(idTokenResult.claims);
        if (idTokenResult.claims.admin){
            window.location.replace("adminconsole.html");
        }else if(idTokenResult.claims.promoter){
            window.location.replace("promoter.html");
        }else{
            window.location.replace("index.html");
        }
        
        });
        
        
    }).catch(err => {
        loginForm.querySelector('.error').innerHTML = err.message;
    });
    
   
    
    });

}

    
    



