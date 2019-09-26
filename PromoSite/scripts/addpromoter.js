const promoterForm = document.querySelector('#myPromoterForm');

promoterForm.addEventListener('submit', (e) => {
    e.preventDefault();
//get user input
    const pro_email = promoterForm['promoter_email'].value;
    const pro_password = promoterForm['promoter_password'].value;
    
    
    const ref = db.collection('users').doc();
//    const id = ref.id;
//sign up new user
//add admin cloud function
    const addPromoterAccount = functions.httpsCallable('addPromoterAccount');
    addPromoterAccount({uid :ref.id, email: pro_email}).then(result => {
        console.log(result);
        
        
        ref.set({
                coverimg: promoterForm['customFileA'].value,
                profileimg: promoterForm['customFileB'].value,
                username: promoterForm['title'].value,
                desc: promoterForm['desp'].value
            })

            db.collection('promoters').doc(ref.id).set({
                coverimg: promoterForm['customFileA'].value,
                profileimg: promoterForm['customFileB'].value,
                username: promoterForm['title'].value,
                desc: promoterForm['desp'].value,
                email: pro_email,
                promotions: [],
                userID: ref.id

            }).then(() => {
                //reset form
                promoterForm.reset(); 
                console.log('New Promoter has been added.');
                makePromoter(pro_email).then(() =>{
                    console.log("next");
                    window.alert('Successfully Updated'); 
                    window.location = './admin_promoters.html';

                });

                

            }).catch(err => {
                promoterForm.querySelector('.error').innerHTML = err.message;
            });
        
        
    }).catch(err => {
        console.log(err);
    });
            
 
});

function makePromoter(promoterEmail) {
    const addPromoterRole = functions.httpsCallable('addPromoterRole');
    addPromoterRole({ email: promoterEmail}).then(result => {
        console.log(result.data);
    })
}