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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
          <div class="col-md-6">
              <img class="img-fluid" src="images/promo5kfc.png" alt="tealiveid" id="imginfo">
          </div>
          
          <div class="col-md-6" id="promodetail">
            <p class="uppercase"><b>Buy 1 Free 1</b></p>
              
              <table style="width:100%">
              <tr>
                <th>Details</th>
              </tr>
              <tr>
                <td>1. Only one claim per user</td>
              </tr>
              <tr>
                <td>2. Drinks selected of different prices, the higher priced item shall be bought</td>
              </tr>
              <tr>
                <td>3. Promotion may be unavailable at certain branches</td>
              </tr>
              <tr>
                <td><strong><i>*Terms and conditions apply*</i></strong></td>
              </tr>
             </table>
              
             <table class="socialtb" style="width: 100%">
             <tr>
                 <br><br><th> Share on social media for reward</th>
             </tr> 
             <tr>
                 <td>
                 <a href="#" class="fa fa-facebook fb"> Share on Facebook</a>
                 <a href="#" class="fa fa-twitter tw"> Share on Twitter</a>
                 <a href="#" class="fa fa-whatsapp wh"> Share on Whatsapp</a>
                 </td>
                 
             </tr>
             </table>

          </div>
      </div>
        
      <div class="row">
          <div class="col-md-6">
            <br><button type="button" data-toggle="modal" data-target="#promoModal" class="block">Claim reward</button>
          </div>
      </div>
      
      <div class="modal fade" id="promoModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            
            <div class="modal-header">
              <h2 class="modal-title w-100">Congratulations!</h2>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
            <div class="modal-body text-center">
                <p>Here is your redemption QR code</p>
                
                <img src="images/multimediaQR.png" alt="qrcode">
                
                <p><b><i>You can find unclaimed rewards on your profile</i></b></p>
                
                <a download="QRCode" href="images/multimediaQR.png" download class="qrbtn">Download</a>
            
            </div>
         </div>
        </div>
     </div>
        
    </div>
        

</body>
</html>