const functions = require('firebase-functions');

const admin = require('firebase-admin');

const promoter = require('firebase-admin');


const runtimeOpts = {
  timeoutSeconds: 540,
  memory: '1GB'
}

admin.initializeApp();

exports.addAdminRole = functions.https.onCall((data,context) => {
    
    //check request is made by admin
//    if(context.auth.token.promoter !== true){
//        return {error: 'Only admins can add other admins'}
//    }
    
    //get user and add custom claim
    return admin.auth().getUserByEmail(data.email).then(user => {
        return admin.auth().setCustomUserClaims(user.uid,{
            admin: true
        });
    }).then(() => {
        return `Success! ${data.email} has been made an admin`;
    }).catch(err => {
        return err.message;
        
    });
});

exports.addPromoterRole = functions.https.onCall((data,context) => {
    
//    //check request is made by admin
    if(context.auth.token.admin !== true){
        return {error: 'Only admins can add promoters'}
    }
    //get user and add custom claim
    return promoter.auth().getUserByEmail(data.email).then(user => {
        return promoter.auth().setCustomUserClaims(user.uid,{
            promoter: true
        });
    }).then(() => {
        return {
            message: `Success! ${data.email} has been made an promoter`
        }
    }).catch(err => {
        return err.message;
    });
});


exports.addPromoterAccount = functions.https.onCall((data,context) => {
    
    return admin.auth().createUser({
          uid: data.uid,
          email: data.email,
          password: data.pass
         })
    .then(function(userRecord) {
        // See the UserRecord reference doc for the contents of userRecord.
        return userRecord.uid;
    })
    .catch(function(error) {
        return 'Error';
    });
    
});


exports.dailyChecks = functions.runWith(runtimeOpts).https.onRequest((req,res) => {
    
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    
    var test = new Date();
    test = "2019/10/23";
    
    today = yyyy + '/' + mm + '/' + dd;
    
    let date1 = new Date(today);
    
    
    admin.firestore().collection("promotions").get().then(function(querySnapshot) {
    querySnapshot.forEach(function(doc) {
        let date2 = new Date(doc.data().enddate);
        const diffTime = Math.abs(date2 - date1);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        console.log(doc.id);
        if (date1 > date2){
//            db.collection("promoters").doc(doc.data().promoter).get().then(function(adoc) {
//                if (adoc.exists) {
////                    let arr = adoc.data().promotions;
////                    
////                    db.collection("promoters").doc(doc.data().promoter).update({
////                        promotions: arr
////                    })
////                    console.log("Promoter: " + adoc.data().username);
//                    
//                } else {
//                    console.log("No such document!");
//                    
//                }
//                
//            }).catch(function(error) {
//                console.log("Error getting document:", error);
//            });
            
            console.log(" Delete " + doc.id);
//            db.collection("promotions").doc(doc.id).delete().then(function() {
//                console.log("Document successfully deleted!");
//            }).catch(function(error) {
//                console.error("Error removing document: ", error);
//            });
            }else{
                console.log("Save " + doc.id);
            }
        
        });
        
    }).then(function() {
        return "11";
    }).catch(function(error) {
        return 'Error creating new user:' + error;
    });

});


    



