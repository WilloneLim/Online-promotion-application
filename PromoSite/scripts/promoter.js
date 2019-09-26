const accountDetails = document.querySelector('#accountdetails');
const promoList = document.querySelector('#promoList');

const setupUI = (user) => {
    if (user){
        db.collection('users').doc(user.uid).get().then(doc => {
//            const html = `<h2>${user.email}</h2><p>${doc.data().bio}</p><h3>${user.admin ? 'Admin' : ''}</h3>`;
//            const html2 = `<h3>${user.promoter ? 'Promoter' : ''}</h3>`;
//            accountDetails.innerHTML = html + html2;
            console.log(user.uid);
            
            const img = `<div class="row border mt-3 ">
                         <div class="col-md-2">
                            <img class="img-fluid m-3" src="${doc.data().profileimg}" alt="promoterIMG" style="margin-top:20px;">
                            <h3>${doc.data().username}</h3>
                        </div>
                        <div class="col-md-4 title m-3 border" style="margin-top:20px;">
                          <p>${doc.data().desc}</p>
                      </div>
                        <div class="col-md-2 mt-3">
                              <a href="apply_promotion.html" class="btn btn-primary btn-block">Apply for new promotion</a>
                              <a href="#" class="btn btn-primary btn-block disabled">View / Edit Customer View</a>

                          </div>
                      </div>`;
            accountDetails.innerHTML = img;
            
        })
        
        
        
        
    }else{
        console.log("no");
    }
}


const setupPromoList = (data) => {
    

    console.log(data.data());
//    var promolist = data.data().desc;
    
//    if (data.length){
//    let html = '';
//    data.forEach(doc => {
//        const promo = doc.data();
        

        // Insert a row in the table at the last row
        var newRow   = promoList.insertRow();


        // Insert a cell in the row at index 0
        var name  = newRow.insertCell(0);
        var desc  = newRow.insertCell(1);
        var email  = newRow.insertCell(2);
        var lastOnline  = newRow.insertCell(3);

        // Append a text node to the cell
        var a_name  = document.createTextNode(data.data().desc);
        var a_desc  = document.createTextNode(data.data().desc);
        var a_email  = document.createTextNode(data.data().desc);
        var a_lastOnline  = document.createTextNode(data.data().desc);
        
        name.appendChild(a_name);
        desc.appendChild(a_desc);
        email.appendChild(a_email);
        lastOnline.appendChild(a_lastOnline);
        
//        });
//    }
}
          
    
          
          
          