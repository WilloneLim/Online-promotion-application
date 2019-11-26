const promoList = document.querySelector('.promos');
const loggedIn = document.querySelectorAll('.loggedIn');
const loggedOut = document.querySelectorAll('.loggedOut');
const loggedBoth = document.querySelectorAll('.loggedBoth');
const accountDetails = document.querySelector('.account-details');
const recommend = document.querySelector('#recommended');


const test = document.querySelector('#tester');


const adminItems = document.querySelectorAll('.admin');
var fil= "";
var data;
var wishlist = [];
var theend = false;
var limit = 3;


const setupUI = (user) => {
    loggedBoth.forEach(item => item.style.display = 'block');
    setCarousel()
    if (user){

        loggedIn.forEach(item => item.style.display = 'block');
        loggedOut.forEach(item => item.style.display = 'none');
        
//        document.getElementById("newuser").style.display = "none";
        db.collection('users').doc(user.uid).get().then(doc => {
            getrecommendation(doc.data().reco);
        })
        checkrec(user.uid);
        
        filltester();
//        setupPromotion("");
        
        
    }else{
        //hide profile
        adminItems.forEach(item => item.style.display = 'none');
//        accountDetails.innerHTML = '';
        
//        document.getElementById("mySort").style.display = "none";
        
        loggedIn.forEach(item => item.style.display = 'none');
        loggedOut.forEach(item => item.style.display = 'block');
        
        filltester();
    }
    
    
}

function setCarousel(){
    var docRef = db.collection("settings").doc("carousel");

    docRef.get().then(function(doc) {
        if (doc.exists) {
            
            document.getElementById("carol1").src = doc.data().value[0];
            document.getElementById("carol2").src = doc.data().value[1];
            document.getElementById("carol3").src = doc.data().value[2];
            
            console.log("Document data:", doc.data());
        } else {
            // doc.data() will be undefined in this case
            console.log("No such document!");
        }
    }).catch(function(error) {
        console.log("Error getting document:", error);
    });
}

function getrecommendation(ar){
    var map;
    
    var recoarr=[];
    
    if (ar == undefined){
        m = new Map([['food', 0], ['drink', 0], ['clothes', 0], ['shoe', 0],['bag', 0],['other', 0]]);
    }else{
        m = new Map([['food', ar.food], ['drink', ar.drink], ['clothes',ar.clothes], ['shoe',ar.shoe],['bag',ar.bag],['other',ar.other]]);
    }
    
    
    let a = [...m.entries()].reduce((a, e ) => e[1] > a[1] ? e : a);
    console.log(a[0]);
    let length = 0;
    db.collection("promotions").where('keys', 'array-contains', a[0]).get()
        .then(function(querySnapshot) {
            querySnapshot.forEach(function(doc) {
                // doc.data() is never undefined for query doc snapshots
                recoarr.push(doc);
                length += 1;
                console.log(doc.id + " => " + doc.data());
            });
            let t = Math.floor(Math.random() * length) + 1;
            console.log(t-1);
            
    document.getElementById("rec_title").innerHTML = recoarr[t-1].data().title;
    document.getElementById("rec_desc").innerHTML = recoarr[t-1].data().desc;
    document.getElementById("rec_pro").innerHTML = recoarr[t-1].data().user;
    document.getElementById("rec_img").src = recoarr[t-1].data().image;
    document.getElementById("rec_link").href = "share.html?id=" + recoarr[t-1].id;
        
        })
        .catch(function(error) {
            console.log("Error getting documents: ", error);
        });
    
}

function printRec(r){
    document.getElementById("rec_img").src = r.image;
    document.getElementById("rec_title").innerHTML = r.title;
    document.getElementById("rec_desc").innerHTML = r.desc;
    document.getElementById("rec_pro").innerHTML = r.user;
}



