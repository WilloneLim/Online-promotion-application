const accountDetails = document.querySelector('#accountdetails');

const setupUI = (user) => {
    if (user){
        db.collection('users').doc(user.uid).get().then(doc => {
//            const html = `<h2>${user.email}</h2><p>${doc.data().bio}</p><h3>${user.admin ? 'Admin' : ''}</h3>`;
//            const html2 = `<h3>${user.promoter ? 'Promoter' : ''}</h3>`;
//            accountDetails.innerHTML = html + html2;
            
            const img = `<div class="row border mt-3 ">
                         <div class="col-md-2">
                            <img class="img-fluid m-3" src="${doc.data().profileimg}" alt="promoterIMG" style="margin-top:20px;">
                            <h3>${doc.data().username}</h3>
                        </div>
                        <div class="col-md-4 title m-3 border" style="margin-top:20px;">
                          <p>${doc.data().desc}</p>
                      </div>
                        <div class="col-md-2 mt-3">
                              <a href="promoapplication.html" class="btn btn-primary btn-block">Apply for new promotion</a>
                              <a href="#" class="btn btn-primary btn-block disabled">View / Edit Customer View</a>

                          </div>
                      </div>`;
            accountDetails.innerHTML = img;
            
        })
        
    }else{
        console.log("no");
    }
}



          
          
          
          
          
          