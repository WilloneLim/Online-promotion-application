// sign up
const signupForm = document.querySelector('#signupform');

signupForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
//get user input
    const email = signupForm['cust_email'].value;
    const password = signupForm['cust_password'].value;
    
//sign up new user
    auth.createUserWithEmailAndPassword(email, password).then(cred => {
        return db.collection('users').doc(cred.user.uid).set({
            username: signupForm['cust_username'].value,
            wishlist: [],
            vault: []
            
        });
        
    }).then(() => {
        //reset form
        signupForm.reset(); 
        signupForm.querySelector('.error').innerHTML = "";
        window.location.replace("index.html");
    }).catch(err => {
        signupForm.querySelector('.error').innerHTML = err.message;
    });
});

//logout user
//const logout = document.querySelector('#logout');
//logout.addEventListener('click', (e) => {
//    e.preventDefault();
//    auth.signOut();
//});

