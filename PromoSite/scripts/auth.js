//listen for auth status changes
auth.onAuthStateChanged(user => {
    if(user){
        user.getIdTokenResult().then(idTokenResult => {
            user.admin = idTokenResult.claims.admin;
            user.promoter = idTokenResult.claims.promoter;
            console.log(idTokenResult.claims);
            
            setupUI(user);
        });
        
        db.collection('posts').onSnapshot(snapshot =>{
            setupPromo(snapshot.docs);
            setupUI(user);
        },err => {
            console.log(err.message);
        });
        
    }else{
        setupUI();
        setupPromo([]);
    }
});

//logout user
//const logout = document.querySelector('#logout');
//    logout.addEventListener('click', (e) => {
//        e.preventDefault();
//        auth.signOut();
//        window.location.replace("signin.html");
//    });


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
    }).catch(err => {
        loginForm.querySelector('.error').innerHTML = err.message;
    });
    
    });