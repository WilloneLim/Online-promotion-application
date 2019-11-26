const loggedIn = document.querySelectorAll('.loggedIn');
const loggedOut = document.querySelectorAll('.loggedOut');
const loggedBoth = document.querySelectorAll('.loggedBoth');
var url_string = window.location.href;
var url = new URL(url_string);
var c = url.searchParams.get("id");
var d = url.searchParams.get("sm");

const setupUI = (user) => {
    loggedBoth.forEach(item => item.style.display = 'block');
    if (user){

        loggedIn.forEach(item => item.style.display = 'block');
        loggedOut.forEach(item => item.style.display = 'none');
        

        db.collection("pending").add({
            promotion: c,
            user: user.uid
        })
        .then(function(docRef) {
            console.log("Document written with ID: ", docRef.id);
        })
        .catch(function(error) {
            console.error("Error adding document: ", error);
        });
        
        if (d == "fb"){
            document.getElementById("fbview").style.display = "block";
            console.log(d);
            
        }else{
            document.getElementById("twview").style.display = "block";
            console.log(d);
        }
            

        
        
    }else{
        loggedIn.forEach(item => item.style.display = 'none');
        loggedOut.forEach(item => item.style.display = 'block');
    }
}