function filltester(){
    var cl = "";
    var r = 0;
    db.collection("promotions").get().then(function(querySnapshot) {
    querySnapshot.forEach(function(doc) {
        r += 1;
        // doc.data() is never undefined for query doc snapshots
        if(r <= 8){
            
        cl += `<div class="col-md-3 bg-light mx-auto p-2 bg-transparent card-deck my-2">
            <div class="card p-0 m-0">
             <a href="share.html?id=${doc.id}">
             <img class="card-img-top" src="${doc.data().image}" alt="IMG-PRODUCT">
             </a>
             `;
            
            var date1 = new Date(doc.data().enddate);
            var date2 = new Date();
            var diffTime = Math.abs(date2 - date1);
            var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
//            console.log("wahhhhh" + diffDays);
            
            let i = 0;
            
            for(i = 0 ; i < doc.data().keys.length ; i++){
                    
                    
                    switch (doc.data().keys[i]) 
                    {
                        case "food":
                            cl += '<div class="card-img-overlay p-0 m-2 row justify-content-end"><p class="text-white" id="dayleft">' + diffDays + ' days left</p><img src="images/icon_food.png" height="20px" width="20px"></div>';
                            break;
                        case "drink":
                            cl += '<div class="card-img-overlay p-0 m-2 row justify-content-end"><p class="text-white" id="dayleft">' + diffDays + ' days left</p><img src="images/icon_drink.png" height="20px" width="20px"></div>';
                            break;

                        case "shoe":
                            cl += '<div class="card-img-overlay p-0 m-2 row justify-content-end"><p class="text-white" id="dayleft">' + diffDays + ' days left</p><img src="images/icon_shoe.png" height="20px" width="20px"></div>';
                            break;

                        case "clothes":
                            cl += '<div class="card-img-overlay p-0 m-2 row justify-content-end"><p class="text-white" id="dayleft">' + diffDays + ' days left</p><img src="images/icon_travel.png" height="20px" width="20px"></div>';
                            break;

                        case "bag":
                            cl += '<div class="card-img-overlay p-0 m-2 row justify-content-end"><p class="text-white" id="dayleft">' + diffDays + ' days left</p><img src="images/icon_bag.png" height="20px" width="20px"></div>';
                            break;
                        
                        default:
                            cl += '<div class="card-img-overlay p-0 m-2 row justify-content-end"><p class="text-white" id="dayleft">' + diffDays + ' days left</p><img src="images/icon_travel.png" height="20px" width="20px"></div>';
                            break;

                    }
//                console.log(doc.data().keys[i]);
            }
            
            
            cl += `<div class="card-body"><h6 class="card-title">${doc.data().title}</h6><a class="card-text text-muted" href="promoterview.html?id=${doc.data().promoter}">${doc.data().user}</a></div></div></div>`;
        
        }
        
//        console.log(doc.id, " => ", doc.data());
    });
        test.innerHTML = cl;
});
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
    var card = "";
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

            card += `<div class="col-md-3 border">
             <div class="col-md-12 shadow-lg">
             <a href="share.html?id=${doc.id}">
             <img class="w-100" src="${promo.image}" alt="IMG-PRODUCT">
             </a>
             <h6 class="mt-2 ml-3">${promo.title}</h6>
             <a class="text-muted ml-3">${promo.user}</a>
             <img class="float-right mb-3" alt="${doc.id}" onclick="addtoWishlist('${doc.id}')" id="${doc.id}" style="cursor: pointer;" src="images/wishlist_${wished}.png" />
            <br/>
            <br/>
            </div>
            </div> `;

            html += card; 

            recommend.style.display = 'block';
        });
            
            elChild = document.createElement('div');
            elChild.innerHTML = card;
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
//    document.getElementById("loader").style.display = "none";
    console.log("no");
}

function checkrec(uid){
    db.collection('users').doc(uid).get().then(doc => {
        if (doc.data().transactions == undefined){
            var wRef = db.collection("users").doc(uid);
            return wRef.update({
                transactions: 0,
                reco: {'drink': 0,'food': 0,'shoe':0,'clothes':0,'bag':0,'other':0}
            })
            .then(function() {
                console.log("Document successfully updated!");
            })
            .catch(function(error) {
                // The document probably doesn't exist.
                console.error("Error updating document: ", error);
            });
        }
    })
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

