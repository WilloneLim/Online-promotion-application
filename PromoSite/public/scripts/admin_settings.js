const comrate = document.querySelector("#comrate");
const imga = document.querySelector("#imga");
const imgb = document.querySelector("#imgb");
const imgc = document.querySelector("#imgc");
const lchk = document.querySelector("#loyaltychk");



const setform = document.querySelector("#settings");

const setupUI = (user) => {
    
    var docRef = db.collection("settings").doc("commisionrate");
    var couref = db.collection('settings').doc('carousel');
    var loyref = db.collection('settings').doc('loyaltypoints');

    docRef.get().then(function(doc) {
        if (doc.exists) {
            console.log("Document data:", doc.data().value);
            comrate.value =  doc.data().value;
            
        } else {
            // doc.data() will be undefined in this case
            console.log("No such document!");
        }
    }).catch(function(error) {
        console.log("Error getting document:", error);
    });
    
    couref.get().then(function(doc) {
        if (doc.exists) {
            console.log("Document data:", doc.data().value);
            let a =  doc.data().value;
            imga.src = a[0];
            imgb.src = a[1];
            imgc.src = a[2];
            
            setform['customFileA'].value= a[0];
            setform['customFileB'].value= a[1];
            setform['customFileC'].value= a[2];
            
            
        } else {
            // doc.data() will be undefined in this case
            console.log("No such document!");
        }
    }).catch(function(error) {
        console.log("Error getting document:", error);
    });
    
    loyref.get().then(function(doc) {
        if (doc.exists) {
            console.log("Document data:", doc.data().value);
            lchk.checked =  doc.data().value;
            
        } else {
            // doc.data() will be undefined in this case
            console.log("No such document!");
        }
    }).catch(function(error) {
        console.log("Error getting document:", error);
    });
    
    
}


setform.addEventListener('submit', (e) =>{
    e.preventDefault();
    
//    const db = firebase.firestore();
    const carouselref = db.collection('settings').doc('carousel');
    const commref = db.collection('settings').doc('commisionrate');
    const loyaltyref = db.collection('settings').doc('loyaltypoints');
    
    commref.update({
        value: setform['comrate'].value,
    }).then(function() {
        
        loyaltyref.update({
            value: setform['loyaltychk'].checked,
        }).then(function() {
            
            carouselref.update({
            value: [setform['customFileA'].value, setform['customFileB'].value, setform['customFileC'].value]

            }).then(function() {
                window.alert("Changes have been saved");
            
            })
        })

        
    })
    .catch(function(error) {
        console.error("Error writing document: ", error);
    });
    
    
    
})