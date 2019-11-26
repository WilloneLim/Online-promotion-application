const loggedIn = document.querySelectorAll('.loggedIn');
const loggedOut = document.querySelectorAll('.loggedOut');
const loggedBoth = document.querySelectorAll('.loggedBoth');
const accountDetails = document.querySelector('.account-details');



const title = document.querySelector('#title');
const desc = document.querySelector('#desc');
const author = document.querySelector('#author');
const promoter = document.querySelector('#promoter');
const promo = document.querySelector('#promoimg');
const twitter = document.querySelector('#twshare');

const setupUI = (user) => {
    loggedBoth.forEach(item => item.style.display = 'block');
    if (user){

        loggedIn.forEach(item => item.style.display = 'block');
        loggedOut.forEach(item => item.style.display = 'none');
        
        
    }else{
        //hide profile
//        adminItems.forEach(item => item.style.display = 'none');
        
        loggedIn.forEach(item => item.style.display = 'none');
        loggedOut.forEach(item => item.style.display = 'block');
    }
    
}

var url_string = window.location.href;
var url = new URL(url_string);
var c = url.searchParams.get("id");

var passimage;
var passtitle;
var passdesp;

if (c != null){
    console.log(c);
    
    db.collection('promotions').doc(c).get().then(doc => {
        let t = doc.data().title;
        let d = doc.data().desc;
        let promoimg = doc.data().image;
        
        passimage = doc.data().image;
        passtitle = doc.data().title;
        passdesp = doc.data().desc;
        
        db.collection('promoters').doc(doc.data().promoter).get().then(doca => {
            let promoterimg = doca.data().profileimg;
            let a = doca.data().username;
            
            title.innerHTML = t;
            desc.innerHTML = d;
            promo.src = promoimg;
            author.innerHTML = a;
            promoter.src = promoterimg;

        });
    
});
    
    
    
}

function fbshareCurrentPage(){
    console.log("location");
//    newwindow = window.open("https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent("https://onlinepromoapp.firebaseapp.com/sharing.html?id="+c)+"&t="+document.title, '', 
//    'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
    
    newwindow = window.open("https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent("https://onlinepromotionapp.page.link/?link=https://onlinepromoapp.web.app/sharing.html?id=" + c + "&si="+ passimage +"&st="+ passtitle)+"&t="+document.title, '', 
    'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
    location = "pending.html?id="+c +"&sm=fb";
    setTimeout(function(){ window.location.href=location; }, 3000);
    
    modal.style.display = "none"
//    return false; 
}

function twshareCurrentPage(){
    console.log("location");
    
//    window.open("http://twitter.com/share?text=Im Sharing on Twitter&url=https://onlinepromoapp.firebaseapp.com/sharing.html?id=" + c + "&hashtags=promoalert");
    window.open("http://twitter.com/share?text=Im Sharing on Twitter&url=https://onlinepromoapp.firebaseapp.com/sharing.html?id=" + c + "&hashtags=promoalert");
    location = "pending.html?id="+c +"&sm=tw";
    setTimeout(function(){ window.location.href=location; }, 3000);
}

