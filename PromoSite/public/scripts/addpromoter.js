const promoterForm = document.querySelector('#myPromoterForm');

var url_string = window.location.href;
var url = new URL(url_string);
var c = url.searchParams.get("id");
console.log(c);

if (c != null){
    var create = document.getElementById("createpro");
    create.style.display = "none";
    
    
    var docRef = db.collection("promoters").doc(c);

    docRef.get().then(function(doc) {
        if (doc.exists) {
            console.log("Document data:", doc.data().username);
            
            promoterForm['title'].value = doc.data().username;
            promoterForm['desp'].value = doc.data().desc;
            document.getElementById("emailinfo").style.display = "none";
            
            document.getElementById("coverimg").src = doc.data().coverimg;
            document.getElementById("profileimg").src = doc.data().profileimg;
            
            document.getElementById("titlecreate").innerHTML = "Updating " + doc.data().username;
            promoterForm['promoter_email'].style.display = "none";
            
            
            
        } else {
            // doc.data() will be undefined in this case
            console.log("No such document!");
        }
    }).catch(function(error) {
        console.log("Error getting document:", error);
    });
    
}else{
    document.getElementById("coverimg").style.display = "none";
    document.getElementById("profileimg").style.display = "none";
    
}

function updatepromoter(){
    console.log("ww " + c);
    
    db.collection("promoters").doc(c).update({
        
        
    })
}

function addpromoter(){
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
                makePromoter(pro_email)
                    console.log("next");
                    window.alert('Successfully Updated'); 
                    window.location = './admin_promoters.html';


                

            }).catch(err => {
                promoterForm.querySelector('.error').innerHTML = err.message;
            });
        
        
    }).catch(err => {
        console.log(err);
    });
            
 
}

function makePromoter(promoterEmail) {
    const addPromoterRole = functions.httpsCallable('addPromoterRole');
    addPromoterRole({ email: promoterEmail}).then(result => {
        console.log(result.data);
    })
}