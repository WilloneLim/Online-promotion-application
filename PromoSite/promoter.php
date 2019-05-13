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
              <img class="img-fluid" src="images/promo1.png" alt="tealiveid">
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 title">
              <p><b>Kentucky Fried Chicken</b></p>
              <p>Last Online:</p>
              <p>No. of promotions:</p>
              <p>Average claims:</p>
          </div>
      </div>
        
      <div class="row">
          <form class="form-inline search">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search">
          </form>
      </div>
    
    <div class="row">
          
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Promotion ID</th>
            <th>Image</th>
            <th>Promotion Title</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>123456</td>
            <td><img src="images/promo1.png" alt="KFC" height="110px"></td>
            <td>20% off Chicken Nuggets and Tenders <br>
                <span class="input-group-btn"><a href="promotionamount.php" class="stat">View statistic</a></span>
                <span class="input-group-btn"><a href="promotionclaim.php" class="qrcd">Scan QR code</a></span>
            </td>
        </tr>
        <tr>
            <td>123456</td>
            <td><img src="images/promo1.png" alt="KFC" height="110px;"></td>
            <td>20% off Chicken Nuggets and Tenders <br>
                <span class="input-group-btn"><a href="promotionamount.php" class="stat">View statistic</a></span>
                <span class="input-group-btn"><a href="promotionclaim.php" class="qrcd">Scan QR code</a></span>
            </td>
        </tr>
        </tbody>
    </table>
    
     </div>  
    </div>
        

</body>
</html>