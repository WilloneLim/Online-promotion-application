const promoList = document.querySelector('.promos');
const loggedIn = document.querySelectorAll('.loggedIn');
const loggedOut = document.querySelectorAll('.loggedOut');
const loggedBoth = document.querySelectorAll('.loggedBoth');
const filterbtns = document.querySelectorAll('.filterchk');
const accountDetails = document.querySelector('.account-details');
const recommend = document.querySelector('#recommended');

var c = "";
const test = document.querySelector('#tester');
var wishlist = [];

const setupUI = (user) => {
    loggedBoth.forEach(item => item.style.display = 'block');
    if (user){

        loggedIn.forEach(item => item.style.display = 'block');
        loggedOut.forEach(item => item.style.display = 'none');
        
        theuser = user.uid;
        
        var docRef = db.collection("users").doc(theuser);

        docRef.get().then(function(doc) {
            if (doc.data().wishlist == undefined){
                docRef.update({
                    wishlist: []
                })
                .then(function() {
                    console.log("Document successfully updated!");
                })
                .catch(function(error) {
                    // The document probably doesn't exist.
                    console.error("Error updating document: ", error);
                });
            }else{
                wishlist = doc.data().wishlist;
            }

        }).catch(function(error) {
            console.log("Error getting document:", error);
        });
                
        
        
        console.log(theuser);
        fillPromo();
        
    }else{
        
        loggedIn.forEach(item => item.style.display = 'none');
        loggedOut.forEach(item => item.style.display = 'block');
        
        fillPromo();
    }
    
}

function fillPromo(){
        
        for(i=0 ;i < filterbtns.length ; i++){
            filterbtns[i].checked = false;
        }
    
        var cl = "";
        var r = 0;
        db.collection("promotions").get().then(function(querySnapshot) {
        querySnapshot.forEach(function(doc) {
            r += 1;
            // doc.data() is never undefined for query doc snapshots
            cl += `<div class="col-md-4 bg-light mx-auto p-2 bg-transparent card-deck my-2">
                <div class="card p-0 m-0">
                 <a href="share.html?id=${doc.id}">
                 <img class="card-img-top" src="${doc.data().image}" alt="IMG-PRODUCT">
                 </a>
                <div class="card-body">
                 <h6 class="card-title">${doc.data().title}</h6>

                 <a href="promoterview.html?id=${doc.data().promoter}" class="card-text text-muted">${doc.data().user}</a>
                
            
                </div>`;
            
//            if(theuser == ""){
//                cl += `<div class="card-footer bg-white border-0 text-muted">
//                        <div class="row">
//                            <img class="col-md-1 p-0 mr-2 ml-auto" onclick="editwishlist(${doc.id})" src="images/wishlist_false.png" >
//                        </div>
//                    </div>
//                </div>
//
//                </div> `;
//                
//            }else{
//                
//                cl += `<div class="card-footer bg-white border-0 text-muted">
//                        <div class="row">
//                            <img class="col-md-1 p-0 mr-2 ml-auto" onclick="editwishlist(${doc.id})" src="images/wishlist_true.png" >
//                        </div>
//                    </div>
//                </div>
//
//                </div> `;
//                
//            }
                    
            
            
            if(theuser == ""){
                console.log("1");
                cl += `<div class="card-footer bg-white border-0 text-muted">
                        <div class="row">
                            <img class="col-md-1 p-0 mr-2 ml-auto" onclick="editwishlist(${doc.id})" src="images/wishlist_false.png" >
                        </div>
                    </div>
                </div>

                </div> `;
            }else{
                cl += `<div class="card-footer bg-white border-0 text-muted">
                        <div class="row">
                            <img class="col-md-1 p-0 mr-2 ml-auto" id="wl${doc.id}" onclick="editwishlist('${doc.id}')" src="images/wishlist_false.png" >
                        </div>
                    </div>
                </div>

                </div> `;
                
            }


        });
            test.innerHTML = cl;
    });
}

function editwishlist(id){
    let s = "wl" + id;
    var docRef = db.collection("users").doc(theuser);
    
//    var n = str.includes("world");
    if( document.getElementById(s).src.includes("images/wishlist_false.png")){
        document.getElementById(s).src = "images/wishlist_true.png";

        docRef.get().then(function(doc) {
            if (doc.exists) {
                console.log("Document data:", doc.data());
                
                let arr = doc.data().wishlist;
                arr.push(id);
                
                docRef.update({
                    wishlist: arr
                })
                .then(function() {
                    console.log("Document successfully updated!");
                })
                .catch(function(error) {
                    // The document probably doesn't exist.
                    console.error("Error updating document: ", error);
                });

                
                
            } else {
                // doc.data() will be undefined in this case
                console.log("No such document!");
            }
        }).catch(function(error) {
            console.log("Error getting document:", error);
        });


        
        
        
        
    }else{
        document.getElementById(s).src = "images/wishlist_false.png";
        
        docRef.get().then(function(doc) {
            if (doc.exists) {
                console.log("Document data:", doc.data());
                
                let arr = doc.data().wishlist;
                
                var index = arr.indexOf(id);
                if (index > -1) {
                  arr.splice(index, 1);
                }
                
                docRef.update({
                    wishlist: arr
                })
                .then(function() {
                    console.log("Document successfully updated!");
                })
                .catch(function(error) {
                    // The document probably doesn't exist.
                    console.error("Error updating document: ", error);
                });

                
                
            } else {
                // doc.data() will be undefined in this case
                console.log("No such document!");
            }
        }).catch(function(error) {
            console.log("Error getting document:", error);
        });
        
        
        
        
    }
    console.log(document.getElementById(s).src);
}

function filterPromos(filter){
        var cl = "";
        var r = 0;
    var i = 0;
    var t = [];
    for(i=0 ;i < filterbtns.length ; i++){
        if (filterbtns[i].checked){
            t.push(filterbtns[i].value);
        }
    }
    console.log(t);
    if (t.length == 0){
        console.log("here");
        fillPromo();
        
    }else{
        console.log("there");
        
        db.collection('promotions')
        .where('keys', 'array-contains-any',t)
        .orderBy('title')
        .get().then(function(querySnapshot) {
            querySnapshot.forEach(function(doc) {
                // doc.data() is never undefined for query doc snapshots
                cl += `<div class="col-md-4 bg-light mx-auto p-2 bg-transparent card-deck my-2">
                    <div class="card p-0 m-0">
                     <a href="share.html?id=${doc.id}">
                     <img class="card-img-top" src="${doc.data().image}" alt="IMG-PRODUCT">
                     </a>
                    <div class="card-body">
                     <h6 class="card-title">${doc.data().title}</h6>

                     <a href="promoterview.html?id=${doc.data().promoter}" class="card-text text-muted">${doc.data().user}</a>
                    </div>
                    <br/>
                    <br/>
                    </div>
                    </div> `;


            });

         console.log(t);
         test.innerHTML = cl;

         });
        
    }
     
}
