//PROMOSITE
//listen for auth status changes
auth.onAuthStateChanged(user => {
    if(user){
        user.getIdTokenResult().then(idTokenResult => {
            user.admin = idTokenResult.claims.admin;
            user.promoter = idTokenResult.claims.promoter;
            
            console.log(idTokenResult.claims);
        });
        
        if(window.location.href.indexOf("share") > -1){
            setupUI(user);
        }
        if(window.location.href.indexOf("sharing") > -1){
            setupUI(user);
        }
        if(window.location.href.indexOf("index") > -1){
            setupUI(user);
        }
        if(window.location.href.indexOf("pending") > -1){
            setupUI(user);
        }
        if(window.location.href.indexOf("showQR") > -1){
            setupUI(user);
        }
        if(window.location.href.indexOf("admin_settings") > -1){
            setupUI(user);
        }
        if(window.location.href.indexOf("admin_transactions") > -1){
            setupUI(user);
        }
        
        if(window.location.href.indexOf("myaccount") > -1){
            db.collection('promotions').onSnapshot(snapshot =>{
                setupUI(user);
                
            },err => {
                console.log(err.message);
            });
        }else if(window.location.href.indexOf("admin_promoters") > -1){
            db.collection('promoters').onSnapshot(snapshot =>{
                setupPromoter(snapshot.docs);
//                setupUI(user);
            },err => {
                console.log(err.message);
            });
        }else if(window.location.href.indexOf("viewapplicationsadmin") > -1){
            db.collection('promoter_applications').onSnapshot(snapshot =>{
                setupPromoterApp(snapshot.docs);
            },err => {
                console.log(err.message);
            });
        }else if(window.location.href.indexOf("viewpromoappsadmin") > -1){
            db.collection('promo_applications').onSnapshot(snapshot =>{
                setupPromoApp(snapshot.docs);
            },err => {
                console.log(err.message);
            });
        }else if(window.location.href.indexOf("promoter") > -1){
            
            if(window.location.href.indexOf("promoterview") > -1){
                setupUI(user);
            }else{
            db.collection('promoters').doc(user.uid).onSnapshot(snapshot =>{
                
                promolist = snapshot.data().promotions;
                alist = [];
                setupUI(user);
                    promolist.forEach(doc => {

                        db.collection('promotions').doc(doc).onSnapshot(asnapshot =>{
                            alist.push(asnapshot);
                            setupPromoList(asnapshot);

                        });
                    })
                
            },err => {
                console.log(err.message);
            });
            }
        }
        
    }else{
        setupUI();
        if(window.location.href.indexOf("index") > -1){
            offLoader();
        }
    }
});




//logout user
const logout = document.querySelector('#logout');
        logout.addEventListener('click', (e) => {
        e.preventDefault();
        auth.signOut();
            firebase.auth().signOut().then(function() {
                console.log("done");
            }).catch(function(error) {
                console.log(error);
            });
        window.location.replace("signin.html");
    });


