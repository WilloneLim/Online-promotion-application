//add admin cloud function
const adminForm = document.querySelector('.admin-form');
adminForm.addEventListener('submit', (e) => {
    e.preventDefault();
    console.log("here");
    const adminEmail = document.querySelector('#admin-add').value;
    const addAdminRole = functions.httpsCallable('addAdminRole');
    addAdminRole({ email: adminEmail}).then(result => {
        window.alert(result.data);
        adminForm.reset();
    })
})

const promoList = document.querySelector('#promoList');

db.collection('transaction').get().then((snapshot)=>{
    snapshot.docs.forEach(doc=>{
       
        var promoData = doc.data().Amount;
        var promoData = doc.data().Created;
    })
})

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
        var date  = newRow.insertCell(0);
        var price  = newRow.insertCell(1);
        

        // Append a text node to the cell
        var a_date  = document.createTextNode(data.data().Created);
        var a_price  = document.createTextNode(data.data().Amount);
       
        title.appendChild(a_date);
        desc.appendChild(a_price);
      
        

}