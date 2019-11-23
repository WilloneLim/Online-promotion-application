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
let ref = db.collection('promo_applications').doc(c);
let getDoc = ref.get()
  .then(doc => {
    if (!doc.exists) {
      console.log('No such document!');
        document.getElementById("loader").style.display = "none";
    } else {
        
        document.getElementById("loader").style.display = "none";
        promo = doc.data();
        console.log(promo.image);
        let pref = db.collection('promoters').doc(promo.promoter);
        console.log(promo.promoter);
        let getPDoc = pref.get().then(pdoc => {
        
            let html = `<div class="col-md-12 pb-2">
                 <div class="col-md-12 bg-white mx-auto p-2">
                 <a href="share.html?id=${doc.id}">
                 <img class="img-fluid w-100 p-2 my-2 border shadow-sm" src="${promo.image}" style="width: 800px;" alt="IMG-PRODUCT">
                 </a>
                 <h5 class="pt-2 pl-3">${promo.title}</h5>

                 <a href="#" class="text-muted pl-3">${pdoc.data().username}</a>

                 <img class="float-right pb-3 pr-2" alt="${doc.id}" id="${doc.id}" style="cursor: pointer;" src="images/wishlist_false.png" />
                <br/>
                <br/>
                    <div class="ml-3">
                        <h6><u>Description</u></h6>
                        <p>${promo.desc}</p>
                        <div class="row">
                            <p class="col-md-7">Start: ${promo.startdate}</p>
                            <p class="col-md-5">End: ${promo.enddate}</p>
                        </div>
                    </div>  
                    
                </div>
                </div> 
                        `;


            prodisplay.innerHTML = html;
        });
 
        
    }
    })
}

function acceptpro(){

let ref = db.collection('promo_applications').doc(c);
let getDoc = ref.get()
  .then(doc => {
    if (!doc.exists) {
      console.log('No such document!');
        document.getElementById("loader").style.display = "none";
    } else {
        let pref = db.collection('promoters').doc(doc.data().promoter);
        let getPDoc = pref.get().then(pdoc => {
            console.log(pdoc.data().username);
        addnewpromo(doc.id, pdoc.data().promotions);
        
            db.collection("promotions").add({
                desc: doc.data().desc,
                enddate: doc.data().enddate,
                image: doc.data().image,
                keys: ["other"],
                promoter: doc.data().promoter,
                startdate: doc.data().startdate,
                title: doc.data().title,
                user: pdoc.data().username
                
            })
            .then(function(docRefa) {
                console.log("Document written with ID: ", docRefa.id);
                addnewpromo(docRefa.id, pdoc.data().promotions,doc.data().promoter);
                
            })
            .catch(function(error) {
                console.error("Error adding document: ", error);
            });
            
        });
        
    }
    })
    
    
}

function addnewpromo(promo, arr, uid){
    let r = arr;
    r.push(promo);
    
    console.log(r);
    
    db.collection("promo_applications").doc(c).delete().then(function() {
        
        console.log("Document successfully deleted!");
        
        db.collection("promoters").doc(uid).update({
            promotions: r

        }).then(function() {
            console.log("Document successfully deleted!");
            window.alert("Successfully Accepted Applicant: " );
            window.location.href = "viewpromoappsadmin.html";
        })
        
    }).catch(function(error) {
        console.error("Error removing document: ", error);
    });
    
    
}


function rejectpro(){
    
    db.collection("promo_applications").doc(c).delete().then(function() {
        console.log("Document successfully deleted!");
        window.alert("Successfully Rejected Applicant");
        window.location.href = "viewpromoappsadmin.html";
    }).catch(function(error) {
        console.error("Error removing document: ", error);
    });
    
}