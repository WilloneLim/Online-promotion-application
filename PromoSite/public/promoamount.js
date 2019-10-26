//GLOBALS
var database;
var chartDatasaldat;
var x2;

//setup function to setup firebase configuration
function setup() {
 
 var firebaseConfig = {
    apiKey: "AIzaSyCA_sMgKuNxk2ngSqJRSX8aAvmrn80fBPo",
            authDomain: "onlinepromoapp.firebaseapp.com",
            databaseURL: "https://onlinepromoapp.firebaseio.com",
            projectId: "onlinepromoapp"
  };
    //initialize Firebase
  firebase.initializeApp(firebaseConfig);
  database = firebase.database();

  
}

//function to load chart and it's value
function read(){
firebase.database().ref().child("transaction").on("value", function(value){
       
        x2=value.val();
        console.log(x2);
        var keys = Object.keys(x2);
        var salesdta = []; //sales-x-axis
        var salesdt = []; //sales date-y-axis
        console.log(keys);
    
       for (var i = 0; i < keys.length; i++){
           var k = keys[i];
           console.log(k);
           var sal = x2[k].Amount;
           var dat = x2[k].Created;
           var chartDatasal = [];
           var chartDatasaldat = [];
           chartDatasal.push(sal);
           salesdta.push(sal);
           salesdt.push(dat);
           chartDatasaldat.push(dat);
       }
    
    console.log(salesdta);
    
        var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: salesdt,
        datasets: [{
            label: '# of Sales',
            data: salesdta,  
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)'
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                //offset:true
               ticks: {
                    beginAtZero: true
                   
                }
            }],
            xAxes:[{
                ticks: {
                    beginAtZero: true
            },
            
                
            
       }]
        }
    }
});
   
        
});
}
        