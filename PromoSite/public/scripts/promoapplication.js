const promoTable = document.querySelector('#promotable');

const setupUI = (user) => {
    
    setupPromoApp();
    console.log("hi");

}

function setupPromoApp(){

    var a=0;
    db.collection("promo_applications").get().then(function(querySnapshot) {
        querySnapshot.forEach(function(doc) {
            const promo = doc.data();
        
            a += 1;
        console.log(doc.id);

        // Insert a row in the table at the last row
        var newRow   = promoTable.insertRow();
        
        
        
        
        let ref = db.collection('promoters').doc(promo.promoter);
        let getDoc = ref.get()
          .then(dc => {
            if (!doc.exists) {
              console.log('No such document!');
            } else {
                
                document.getElementById("loader").style.display = "none";
                var name  = newRow.insertCell(0);
                var desc  = newRow.insertCell(1);
                var email  = newRow.insertCell(2);
                var view  = newRow.insertCell(3);

                // Append a text node to the cell
                var a_name  = document.createTextNode(`${dc.data().username}`);
                var a_desc  = document.createTextNode(`${promo.title}`);
                var a_email  = document.createTextNode(`${promo.desc}`);
                var a_view  = document.createElement("BUTTON");
        
        
                a_view.innerHTML = "View";

                a_view.setAttribute("class","btn btn-info btn-lg btn-block");
                a_view.setAttribute("type","button");
                a_view.setAttribute("onclick",`viewpromoapp("${doc.id}")`)

                name.appendChild(a_name);
                desc.appendChild(a_desc);
                email.appendChild(a_email);
                view.appendChild(a_view);

            }
            })
            
            
        })
        
        if (a == 0){
            document.getElementById("loader").style.display = "none";
            document.getElementById("empty").style.display = "block";
        }
    })
    
//    if (data.length){
//    let html = '';
//    data.forEach(doc => {
//        
//        
//
//        // Insert a cell in the row at index 0
//        
//        
//    });
//
////        promoterList.innerHTML = html;
//
//    }else{
//        document.getElementById("empty").style.display = "block";
//    }
//    
}

function viewpromoapp(a){
    window.location.href = "v_promoapp.html?id=" + a;
}
