const functions = require('firebase-functions');

const admin = require('firebase-admin');

const promoter = require('firebase-admin');

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
          password: '123123'
         })
    .then(function(userRecord) {
        // See the UserRecord reference doc for the contents of userRecord.
        return userRecord.uid;
    })
    .catch(function(error) {
        return 'Error';
    });
    
});
//
//exports.dailyChecks = functions.https.onRequest((req,res) => {
//    const currentTime = new Date().getTime();
//    const lyesterday = currentTime - 86400000;
//    const arr = []
//    
//    db.collection("promotester").add({
//    name: "Tokyo",
//    country: "Japan"
//    })
//    .then(function(docRef) {
//        console.log("Document written with ID: ", docRef.id);
//    })
//    .catch(function(error) {
//        console.error("Error adding document: ", error);
//    });
//})
//
//

    



