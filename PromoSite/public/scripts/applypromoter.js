const promoList = document.querySelector('.promos');
const loggedIn = document.querySelectorAll('.loggedIn');
const loggedOut = document.querySelectorAll('.loggedOut');
const loggedBoth = document.querySelectorAll('.loggedBoth');
const accountDetails = document.querySelector('.account-details');
const adminItems = document.querySelectorAll('.admin');


    var cimg = document.getElementById('customFileA').value;
    var pimg = document.getElementById('customFileB').value;
    var tit = document.getElementById('title').value;
    var des = document.getElementById('desp').value;
    
    
    var pass = document.getElementById('promoter_password');
    var cpass = document.getElementById('cpassword');

    
    

cpass.addEventListener('blur', (e) => {
    
    if(pass.value != cpass.value){
        document.getElementById('perror').innerHTML = "Passwords do not match";
    }
})


const promoterForm = document.querySelector('#applyPromoter');

promoterForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    var docRef = db.collection("settings").doc("passcode");

    docRef.get().then(function(doc) {
        if (doc.exists) {
            let passcode = doc.data().value;
            
            if(cimg != "" || pimg != "" || tit != "" || des != "" || pass.value != "" || cpass.value != ""){
                let encrypted = CryptoJS.AES.encrypt(cpass.value, passcode);

                    let encry = encrypted.toString();

                    const pro_email = promoterForm['promoter_email'].value;
                    const pro_password = promoterForm['promoter_password'].value;

                        db.collection('promoter_applications').add({
                            coverimg: promoterForm['customFileA'].value,
                            profileimg: promoterForm['customFileB'].value,
                            username: promoterForm['title'].value,
                            desc: promoterForm['desp'].value,
                            email: pro_email,
                            password: encry

                        }).then(() => {
                            //reset form
                            promoterForm.reset(); 
                            window.alert('Application Sent');
                            window.location.replace("index.html");




                        }).catch(err => {
                            promoterForm.querySelector('.error').innerHTML = err.message;
                        });
                }else{
                    window.alert("Please fill every box");
                }
            
            
            
            
        } else {
            console.log("No such document!");
        }
    }).catch(function(error) {
        console.log("Error getting document:", error);
    });
        
    });
           

const setupUI = (user) => {
    loggedBoth.forEach(item => item.style.display = 'block');
    if (user){

        loggedIn.forEach(item => item.style.display = 'block');
        loggedOut.forEach(item => item.style.display = 'none');
    }else{
        //hide profile
        adminItems.forEach(item => item.style.display = 'none');
//        accountDetails.innerHTML = '';
        
        loggedIn.forEach(item => item.style.display = 'none');
        loggedOut.forEach(item => item.style.display = 'block');
    }
}