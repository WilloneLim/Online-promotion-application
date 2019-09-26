const promoterTable = document.querySelector('#promotertable');

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
        var lastOnline  = newRow.insertCell(3);

        // Append a text node to the cell
        var a_name  = document.createTextNode(`${promoter.username}`);
        var a_desc  = document.createTextNode(`${promoter.desc}`);
        var a_email  = document.createTextNode(`${promoter.userID}`);
        var a_lastOnline  = document.createTextNode(`To Be Added`);
        
        name.appendChild(a_name);
        desc.appendChild(a_desc);
        email.appendChild(a_email);
        lastOnline.appendChild(a_lastOnline);
        
    });

//        promoterList.innerHTML = html;

    }else{
        console.log("<h5>Please log in to view promotions!</h5>");
    }
    
}
