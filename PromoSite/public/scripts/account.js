const promoList = document.querySelector('.promos');
const loggedIn = document.querySelectorAll('.loggedIn');
const loggedOut = document.querySelectorAll('.loggedOut');
const loggedBoth = document.querySelectorAll('.loggedBoth');
const accountDetails = document.querySelector('.account-details');
const adminItems = document.querySelectorAll('.admin');
const modal = document.getElementById("myModal");


const profile = document.querySelector('#add-profile');
const username = document.getElementById('add-un');
//const email = document.querySelector('#add-email');
const loyaltypoints = document.querySelector('#add-lp');

const span = document.getElementsByClassName("close")[0];

var mycode = "";
var arr = [];
var a = 0;

const setupUI = (user) => {
var html ="";

loggedBoth.forEach(item => item.style.display = 'block');
if (user){

    loggedIn.forEach(item => item.style.display = 'block');
    loggedOut.forEach(item => item.style.display = 'none');
    
    

}else{
    //hide profile
    adminItems.forEach(item => item.style.display = 'none');

    loggedIn.forEach(item => item.style.display = 'none');
    loggedOut.forEach(item => item.style.display = 'block');
}

db.collection('users').doc(user.uid).get().then(doc => {

    
if (!doc.exists) {
  console.log('No such document!');
} else {
  console.log("Welcome " + doc.data().username);
    
    if (doc.data().profileimg == undefined){
        console.log("NewImage");
    }else{
        profile.src = doc.data().profileimg;
    }
    
    if (doc.data().transactions != undefined){
        a = doc.data().transactions * 10
        loyaltypoints.innerHTML = a + " pts";
    }
    
        username.innerHTML = doc.data().username;
//        email.innerHTML = doc.data().email;
    
    
        document.getElementById("loading").style.display = "none";
        document.getElementById("loaded").style.display = "block";
  wishlist = doc.data().wishlist;


if (wishlist.length !== 0){
    
        for (i = 0; i < wishlist.length; i++) {
            db.collection('promotions').doc(wishlist[i]).get().then(doc => {
                
                
                
                
                
                var promo = doc.data();    
                if(promo != undefined){
                 html += `<div class="col-md-12 pb-5 grid-item">
                 <div class="col-md-8 shadow-lg mx-auto p-2">
                 <a href="share.html?id=${doc.id}">
                 <img class="img-fluid p-2 mt-2 w-100" src="${promo.image}" alt="IMG-PRODUCT">
                 </a>
                 <h5 class="pt-2 pl-3">${promo.title}</h5>

                 <a href="promoterview.html?id=${doc.id}" class="text-muted pl 3">${doc.id}</a>'

                 <img class="float-right pb-3 pr-2" alt="${doc.id}" onclick="addtoWishlist('${doc.id}')" id="${doc.id}" style="cursor: pointer;" src="images/wishlist_true.png" />
                <br/>
                <br/>
                </div>
                </div> `;
                promoList.innerHTML = html;
                }
            });
            
        }
        document.getElementById("loader").style.display = "none";
    
    }else{
        document.getElementById("empty").style.display = "block";
        document.getElementById("loader").style.display = "none";
    }
    getVault();
 }

})
    
}

function addtoWishlist(id) {
    var user = firebase.auth().currentUser;
    
    var arr = wishlist;
    var index = arr.indexOf(id);

    if (index > -1) {
        arr.splice(index, 1);
        console.log(wishlist);
        window.alert("Promotion removed from Wishlist");
        document.getElementById(id).src = "images/wishlist_false.png";
    }else{
        arr.push(id);
        console.log(wishlist);
        window.alert("Promotion added from Wishlist");
        document.getElementById(id).src = "images/wishlist_true.png";
    }
    
    db.collection('users').doc(user.uid).set({
        wishlist: arr

     },{ merge: true})
         .then(() => {
         console.log("complete");
    });
}

function getVault(){
    var user = firebase.auth().currentUser;
    
    var docRef = db.collection("users").doc(user.uid);

    docRef.get().then(function(doc) {
        if (doc.exists) {
            console.log("Document data:", doc.data());
            
            arr = doc.data().vault;
            console.log(arr);
        } else {
            console.log("No such document!");
        }
            
            
        }).then(function(doc) {
            let i = 0;
            for(i = 0; i < arr.length; i++){
                   
                console.log(a);
                let dref = db.collection("claiming").doc(arr[i]);
                dref.get().then(function(claim) {
                    
                    let ref = db.collection("promotions").doc(claim.data().promotion);
                    ref.get().then(function(promo) {
                        
                        a += 1;   
                        console.log(a);
                        mycode += `<div class="col-md-4 border mx-auto p-3">
                                    <img src="${promo.data().image}" class="w-100">
                                    <h6 class="my-2">${promo.data().title}</h6>
                                    <button type="button" class="btn btn-primary w-100" onclick="showCode('${arr[a-1]}')">View QRCode</button>   

                                 </div>`;
                        
                        if(i == arr.length){
                            nextmove();
                        }
                        
                }).catch(function(error) {
                    console.log("Error getting document:", error);
                });

                })
                
            }
            
            
            
            
            
        
        
    
    }).catch(function(error) {
        console.log("Error getting document:", error);
    });
    
}

function nextmove(){
    document.getElementById("vault").innerHTML = mycode;
}
function showCode(code){
    console.log(code);
    document.getElementById("qrcode").innerHTML = "";
    var qrcode = new QRCode("qrcode");
    qrcode.makeCode(code);
    
    modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}


