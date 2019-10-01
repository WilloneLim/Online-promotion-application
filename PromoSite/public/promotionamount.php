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
        <a class="navbar-brand" href="promoter.php?id=<?php echo $_SESSION["pro_id"]; ?>">
            <img src="images/navnav.png" height="30" alt="PromoAlert Logo">
        </a>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" onclick="myLogout()">Log Out</a>
            </li>
          </ul>
            </div>
        </nav>
    </div>
<div class="container px-5" id="promoimg">    
<?php
    
    if(isset($_GET['id'])) {
        $sql = "SELECT * FROM promotion WHERE promoter_id =".$_GET['id'];
        
        $result = $conn->query($sql) or die($conn->error);
        while($row = $result->fetch_assoc()){
            
            
            $sqla = "SELECT * FROM claims WHERE promo_id =".$row['promo_id'];
            $resulta = $conn->query($sqla);
 
//    echo'<div class="container px-5" id="promoimg">';
//      echo'<div class="row">';
//          echo'<div class="col-md-6 image">';
//              echo'<img src="images/'.$row['promo_img'].'" alt="tealiveid" id="imginfo">';
//          echo'</div>';
          
//          echo'<div class="col-md-6 title" style="text-align:justify;">';
//          echo '<h1>'.$row['promo_title'].'</h1>'; 
//          echo '<br/>';
//          echo'<p>Receive up to 20% off for the selected promotion. Price shown reflects discount. Offer ends 8/15/2019 at 11:59 PM GMT. Offer valid for a limited time only.This offer does not apply to gift cards, applicable taxes, or shipping and handling. Offer cannot be combined with any other offers or used on previous purchases.</p>';
//          echo'</div>'; 
          
//      echo'</div>';
     echo '<hr class="w-80 mt-5" />';
     echo'<div class="col-md-12">';
      echo'<h2 align="center" class="graphtitle"> Promotion Statistics</h2>';
     echo '<hr class="w-80 mb-5" />';
     echo'</div>';
        
     echo'<br/>';
        
      echo'<div class="row">';
        echo'<div id="prof" class="col-md-12">';
            echo'<div id="chartLegend" class="line-chart-legend"></div>';
            echo'<div id="chart"></div>';  
        echo'</div>';
        echo'<br/>';
          
        echo'<div class="col-md-12"><button class="download w-50 d-block bg-warning text-dark font-weight-bold my-5 mx-auto" onclick="saveAsPDF();">Download</button>'; 
        echo'</div>';
      echo'</div>';
//    echo'</div>';
     }
 }
?>     
    <div class="col-md-10 mx-auto mb-5 pb-5">
    <h4 class="text-center mt-5">Recent Transactions</h4> 
        <hr/>
    <div class="table-responsive">
               <table class="table table-striped table-hover border">
                   <thead>
                       <tr>
                           <th>Transaction date</th>
                           <th>Promotion</th>
                           <th>Customer</th>
                       </tr>
                   </thead>
                   <?php
                   if ($resulta->num_rows > 0) {
                        // output data of each row
                        while($rowa = $resulta->fetch_assoc()) {
                            
                            $queryb = "SELECT * FROM promotion WHERE promo_id ='".$rowa['promo_id']."'";
                            $resultb = mysqli_query($conn,$queryb);
                            $rowb  = mysqli_fetch_array($resultb);
                            
                            $queryc = "SELECT * FROM customer WHERE cust_id ='".$rowa['cust_id']."'";
                            $resultc = mysqli_query($conn,$queryc);
                            $rowc  = mysqli_fetch_array($resultc);
                   ?>

                      <tr>
                         <td><?php echo $rowa['tran_date'];?></td>
                          <td><?php echo $rowb['promo_title'];?></td>
                         <td><?php echo $rowc['cust_username'];?></td>
                      </tr>
                   <?php
                        }
                   }
                   ?>
               </table>
          </div>
        </div>
        </div>
    
<footer class="page-footer bg-secondary font-small mt-5 pt-4">
  <div class="container-fluid text-center text-md-left">
    <div class="row mx-auto">
      
        <hr class="clearfix w-100 d-md-none pb-3">
        <div class="col-md-1"></div> 
      <div class="col-md-5 mb-md-0 mb-3">
        <h5 class="text-uppercase text-white font-weight-bold">Contact Us</h5>
          <hr class="bg-light w-50 ml-0"/>
        <p class="text-white">
            <b>Jimsley Lim</b><br/>
            +6016-889 7598
            <br/>
            <br/>
            <b>Nicholas Bong</b><br/>
            +6016-816 2962</p>
          <br/>
          <br/>

      </div>
        <div class="col-md-5 mt-md-0 mt-3">
        <h5 class="text-uppercase text-white font-weight-bold">Introducing Xense,</h5>
            <hr class="bg-light w-50 ml-0"/>
        <p class="text-white"><b>A fusion of technology and human senses.</b><br/>From programmers to business developer, Xense comprises of talented and excellence-driven individuals with high enthusiasm in the development of technology solution. 
        We aim high at embracing technology with a passion for sustainability, innovation and empowerment by using our creative gifts that drives this foundation.</p>
          <br/>
          <br/>

      </div>
    </div>
  </div>

  <!-- Copyright -->
  <div class="footer-copyright text-white bg-dark text-center py-3">© 2019 Copyright:
    <a href="#"> Xense.com</a>
  </div>
  <!-- Copyright -->

</footer>    
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
       <script>
    function myLogout() {
      var txt;
      if (confirm("Are you sure you want to log out?")) {
            window.location.href ="logout.php";
      }
      document.getElementById("demo").innerHTML = txt;
    }
    </script> 
</body>
</html>