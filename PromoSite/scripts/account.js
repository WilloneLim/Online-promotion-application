const promoList = document.querySelector('.promos');
const loggedIn = document.querySelectorAll('.loggedIn');
const loggedOut = document.querySelectorAll('.loggedOut');
const loggedBoth = document.querySelectorAll('.loggedBoth');
const accountDetails = document.querySelector('.account-details');
const adminItems = document.querySelectorAll('.admin');



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
  wishlist = doc.data().wishlist;


if (wishlist.length !== 0){
    
        for (i = 0; i < wishlist.length; i++) {
            db.collection('promotions').doc(wishlist[i]).get().then(doc => {
                var promo = doc.data();    
                
                 html += `<div class="col-md-12 pb-5 grid-item">
                 <div class="col-md-8 shadow-lg mx-auto p-2">
                 <a href="share.php?id=${doc.id}">
                 <img class="img-fluid p-2 mt-2 w-100" src="${promo.image}" alt="IMG-PRODUCT">
                 </a>
                 <h5 class="pt-2 pl-3">${promo.title}</h5>

                 <a href="promoterview.php?id=${doc.id}" class="text-muted pl 3">${doc.id}</a>'

                 <img class="float-right pb-3 pr-2" alt="${doc.id}" onclick="addtoWishlist('${doc.id}')" id="${doc.id}" style="cursor: pointer;" src="images/wishlist_true.png" />
                <br/>
                <br/>
                </div>
                </div> `;
                promoList.innerHTML = html;
            });
            
        }
    }
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

