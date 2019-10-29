const promoterTable = document.querySelector('#promotertable');

const setupPromoterApp = (data) => {

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
        var view  = newRow.insertCell(3);

        // Append a text node to the cell
        var a_name  = document.createTextNode(`${promoter.username}`);
        var a_desc  = document.createTextNode(`${promoter.desc}`);
        var a_email  = document.createTextNode(`${promoter.email}`);
        var a_view  = document.createElement("BUTTON");
        
        
        a_view.innerHTML = "View";
        
        a_view.setAttribute("class","btn btn-info btn-lg btn-block");
        a_view.setAttribute("type","button");
        a_view.setAttribute("onclick",`viewproapp("${doc.id}")`)
        
        name.appendChild(a_name);
        desc.appendChild(a_desc);
        email.appendChild(a_email);
        view.appendChild(a_view);
        
    });

//        promoterList.innerHTML = html;

    }else{
        console.log("<h5>No applications!</h5>");
    }
    
}

function viewproapp(a){
    window.location.href = "v_proapp.html?id=" + a;
}
