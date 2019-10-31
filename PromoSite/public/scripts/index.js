const promoList = document.querySelector('.promos');
const loggedIn = document.querySelectorAll('.loggedIn');
const loggedOut = document.querySelectorAll('.loggedOut');
const loggedBoth = document.querySelectorAll('.loggedBoth');
const accountDetails = document.querySelector('.account-details');
const recommend = document.querySelector('#recommended');
const adminItems = document.querySelectorAll('.admin');
var fil= "";
var data;
var wishlist = [];
var theend = false;
var limit = 3;

const setupUI = (user) => {
    loggedBoth.forEach(item => item.style.display = 'block');
    if (user){

        loggedIn.forEach(item => item.style.display = 'block');
        loggedOut.forEach(item => item.style.display = 'none');
        
        document.getElementById("newuser").style.display = "none";
        
        
        setupPromotion("");
        
        
    }else{
        //hide profile
        adminItems.forEach(item => item.style.display = 'none');
//        accountDetails.innerHTML = '';
        
        document.getElementById("mySort").style.display = "none";
        
        loggedIn.forEach(item => item.style.display = 'none');
        loggedOut.forEach(item => item.style.display = 'block');
    }
    
    
}

    
function setupPromotion(filter) {
    
    if (filter == ""){
        db.collection('promotions').orderBy('title').limit(limit).onSnapshot(snapshot =>{
        data = snapshot.docs;
            
        setPromotions(data);
            
    },err => {
        console.log(err.message);
    });
        
    }else{
        db.collection('promotions')
            .where('keys', 'array-contains',filter)
            .orderBy('title')
            .limit(limit).onSnapshot(snapshot =>{
                data = snapshot.docs;
                promoList.innerHTML = "";
                document.getElementById("loader").style.display = "block";
                setPromotions(data);
            
        },err => {
            console.log(err.message);
        });
    }
    
    
    
    
}


function setPromotions(adata){
    
//    console.log(adata);
    if(adata.length < 3){
        document.getElementById("loader").style.display = "none";
    }
    
    var user = firebase.auth().currentUser;
    var i;
    
    
    console.log(user.uid);
    db.collection('users').doc(user.uid).get().then(doc => {
    if (!doc.exists) {
      console.log('No such document!');
    } else {
      wishlist = doc.data().wishlist;
      console.log(wishlist);   
        
        if (adata.length){
        let html = '';
        adata.forEach(doc => {
            var wished = "false";
            if (wishlist.length !== 0){
                for (i = 0; i < wishlist.length; i++) {
                    if(wishlist[i] == doc.id){
                        wished = "true";
                    }
                }
            }
            
            const promo = doc.data();

            const card = `<div class="col-md-12 pb-5 grid-item">
             <div class="col-md-12 shadow-lg mx-auto p-2">
             <a href="share.html?id=${doc.id}">
             <img class="img-fluid p-2 mt-2" src="${promo.image}" style="width: 800px;" alt="IMG-PRODUCT">
             </a>
             <h5 class="pt-2 pl-3">${promo.title}</h5>

             <a href="promoterview.html?id=${promo.promoter}" class="text-muted pl-3">${promo.user}</a>

             <img class="float-right pb-3 pr-2" alt="${doc.id}" onclick="addtoWishlist('${doc.id}')" id="${doc.id}" style="cursor: pointer;" src="images/wishlist_${wished}.png" />
            <br/>
            <br/>
            </div>
            </div> `;

            html += card; 

            recommend.style.display = 'block';
        });
            
            elChild = document.createElement('div');
            elChild.innerHTML = html;
            promoList.appendChild(elChild);

        }else{
            let end = "<h4 class='text-center'>More Promotions Coming Soon!</h4>";
            theend = true;
            
            document.getElementById("loader").style.display = "none";
            elChild = document.createElement('div');
            elChild.innerHTML = end;
            promoList.appendChild(elChild);
        }

        }
        })
          .catch(err => {
            console.log('Error getting document', err);
        });
}


function loadNext(mydata){
    
    if(mydata != undefined){
    let last = mydata[mydata.length - 1];
        if(last != null){
            if (fil == ""){
                db.collection('promotions').orderBy('title').startAfter(last.data().title).limit(limit).onSnapshot(snapshot =>{
                d = snapshot.docs;
                data = d;
                setPromotions(d);

            },err => {
                console.log(err.message);
            });

            }else{
                db.collection('promotions')
                    .where('keys', 'array-contains',filter)
                    .orderBy('title')
                    .startAfter(last.data().title)
                    .limit(limit).onSnapshot(snapshot =>{

                        d = snapshot.docs;
                        promoList.innerHTML = "";
                        data = d;
                        setPromotions(d);

                },err => {
                    console.log(err.message);
                }); 
            }

        }else{
            check = true;
            setPromotions([]);
        }
    
    }
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
function offLoader(){
    document.getElementById("loader").style.display = "none";
}

window.addEventListener("scroll", function (event) {
            var bot = document.body.scrollHeight - document.body.clientHeight;
            var scroll = this.scrollY;
            if (bot == scroll){
                
                if(!theend){
                    loadNext(data);
                }
                
            }
        });

