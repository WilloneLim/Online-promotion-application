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
    <link rel="stylesheet" href="css/main.css">
</head>


<body>
    <div class="header">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="images/navnav.png" height="30" alt="PromoAlert Logo">
        </a>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="signin.html">Log In</a>
            </li>
          </ul>
            </div>
        </nav>
    </div>
    
<div class="container">
   <!--example purposes only-->
  <h1>Create A Promotion for TeaLive </h1>
  </br>
  </br>
  
  <div class="row">
  <div class="col-md-6">
   <form method="POST" enctype="multipart/form-data">
   <input type="hidden" value="1000000" name="MAX_FILE_SIZE" />
  <input type="file" name="uploadedfile" />
  <input type="submit" name="value" value="Upload" style="margin-top:10px; height:35px; width:75px;">
  
</form> 
<?php
if(isset($_POST['submit'])){

$target_path = "images/";
$target_path = $target_path.basename($_FILES['uploadedfile']['name']);
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)){
$conn=new mysqli("localhost", "root", "", "promoalert");
$sql="INSERT  INTO promotion('promo_img') values ('target_path')";
if($conn->query($sql)==TRUE) {
	echo "<br><br>";
}
else
{
	echo "Error:".$sql.$conn->error;
}

}

}



?>
 </div>
  
  <!-- Adding Promotion -->
  <div class="col-md-6">
      <form>
	   
		   <input type="textbox" style="width:500px;height:45px" name="PromotionTitle" placeholder="Promotion Title">
		
		   <input type="textbox" style="width:500px;height:100px" name="Description" placeholder="Description">
		   
		   <button style="width:500px">Save Promotion</button>
	  
	  </form>
      
  </div>
  
 

</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script>
      var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
        getSortData: {
          name: function (element) {
            return $(element).text();
          }
        }
      });
      $('.filter button').on("click", function () {
        var value = $(this).attr('data-name');
          $grid.isotope({
            filter: value
          });
        $('.filter button').removeClass('active');
        $(this).addClass('active');
      })
      $('.sort button').on("click", function () {
        var value = $(this).attr('data-name');
        $grid.isotope({
          sortBy: value
        });
        $('.sort button').removeClass('active');
        $(this).addClass('active');
      })
    </script>
</body>
</html>