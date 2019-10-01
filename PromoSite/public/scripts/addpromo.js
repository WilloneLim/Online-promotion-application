var queryString = decodeURIComponent(window.location.search);
queryString = queryString.substring(1);

var promoterUsername = "6UIWphxGBHKTkcT1Ogtf";
const postForm = document.querySelector('#promoform');

//create new promotion

//const setupUI = (user) => {
//    if (user){
//        
//        db.collection('users').doc(user.uid).get().then(doc => {
//            promoterUsername = user.uid;
//            
//        });
//    }else{
//        console.log('Yeah No');
//    }
//
//}


postForm.addEventListener('submit', (e) =>{
    e.preventDefault();
    
//    const db = firebase.firestore();
    const ref = db.collection('promotions').doc();
    const id = ref.id;
    
    var keys = document.forms[0];
    var txt = [];
    var i;
    for (i = 0; i < keys.length; i++) {
    if (keys[i].checked) {
    txt.push(keys[i].value);
    }
    }
    
    console.log(promoterUsername);
    console.log(txt);
    
    
      db.collection("promoters").doc(promoterUsername)
      .get()
      .then(function(doc) {
        if (doc.exists) {
          console.log("Document data:", doc.data().promotions);
            
          const promo = doc.data().promotions;
          promo.push(id);
            
            
            db.collection('promoters').doc(promoterUsername).set({
                promotions: promo

             },{ merge: true})
                 .then(() => {
                 console.log("complete");
                
                
                    
            ref.set({
                image: postForm['customFileA'].value,
                title: postForm['title'].value,
                desc: postForm['desc'].value,
                startdate: postForm['datepickera'].value,
                enddate: postForm['datepickerb'].value,
                promoter: promoterUsername,
                keys: txt


            }).then(() => {



                postForm.reset();

                window.alert('Successfully Added'); 

                window.location = './adminconsole.html';
            })
                
            })
            
            
        } else {
          // doc.data() will be undefined in this case
          console.log("No such document!");
        }
      }).catch(function(error) {
        console.log("Error getting document:", error);
      });
    
})
    
