<?php 
include 'connect.php'; 
session_start();

$connect = mysqli_connect("localhost", "root", "", "promoalert");
$query = "SELECT * FROM transaction";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ date:'".$row["date"]."', sale:".$row["sale"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Promo</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0" />
    <!-- Bootstrap -->
    
    <link rel="icon" type="image/png" href="images/Logo.png"/>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css.map">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css.map">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css.map">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css.map">
    <link rel="stylesheet" href="css/bootstrap.css.map">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css.map">
    <link rel="stylesheet" type="text/css" href="css/main.css">
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.1/dist/html2canvas.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet"/>
</head>
<body id ="main">
    <div class="header">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="images/navnav.png" height="30" alt="PromoAlert Logo">
        </a>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Sign Out</a>
            </li>
          </ul>
            </div>
        </nav>
    </div>
    
<?php
    
    if(isset($_GET['id'])) {
        $sql = "SELECT * FROM promotion WHERE promo_id =".$_GET['id'];
        
        $result = $conn->query($sql) or die($conn->error);
        while($row = $result->fetch_assoc()){
            
 
    echo'<div class="container" id="promoimg">';
      echo'<div class="row">';
          echo'<div class="col-md-6 image">';
              echo'<img src="images/'.$row['promo_img'].'" alt="tealiveid" id="imginfo">';
          echo'</div>';
          
          echo'<div class="col-md-6 title" style="text-align:justify;">';
          echo '<h1>'.$row['promo_title'].'</h1>'; 
          echo '<br/>';
          echo'<p>Receive up to 20% off for the selected promotion. Price shown reflects discount. Offer ends 8/15/2019 at 11:59 PM GMT. Offer valid for a limited time only.This offer does not apply to gift cards, applicable taxes, or shipping and handling. Offer cannot be combined with any other offers or used on previous purchases.</p>';
          echo'</div>'; 
          
      echo'</div>';
     echo '<hr class="w-80 mt-5" />';
     echo'<div class="col-md-12">';
      echo'<h2 align="center" class="graphtitle"> Promotion Statistics</h2>';
     echo '<hr class="w-80 mt-5" />';
     echo'</div>';
        
     echo'<br/>';
        
      echo'<div class="row">';
        echo'<div id="prof" class="col-md-12">';
            echo'<div id="chartLegend" class="line-chart-legend"></div>';
            echo'<div id="chart"></div>';  
        echo'</div>';
        echo'<br/>';
          
        echo'<div class="col-md-12"><button class="download"   onclick="saveAsPDF();">Download</button>'; 
        echo'</div>';
      echo'</div>';
    echo'</div>';
     }
 }       
?>     
     <script>
      var lineChart = Morris.Line({
        element : 'chart',
        data:[<?php echo $chart_data; ?>],
        parseTime:false,
        xkey:'date',
        ykeys:['sale'],
        xLabelMargin:10,
        labels:['Sale'],
        hideHover:'auto',
        smooth:true,
        redraw:true,
        resize:true,
        preUnits: 'RM ',
        stacked:true
      });
         
        
      lineChart.options.labels.forEach(function(label, i) {
        var legendItem = $('<span class="legend-item"></span>').text( label).prepend('<span class="legend-color">&nbsp;</span>');
        legendItem.find('span')
          .css('backgroundColor', lineChart.options.lineColors[i]);
        $('#chartLegend').append(legendItem)
   });
   
         function saveAsPDF() {
    html2canvas(document.getElementById('prof')).then(canvas => {
        

        var img = canvas.toDataURL("image/png", 1);

        var doc = new jsPDF('L', 'pt', [canvas.width,canvas.height]);
        doc.addImage(img, 'PNG', 10, 10, canvas.width,canvas.height);
        doc.save('Statistics.pdf');
    }).catch(function(e) {
        console.log(e.message);
    });
}
   
    </script>
</body>
</html>