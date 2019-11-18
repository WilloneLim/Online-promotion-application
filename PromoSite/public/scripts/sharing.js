const loggedIn = document.querySelectorAll('.loggedIn');
const loggedOut = document.querySelectorAll('.loggedOut');
const loggedBoth = document.querySelectorAll('.loggedBoth');
const accountDetails = document.querySelector('.account-details');
const login = document.querySelector("#fail");
const collected = document.querySelector("#collected");
const success = document.querySelector("#success");

var url_string = window.location.href;
var url = new URL(url_string);
var c = url.searchParams.get("id");
var qrcode = new QRCode("qrcode");
var data;
var approved= false;

var ref = db.collection("claiming").doc();
var myId = ref.id;

const setupUI = (user) => {
    loggedBoth.forEach(item => item.style.display = 'block');
    if (user){

        loggedIn.forEach(item => item.style.display = 'block');
        loggedOut.forEach(item => item.style.display = 'none');
        
        db.collection("pending").get().then(function(querySnapshot) {
            querySnapshot.forEach(function(doc) {
                console.log(c + "==" + doc.data().promotion);
                if(doc.data().promotion == c && doc.data().user == user.uid){
                    approved = true;
                    
                    db.collection("claiming").doc(myId).set({
                        promotion: c,
                        user: user.uid
                    });
                    
                    deletePending(doc.id);
                }else{
                    console.log("Error");
                }
                
            });
            
        }).then(() => {
            if(approved){
                var docRef = db.collection("users").doc(user.uid);

                docRef.get().then(function(doc) {
                    if (doc.exists) {
                        let v = doc.data().vault;
                        v.push(myId);
                        
                        docRef.update({
                            vault: v
                        })
                        
                    } else {
                        // doc.data() will be undefined in this case
                        console.log("No such document!");
                    }
                }).catch(function(error) {
                    console.log("Error getting document:", error);
                });
                
                
                
                success.style.display = "block";
                makeCode(myId);
            }else{
                collected.style.display = "block";
            }
            
            console.log("meep");
            
        });
        
        
        
    }else{
        
        loggedIn.forEach(item => item.style.display = 'none');
        loggedOut.forEach(item => item.style.display = 'block');
        fail.style.display = "block";
    }
    
}


function makeCode (txt) {
    console.log(txt);
	qrcode.makeCode(txt);
}

function deletePending(id){
    db.collection("pending").doc(id).delete().then(function() {
        console.log("Document successfully deleted!");
    }).catch(function(error) {
        console.error("Error removing document: ", error);
    });
}


