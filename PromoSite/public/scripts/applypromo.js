
const postForm = document.querySelector('#promoform');

//create new promotion

const setupUI = (user) => {
    if (user){
        
        db.collection('users').doc(user.uid).get().then(doc => {
            promoterUsername = user.uid;
            
        });
    }else{
        console.log('Yeah No');
    }

}


postForm.addEventListener('submit', (e) =>{
    e.preventDefault();
    
    
    db.collection('promo_applications').add({
        image: postForm['customFileA'].value,
        title: postForm['title'].value,
        desc: postForm['desc'].value,
        startdate: postForm['datepickera'].value,
        enddate: postForm['datepickerb'].value,
        promoter: promoterUsername

    }).then(() => {
        //reset form
        postForm.reset(); 
        window.alert('Application Sent');
        window.location.replace("index.html");




    }).catch(err => {
        postForm.querySelector('.error').innerHTML = err.message;
    });
    
})
    
