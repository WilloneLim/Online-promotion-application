const promoList = document.querySelector('.promos');
const loggedIn = document.querySelectorAll('.loggedIn');
const loggedOut = document.querySelectorAll('.loggedOut');
const loggedBoth = document.querySelectorAll('.loggedBoth');
const prodisplay = document.querySelector('#display');
const promodisplay = document.querySelector('#promos');

var url_string = window.location.href;
var url = new URL(url_string);
var c = url.searchParams.get("id");

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
    
    setupPromoter();
    
}

    
function setupPromoter() {
let ref = db.collection('promoters').doc(c);
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
        
        let promo = doc.data().promotions;
        
        if (promo.length == 0){
            document.getElementById("loader").style.display = "none";
            document.getElementById("nopromo").innerHTML = "This promoter has not added any promotions yet.";
            
        }
        
        promo.forEach(function(entry) {
            let promoref = db.collection('promotions').doc(entry);
            let promodoc = promoref.get().then(doc => {
                
                document.getElementById("loader").style.display = "none";
                
                
                
                var user = firebase.auth().currentUser;
                var i;

                db.collection('users').doc(user.uid).get().then(adoc => {
                if (!doc.exists) {
                  console.log('No such document!');
                } else {
                  wishlist = adoc.data().wishlist;
                    
                    let ahtml = '';
                        var wished = "false";
//                        if (wishlist.length !== 0){
//                            for (i = 0; i < wishlist.length; i++) {
//                                if(wishlist[i] == doc.id){
//                                    wished = "true";
//                                }
//                            }
//                        }

                        const card = `<div class="col-md-12 pb-5 grid-item">
                         <div class="col-md-12 bg-white shadow-lg mx-auto p-2">
                         <a href="share.html?id=${doc.id}">
                         <img class="img-fluid p-2 mt-2" src="${doc.data().image}" style="width: 800px;" alt="IMG-PRODUCT">
                         </a>
                         <h5 class="pt-2 pl-3">${doc.data().title}</h5>

                        <br/>
                        <br/>
                        </div>
                        </div> `;


                        ahtml += card;

                        elChild = document.createElement('div');
                        elChild.innerHTML = ahtml;
                        promodisplay.appendChild(elChild);
                    
                }
                
            });
        });
        
    })

    }
    })
}

function addtoWishlist(id) {
    var user = firebase.auth().currentUser;
    
    var arr = wishlist;
    var index = arr.indexOf(id);

    if (index > -1) {
        arr.splice(index, 1);
        window.alert("Promotion removed from Wishlist");
        document.getElementById(id).src = "images/wishlist_false.png";
    }else{
        arr.push(id);
        window.alert("Promotion added to Wishlist");
        document.getElementById(id).src = "images/wishlist_true.png";
    }
    
    db.collection('users').doc(user.uid).set({
        wishlist: arr

     },{ merge: true})
         .then(() => {
         console.log("complete");
    });
}