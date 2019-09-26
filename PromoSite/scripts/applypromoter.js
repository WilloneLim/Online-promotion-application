const promoList = document.querySelector('.promos');
const loggedIn = document.querySelectorAll('.loggedIn');
const loggedOut = document.querySelectorAll('.loggedOut');
const loggedBoth = document.querySelectorAll('.loggedBoth');
const accountDetails = document.querySelector('.account-details');
const adminItems = document.querySelectorAll('.admin');


const promoterForm = document.querySelector('#applyPromoter');

promoterForm.addEventListener('submit', (e) => {
    e.preventDefault();
//get user input
    const pro_email = promoterForm['promoter_email'].value;
    const pro_password = promoterForm['promoter_password'].value;

            db.collection('promoter_applications').add({
                coverimg: promoterForm['customFileA'].value,
                profileimg: promoterForm['customFileB'].value,
                username: promoterForm['title'].value,
                desc: promoterForm['desp'].value,
                email: pro_email

            }).then(() => {
                //reset form
                promoterForm.reset(); 
                window.alert('Application Sent');
                window.location.replace("index.html");
                

                

            }).catch(err => {
                promoterForm.querySelector('.error').innerHTML = err.message;
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