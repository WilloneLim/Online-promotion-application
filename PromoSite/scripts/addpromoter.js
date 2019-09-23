

// sign up
const promoterForm = document.querySelector('#myPromoterForm');

promoterForm.addEventListener('submit', (e) => {
    e.preventDefault();
//get user input
    const pro_email = promoterForm['promoter_email'].value;
    const pro_password = promoterForm['promoter_password'].value;
    
//sign up new user
    auth.createUserWithEmailAndPassword(pro_email, pro_password).then(cred => {
        return db.collection('users').doc(cred.user.uid).set({
            coverimg: promoterForm['customFileA'].value,
            profileimg: promoterForm['customFileB'].value,
            username: promoterForm['title'].value,
            desc: promoterForm['desp'].value
            
        });
        
    }).then(() => {
        //reset form
        promoterForm.reset(); 
        console.log('New Promoter has been added.');
        makePromoter(pro_email);
        
        window.alert('Successfully Updated'); 
        
        window.location = './admin_promoters.html';
        
        
    }).catch(err => {
        promoterForm.querySelector('.error').innerHTML = err.message;
    });
});

function makePromoter(promoterEmail) {
    const addPromoterRole = functions.httpsCallable('addPromoterRole');
    addPromoterRole({ email: promoterEmail}).then(result => {
        console.log(result);
    })
}