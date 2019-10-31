const promoTable = document.querySelector('#transtable');
const limit = 10;

var data;
var bef;
var all = [];
var end;
var c;

const setupUI = (user) => {
    
    db.collection('settings').doc('commisionrate').get().then(function(doc) {
        if (doc.exists) {
            c = doc.data().value;
            
        } else {
            console.log("No such document!");
        }
        
        db.collection('transaction')
        .limit(limit).onSnapshot(snapshot =>{
            data = snapshot.docs;
            setTran(data);

        },err => {
            console.log(err.message);
        });
        
    }).catch(function(error) {
        console.log("Error getting document:", error);
    });
    
    
    

    
    
    
    
    
//    db.collection("transaction").get().then(function(querySnapshot) {
//        querySnapshot.forEach(function(doc) {
//            
//        });
//    });
     
}

function setTran(adata){
    
    adata.forEach(doc => {
        
            var newRow   = promoTable.insertRow();
            
            var id  = newRow.insertCell(0);
            var paid  = newRow.insertCell(1);
            var profit  = newRow.insertCell(2);

            // Append a text node to the cell
            var a_id  = document.createTextNode(`${doc.id}`);
            
            let pa = doc.data().Amount * 1;
            
            let a = pa.toFixed(2);
            
            
            var a_paid  = document.createTextNode(a);
            
            let com = c * 1;
            let pro = doc.data().Amount * com/100;
            let p = pro.toFixed(2);
            
            var a_profit  = document.createTextNode(p);

            id.appendChild(a_id);
            paid.appendChild(a_paid);
            profit.appendChild(a_profit);
        
    });
    
}

function loadNext(){
    
    for(var i = promoTable.rows.length - 1; i > 0; i--)
    {
        promoTable.deleteRow(i);
    }
    
    document.getElementById("bef").style.visibility = "visible";
    
    if(data != undefined){
    let last = data[data.length - 1];
        
    bef = data[0];
    
    console.log(bef.id);
    console.log(last.id);
        
        if(last != null){
                db.collection('transaction').startAfter(last).limit(limit).onSnapshot(snapshot =>{
                d = snapshot.docs;
                data = d;
                    
                if (data.length < 10){
                    document.getElementById("nex").style.visibility = "hidden";
                    
                }
                    
                setTran(d);

            },err => {
                console.log(err.message);
            });

        }else{
            check = true;
            setTran([]);
        }
    
    }
}


function loadBefore(){
    
    document.getElementById("nex").style.visibility = "visible";
    
    for(var i = promoTable.rows.length - 1; i > 0; i--)
    {
        promoTable.deleteRow(i);
    }
    
    
    if(data != undefined){
        let last = data[data.length - 10];
        
        console.log("BEF" + bef.id);
        console.log(data.length);
            console.log("nuts");
            if(bef != null){
                    db.collection('transaction').startAt(bef).limit(limit).onSnapshot(snapshot =>{
                    d = snapshot.docs;
                    data = d;

                    console.log("length" + d.length);

                    setTran(d);


                },err => {
                    console.log(err.message);
                });

            }else{
                check = true;
                setTran([]);
            }
        }
}