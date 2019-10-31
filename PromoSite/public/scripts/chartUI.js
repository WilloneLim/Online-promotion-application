var labelsArray = [];
var dataArray = [];
var timeFormat = "MM/DD/YYYY HH:mm";
// var user = firebase.auth().currentUser;
// var id = user.uid;
// console.log(id);

db.collection('transaction').orderBy('Created','asc').get().then((snapshot) => {
    snapshot.docs.forEach(doc => {
        var item = doc.data();

        var price = item.Amount;
        dataArray.push(price);

        var date = item.Created;
        var res = date.toString().slice(2,15);
        console.log('HEY:', res);
        labelsArray.push(res);
    });
    myChart.update();
});

var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
type: 'line',
data: {
    // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", 
    //          "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
    labels: labelsArray,
    datasets: [{
        label: 'TRANSACTIONS TIMELINE',
        data: dataArray , 
          backgroundColor: [
                'rgba(255,255,51,0.2)'
            ],
            borderColor: [
                'rgba(255,153,0,1)'
                
            ],
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
    },
    //add tooltips
    tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
            label: function(tooltipItem) {
                return "RM" + Number(tooltipItem.yLabel) + ' ' + 'in total';
            }
        }
    },
    hover: {
			mode: 'nearest',
			intersect: true
    },
    // Container for pan options
    pan: {
        // Boolean to enable panning
        enabled: true,

        // Panning directions. 
        mode: 'x',
       
        speed: 3,
      threshold: 2
    },

    // Container for zoom options
    zoom: {
        // enable zooming
        enabled: true,                      
        // Zooming directions. 
        mode: 'x',
        
        }
    }
});

//setInterval(function() { myChart.update();}, 1000); 
   
//$('#reset_zoom').click(function(){
//    myChart.resetZoom();
//    console.log(myChart);
//});

//$('#disable_zoom').click(function(){
//    myChart.ctx.canvas.removeEventListener('wheel', myChart._wheelHandler);
//});
//
//$('#enable_zoom').click(function(){
//    myChart.ctx.canvas.addEventListener('wheel', myChart._wheelHandler);
//});
