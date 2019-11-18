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
            
            const img = `
                        <div class="row col-md-11 border mx-auto ">
                        <div class="col-md-12">
                            <img class="img-fluid w-100" src="${doc.data().coverimg}" alt="promoterIMG" style="margin-top:20px;">
                        </div>
                         <div class="col-md-2">
                            <img class="img-fluid m-3" src="${doc.data().profileimg}" alt="promoterIMG" style="margin-top:20px;">
                            <h3>${doc.data().username}</h3>
                        </div>
                        <div class="col-md-7 title m-3 border" style="margin-top:20px;">
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
     
     

//    const ref = db.collection('promotions').doc('K4a5ZMqj36f0Ch8sh2F6');
    

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
        var submit = newRow.insertCell(4);
        

        // Append a text node to the cell
        var a_title  = document.createTextNode(data.data().title);
        var a_desc  = document.createTextNode(data.data().desc);
        var a_image  = document.createElement('img');
    
        a_image.src = data.data().image; 
        a_image.setAttribute("style", "width: 200px;");
    
        var a_enddate  = document.createTextNode(data.data().enddate);
    
        var a_submit  = document.createElement('button');
        a_submit.innerHTML = "Edit";
    
        let a = 'openEditor("' + data.id + '")';
    
        a_submit.setAttribute("class", "btn btn-info");
        a_submit.setAttribute("type", "button");
        a_submit.setAttribute("onclick", a);
        
    
        
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
        submit.appendChild(a_submit);
       // datebtn.appendChild(btn);
       // submit.appendChild(smt);
        
    
        
//        });
//    }

}

var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
function openEditor(text){
    
    var docRef = db.collection("promotions").doc(text);

    docRef.get().then(function(doc) {
        if (doc.exists) {
            let c = `<div class="col-md-12 pb-5 grid-item">
             <div class="col-md-8 border mx-auto p-2">
             <img class="img-fluid border p-2 mt-2" src="${doc.data().image}" style="width: 100%;" alt="IMG-PRODUCT">
             <div class="custom-file ml-3 mt-4"> Choose new image: 
              <input
                     type="hidden" 
                     class="custom-file-input" 
                     id="customFileA" 
                     name="app_cover"
                     role="uploadcare-uploader"
                     data-crop="820x315"
                     >
            </div>

            <div class="form-group pt-2 pl-3">
                <label>Title</label>
                <input type="text" class="form-control" value="${doc.data().title}">
              </div>

            <div class="form-group pt-2 pl-3">
                <label>Desc</label>
                <textarea class="form-control" rows="3">${doc.data().desc}</textarea>
              </div>
            <br/>
            <div class="form-group mt-3">
            <label for="datepickerb">End Date</label>
            <input type="date" id="datepickerb" name="app_edate" width="276" placeholder="" />
            </div>
            <br/>
            </div>
            </div> `;
            document.getElementById("editor").innerHTML = c;
            modal.style.display = "block";
            
        } else {
            // doc.data() will be undefined in this case
            console.log("No such document!");
        }
    }).then(function(doc){
        
            
            
    }).catch(function(error) {
        console.log("Error getting document:", error);
    });
    
}

// When the user clicks on <span> (x), close the modal
//span.onclick = function() {
//  modal.style.display = "none";
//}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
         
function closemodal(){
      modal.style.display = "none";

}
    
          
          
          