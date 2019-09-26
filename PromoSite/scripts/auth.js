//PROMOSITE
//listen for auth status changes
auth.onAuthStateChanged(user => {
    if(user){
        user.getIdTokenResult().then(idTokenResult => {
            user.admin = idTokenResult.claims.admin;
            user.promoter = idTokenResult.claims.promoter;
            
            console.log(idTokenResult.claims);
        });
        
        
        if(window.location.href.indexOf("index") > -1){
            db.collection('promotions').onSnapshot(snapshot =>{
                setupUI(user);
                setupPromo(snapshot.docs);
                
            },err => {
                console.log(err.message);
            });
        }
        if(window.location.href.indexOf("myaccount") > -1){
            db.collection('promotions').onSnapshot(snapshot =>{
                setupUI(user);
                
            },err => {
                console.log(err.message);
            });
        }
        
        if(window.location.href.indexOf("admin_promoters") > -1){
            db.collection('promoters').onSnapshot(snapshot =>{
                setupPromoter(snapshot.docs);
                setupUI(user);
            },err => {
                console.log(err.message);
            });
        }
        
        
        if(window.location.href.indexOf("viewapplicationsadmin") > -1){
            db.collection('promoter_applications').onSnapshot(snapshot =>{
                setupPromoterApp(snapshot.docs);
            },err => {
                console.log(err.message);
            });
        }
        if(window.location.href.indexOf("viewpromoappsadmin") > -1){
            db.collection('promo_applications').onSnapshot(snapshot =>{
                setupPromoApp(snapshot.docs);
            },err => {
                console.log(err.message);
            });
        }
        
        if(window.location.href.indexOf("promoter") > -1){
            db.collection('promoters').doc(user.uid).onSnapshot(snapshot =>{
                
                promolist = snapshot.data().promotions;
                alist = [];
                
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
        
    
        
    }else{
        setupUI();
        setupPromo([]);
    }
});




//logout user
const logout = document.querySelector('#logout');
    logout.addEventListener('click', (e) => {
        e.preventDefault();
        auth.signOut();
        window.location.replace("signin.html");
    });


