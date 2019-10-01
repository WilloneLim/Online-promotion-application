const promoTable = document.querySelector('#promotable');

const setupPromoApp = (data) => {

    if (data.length){
    let html = '';
    data.forEach(doc => {
        const promo = doc.data();
        
        console.log(doc.id);

        // Insert a row in the table at the last row
        var newRow   = promoTable.insertRow();
        
        var a_view = document.createElement("a");       
        a_view.appendChild(document.createTextNode("VIEW"));                                
        a_view.href=`promoapplication.html?${doc.id}`;
        a_view.setAttribute("class","btn btn-info btn-lg btn-block");
        a_view.setAttribute("type","button");


        // Insert a cell in the row at index 0
        var name  = newRow.insertCell(0);
        var desc  = newRow.insertCell(1);
        var email  = newRow.insertCell(2);
        var view  = newRow.insertCell(3);

        // Append a text node to the cell
        var a_name  = document.createTextNode(`${doc.id}`);
        var a_desc  = document.createTextNode(`${promo.title}`);
        var a_email  = document.createTextNode(`${promo.desc}`);
//        var a_view  = document.createTextNode(`<a type="button" class="btn btn-info" href="">View</a>`);
        
        name.appendChild(a_name);
        desc.appendChild(a_desc);
        email.appendChild(a_email);
        view.appendChild(a_view);
        
    });

//        promoterList.innerHTML = html;

    }else{
        console.log("<h5>Please log in to view promotions!</h5>");
    }
    
}
