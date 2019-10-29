const accountDetails = document.querySelector('#accountdetails');
const promoList = document.querySelector('#promoList');

const setupUI = (user) => {
    if (user){
//        console.log("no");
        db.collection('promoters').doc(user.uid).get().then(doc => {
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
     
     

    const ref = db.collection('promotions').doc('K4a5ZMqj36f0Ch8sh2F6');
    

    console.log(data.data());
//    var promolist = data.data().desc;
    
//    if (data.length){
//    let html = '';
//    data.forEach(doc => {
//        const promo = doc.data();
        

        // Insert a row in the table at the last row
        var newRow   = promoList.insertRow();


        // Insert a cell in the row at index 0
        var title  = newRow.insertCell(0);
        var desc  = newRow.insertCell(1);
        var img  = newRow.insertCell(2);
        var extdate  = newRow.insertCell(3);
        var datebtn = newRow.insertCell(4);
        var submit = newRow.insertCell(5);
        

        // Append a text node to the cell
        var a_title  = document.createTextNode(data.data().title);
        var a_desc  = document.createTextNode(data.data().desc);
        var a_image  = document.createTextNode(data.data().image);
        var a_enddate  = document.createTextNode(data.data().enddate);
        //var btn = document.createElement("input");
       // btn.setAttribute("type","button");
        // btn.setAttribute("id","datepicker");
        // btn.setAttribute("name","app_edate");
        // btn.setAttribute("placeholder","Extend date");
        // // btn.onclick = getdate(this);
        // $('#datepicker').datepicker({
        //     uilibrary: 'bootstrap4',
        //     format: 'yy/mm/dd'
        // })

        //var setval = document.getElementById('datepicker').value;

        //  ref.update({
            
        //  })

        //  var smt = document.createElement("input");
        //  smt.setAttribute("type","submit");
        //  smt.setAttribute("name","upload");
        //  smt.setAttribute("value","upload");
         
        // function getdate(){
        //     var setDate = $('#extbtn').datepicker({
        //         uiLibrary: "bootstrap4",
        //         dateFormat: "yy/mm/dd"
        //     }).value
            
        //     console.log(setDate);
            // ref.update({
            //    enddate: ['extbtn'].value
            // })
        //}
        
        
        
        title.appendChild(a_title);
        desc.appendChild(a_desc);
        img.appendChild(a_image);
        extdate.appendChild(a_enddate);
       // datebtn.appendChild(btn);
       // submit.appendChild(smt);
        
    
        
//        });
//    }

}
         
    
          
          
          