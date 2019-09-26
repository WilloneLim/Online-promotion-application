const promoList = document.querySelector('.promos');
const loggedIn = document.querySelectorAll('.loggedIn');
const loggedOut = document.querySelectorAll('.loggedOut');
const loggedBoth = document.querySelectorAll('.loggedBoth');
const accountDetails = document.querySelector('.account-details');
const adminItems = document.querySelectorAll('.admin');

var wishlist = [];

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
}

//setup promos
const setupPromo = (data) => {
    var user = firebase.auth().currentUser;
    var i;
    
    
    console.log(user.uid);
    db.collection('users').doc(user.uid).get().then(doc => {
    if (!doc.exists) {
      console.log('No such document!');
    } else {
      console.log("Welcome " + doc.data().username);
      wishlist = doc.data().wishlist;
      console.log(wishlist);   
        
        if (data.length){
        let html = '';
        data.forEach(doc => {
            var wished = "false";
            if (wishlist.length !== 0){
                for (i = 0; i < wishlist.length; i++) {
                    if(wishlist[i] == doc.id){
                        wished = "true";
                    }

                }
                
            }


            const promo = doc.data();
            const card = `<div class="col-md-12 pb-5 grid-item ${promo.author}">
             <div class="col-md-8 shadow-lg mx-auto p-2">
             <a href="share.php?id=${doc.id}">
             <img class="img-fluid p-2 mt-2 w-100" src="${promo.image}" alt="IMG-PRODUCT">
             </a>
             <h5 class="pt-2 pl-3">${promo.title}</h5>

             <a href="promoterview.php?id=${doc.id}" class="text-muted pl 3">${doc.id}</a>'

             <img class="float-right pb-3 pr-2" alt="${doc.id}" onclick="addtoWishlist('${doc.id}')" id="${doc.id}" style="cursor: pointer;" src="images/wishlist_${wished}.png" />
            <br/>
            <br/>
            </div>
            </div> `;


            html += card;
        });

            promoList.innerHTML = html;

        }else{
            promoList.innerHTML = "<h5>Please log in to view promotions!</h5>";
        }


        }
        })
          .catch(err => {
            console.log('Error getting document', err);
        });
    
    
    
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