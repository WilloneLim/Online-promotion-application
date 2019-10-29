const promoList = document.querySelector('.promos');
const loggedIn = document.querySelectorAll('.loggedIn');
const loggedOut = document.querySelectorAll('.loggedOut');
const loggedBoth = document.querySelectorAll('.loggedBoth');
const prodisplay = document.querySelector('#display');
const promodisplay = document.querySelector('#promos');

var url_string = window.location.href;
var url = new URL(url_string);
var c = url.searchParams.get("id");
setupPromoter()
//const setupUI = (user) => {
//    loggedBoth.forEach(item => item.style.display = 'block');
//    if (user){
//
//        loggedIn.forEach(item => item.style.display = 'block');
//        loggedOut.forEach(item => item.style.display = 'none');
//        
//        
//    }else{
//        //hide profile
//        adminItems.forEach(item => item.style.display = 'none');
////        accountDetails.innerHTML = '';
//        
//        loggedIn.forEach(item => item.style.display = 'none');
//        loggedOut.forEach(item => item.style.display = 'block');
//    }
//    
//    setupPromoter();
//    
//}

    
function setupPromoter() {
let ref = db.collection('promoter_applications').doc(c);
let getDoc = ref.get()
  .then(doc => {
    if (!doc.exists) {
      console.log('No such document!');
        document.getElementById("loader").style.display = "none";
    } else {
        let html = `<div class="row">
                    <img class="img-responsive" style="width:100%" src="${doc.data().coverimg}"/>
                    </div>
                    <div class="row border bg-white">
                    <img class="col-md-2 m-3" src="${doc.data().profileimg}"/>
                    <div class="row col-md-8 m-3">
                    <h3 class="col-md-12" >${doc.data().username}</h3>
                    <p class="col-md-12" >${doc.data().desc}</p>
                    </div>
                    </div>
                    `;
        
        
        prodisplay.innerHTML = html;
 
        
    }
    })
}

function acceptpro(){

let ref = db.collection('promoter_applications').doc(c);
let getDoc = ref.get()
  .then(doc => {
    if (!doc.exists) {
      console.log('No such document!');
        document.getElementById("loader").style.display = "none";
    } else {
        
        db.collection("promoter_applications").doc(c).delete().then(function() {
                    const addPromoterRole = functions.httpsCallable('addPromoterAccount');
                    addPromoterRole({ email: doc.data().email}).then(result => {
                        
                        if(result.data == "Error"){
                            
                            window.alert(result.data);
                        }else{
                            
                            
                            db.collection("promoters").doc(result.data).set({
                                coverimg: doc.data().coverimg,
                                desc: doc.data().desc,
                                email: doc.data().email,
                                profileimg: doc.data().profileimg,
                                promotions: [],
                                username: doc.data().username

                            }).then(function(docRef){
                                console.log(docRef);

                            }).catch(function(error){
                                console.log(error);
                            });

                        }
                        
                         
                        
                    }).then(function() {
                        
                        const addPromoterRole = functions.httpsCallable('addPromoterRole');
                        addPromoterRole({ email: doc.data().email}).then(result => {
                            console.log(result.data);
                        }).then(function() {
                            console.log("Done");
                            console.log("Document successfully deleted!");
                    
//                            window.location.href = "viewapplicationsadmin.html";
                        });
                        
                    });
                }).catch(function(error) {
                    console.error("Error removing document: ", error);
                });
        
    }
    })
    
    
}

function rejectpro(){
    
    db.collection("promoter_applications").doc(c).delete().then(function() {
        console.log("Document successfully deleted!");
        window.alert("Successfully Rejected Applicant");
        window.location.href = "viewapplicationsadmin.html";
    }).catch(function(error) {
        console.error("Error removing document: ", error);
    });
    
}