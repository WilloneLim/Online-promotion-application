const functions = require('firebase-functions');

const admin = require('firebase-admin');

const promoter = require('firebase-admin');

admin.initializeApp();

exports.addAdminRole = functions.https.onCall((data,context) => {
    
    //check request is made by admin
//    if(context.auth.token.promoter !== true){
//        return {error: 'Only admins can add other admins... lol'}
//    }
    
    //get user and add custom claim
    return admin.auth().getUserByEmail(data.email).then(user => {
        return admin.auth().setCustomUserClaims(user.uid,{
            admin: true
        });
    }).then(() => {
        return {
            message: `Success! ${data.email} has been made an admin`
        }
    }).catch(err => {
        return err;
    });
});

exports.addPromoterRole = functions.https.onCall((data,context) => {
    
//    //check request is made by admin
//    if(context.auth.token.admin !== true){
//        return {error: 'Only admins can add promoters... lol'}
//    }
//    
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
        return err;
    });
});
