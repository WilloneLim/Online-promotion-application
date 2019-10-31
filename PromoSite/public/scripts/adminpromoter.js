const promoterTable = document.querySelector('#promotertable');

//const proForm = document.querySelector('.pro-form');
//proForm.addEventListener('submit', (e) => {
//    e.preventDefault();
//    const proEmail = document.querySelector('#pro-add').value;
//    const addPromoterRole = functions.httpsCallable('addPromoterRole');
//    addPromoterRole({ email: proEmail}).then(result => {
//        window.alert(result.data);
//        proForm.reset();
//    })
//})

const setupPromoter = (data) => {

    if (data.length){
    let html = '';
    data.forEach(doc => {
        const promoter = doc.data();
        

        // Insert a row in the table at the last row
        var newRow   = promoterTable.insertRow();


        // Insert a cell in the row at index 0
        var name  = newRow.insertCell(0);
        var desc  = newRow.insertCell(1);
        var email  = newRow.insertCell(2);
        var edit  = newRow.insertCell(3);
        var del  = newRow.insertCell(4);

        // Append a text node to the cell
        var a_name  = document.createTextNode(`${promoter.username}`);
        var a_desc  = document.createTextNode(`${promoter.desc}`);
        var a_email  = document.createTextNode(`${promoter.email}`);
        var a_edit  = document.createElement("BUTTON");
        var a_del  = document.createElement("BUTTON");
        
        
        a_edit.innerHTML = "Edit";
        a_del.innerHTML = "Delete";
        
        a_del.setAttribute("class","btn btn-danger btn-lg btn-block");
        a_del.setAttribute("type","button");
        a_del.setAttribute("onclick",`deletepro("${doc.id}")`)
        
        a_edit.setAttribute("class","btn btn-info btn-lg btn-block");
        a_edit.setAttribute("type","button");
        a_edit.setAttribute("onclick", `goingTo("${doc.id}")`);
        
        name.appendChild(a_name);
        desc.appendChild(a_desc);
        email.appendChild(a_email);
        edit.appendChild(a_edit);
        del.appendChild(a_del);
        
    });

//        promoterList.innerHTML = html;

    }else{
        console.log("<h5>Please log in to view promotions!</h5>");
    }
    
}

function deletepro(p){
    var r = confirm("Are you sure you would like to delete this promoter?");
      if (r == true) {
        db.collection("promoters").doc(p).delete().then(function() {
            console.log("Document successfully deleted!" + p);
            document.location.reload(true)
        }).catch(function(error) {
            alert("Error removing document: ", error);
        });
          
      } else {
        txt = "You pressed Cancel!";
      }
}

function goingTo(hr){
    window.location.href = "addpromoteradmin.html?id=" + hr;
}
