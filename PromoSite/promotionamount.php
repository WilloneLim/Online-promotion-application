<?php 

$connect = mysqli_connect("localhost", "root", "", "testing");
$query = "SELECT * FROM account";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ year:'".$row["year"]."', profit:".$row["profit"].", purchase:".$row["purchase"].", sale:".$row["sale"]."}, ";
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
<body>
    <div class="header">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
        <a class="navbar-brand" href="#">
            <img src="images/navnav.png" height="30" alt="PromoAlert Logo">
        </a>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="signin.php">Log In</a>
            </li>
          </ul>
            </div>
        </nav>
    </div>
    
    <div class="container">
      <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 image">
              <img class="img-fluid" src="images/promo5kfc.png" alt="tealiveid">
              <p>20% off Chicken Nuggets and Tenders</p>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 title">
              <button class="btn1">Promotion Claims</button>
              <button class="btn2">Purchase Amount</button>
          </div>
      </div>
        
     <div class="row">
      <h1 align="center"> Profit for 2018</h1>
      <br/><br/>
         
     </div>
        
     <div class="row">
        <div id="chart" style="width:800px;"></div>
         
    </div>
   <button class="download" onclick="saveAsPDF();">Download</button> 
    </div>
    
     <script>
      Morris.Line({
        element : 'chart',
        data:[<?php echo $chart_data; ?>],
        xkey:'year',
        ykeys:['profit', 'purchase', 'sale'],
        labels:['Profit', 'Purchase', 'Sale'],
        hideHover:'auto',
        stacked:true
      });
   
         function saveAsPDF() {
    html2canvas(document.getElementById('chart')).then(canvas => {
        var w = document.getElementById("chart").offsetWidth;
        var h = document.getElementById("chart").offsetHeight;

        var img = canvas.toDataURL("image/jpeg", 1);

        var doc = new jsPDF('L', 'pt', [860, 400]);
        doc.text(10, 10, 'Profit for 2018');
        doc.addImage(img, 'JPEG', 20, 20, w, h);
        doc.save('sample-file.pdf');
    }).catch(function(e) {
        console.log(e.message);
    });
}
   
    </script>
</body>
</html>