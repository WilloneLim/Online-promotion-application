<?php
include 'connect.php';
session_start();

if(isset($_POST['search']))
{

	 $valueToSearch = $_POST['valueToSearch'];
	 $query = "SELECT * FROM `applypromo` WHERE CONCAT(`proapp_id`, `promoter_id`, 'proapp_title') LIKE '%".$valueToSearch."%'";
     $search_result = filterTable($query);
}else {
	 $query = "SELECT * FROM `applypromo`";
	 $search_result = filterTable($query);
}

function filterTable($query)
{
	$connect = mysqli_connect("localhost", "root", "", "promoalert");
	$filter_Result = mysqli_query($connect, $query);
	return $filter_Result;

}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
    
  <style>
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

*,
*::before,
*::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html, body {
  height: 100vh;
}

body {
/*  font: 500 1.2rem/1 'Avenir Next', sans-serif;*/
  color: #333;
  background: rgb(45,48,58);
}

.wrapper {
  display: flex;
  min-height: 100%;
}

.sidebar {
  position: absolute;
  width: 220px;
  padding: 20px;
}

.contentA {
  flex: 1;
  padding: 50px;
  background: #fff;
  box-shadow: 0 0 5px #000;
  transform: translateX(0);
  transition: transform .3s;
}

.contentA.isOpen {
  transform: translateX(220px);
}

.buttonA {
  cursor: pointer;
}

.buttonA svg {
  width: 40px;
}

.buttonA line {
  stroke: black;
  stroke-width: 5;
}

h1 {
  margin-top: 25px;
  font-size: 40px;
  font-weight: 400;
}

.navA {
  list-style: none;
}

.navA li a {
    font-size: 16px;
    position: relative;
    display: block;
    margin-bottom: 5px;
    padding: 16px 0 16px 50px;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
}

.navA li a:hover,
.navA li a.active {
  background: rgba(0,0,0,.3);
}

.navA li a::before {
  font: 14px fontawesome;
  position: absolute;
  top: 15px;
  left: 20px;
}
      
.logo{
  width: 100%;
margin: 30px 0px;
}
      
#mylink, #del_click{
    font-size:16px;
}
      
      /*my dropdown*/

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
    background: rgba(0,0,0,.3);
    margin-top: 0;
/*  padding-left: 8px;*/
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}
/*      ~~~*/

.navA li:nth-child(2) a::before { content: '\f00a'; }
.navA li:nth-child(3) a::before { content: '\f012'; }
.navA li:nth-child(4) a::before { content: '\f022'; }
.navA li:nth-child(5) a::before { content: '\f02d'; }
.navA li:nth-child(6) a::before { content: '\f085'; }
.navA li:nth-child(7) a::before { content: '\f023'; left: 23px; }
  </style>
</head>
<body>

    
<div class="wrapper">
  <div class="sidebar">
    <ul class="navA">
        <li><img src="images/navnav.png" class="logo"></li>
        <li><a class="text-light" href="test.php">Dashboard</a></li>
        <li><a class="text-light" href="charts.php">Promoters</a></li>
        <li>
            <a class="active text-light dropdown-btn">Applications<i class="fa fa-caret-down"></i></a>
<!--        <button class="dropdown-btn">Dropdown </button>-->
          <div class="dropdown-container">
            <a href="viewapplicationsadmin.php">Account</a>
            <a href="viewapplicationsadmin.php" class="active">Promotion</a>
          </div>
        </li>
        
        <li><a class="text-light">Transactions</a></li>
        <li><a class="text-light" href="test.php">Settings</a></li>
        <li><a class="text-light" onclick="myLogout()">Log Out</a></li>
    </ul>
  </div>
  <div class="contentA isOpen">
    <a class="buttonA">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
        <line x1="0" y1="20" x2="100" y2="20" />
        <line x1="0" y1="50" x2="100" y2="50" />
        <line x1="0" y1="80" x2="100" y2="80" />
      </svg>
    </a>

<hr class="w-75 mt-5 mx-auto"/>
<h1 class="text-center mb-2">New Promotions Applications</h1>
<hr class="w-75 mx-auto"/>

<form action="applicantview.php" method="POST">


<div class="input-group mb-3">
  <input type="text" class="form-control" name="valueToSearch" id="mylink" placeholder="Search for #ID, or #Title" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" name="search" id="mylink" value="Search">Search</button>
  </div>
</div>
  <!-- Table -->
  <div class="table-responsive">
       <table class="table table-striped table-hover" id="mylink">
	       <thead>
		       <tr>
			       <th>ID</th>
				   <th>Applicant Name</th>
				   <th>Applicant promotion</th>
                   <th></th>
                   <th></th>
			   </tr>
		   </thead>
		   <?php while($row = mysqli_fetch_array($search_result)):?>

           <?php
//            $sqla = "SELECT * FROM promoter WHERE promoter_id ='".$row['promoter_id']."'";
//            $resulta = $conn->query($sqla);
//            $pro_name ="";
//
//            if ($resulta->num_rows > 0) {
//                // output data of each row
//                while($rowa = $resulta->fetch_assoc()) {
//                    $pro_name = $rowa['promoter_username'];
//
//                }
//            }
            ?>

		      <tr id="<?php echo $row['proapp_id'];?>">
			     <td><?php echo $row['proapp_id'];?></td>
				 <td><?php echo $row['promoter_id'];?></td>
				 <td><?php echo $row['proapp_title'];?></td>
				 <td><a class="btn btn-success text-white w-100" id="mylink"> View </a></td>
				 <td><a href="javascript:delete_id(<?php echo $row['proapp_id'];?>)" id="mylink" class="btn btn-danger text-white w-100 remove" id="del_click">Delete</a></td>
			  </tr>

		   <?php endwhile; ?>
	   </table>
  </div>
 </form>


</div>


      
      
  </div>
<script>
    function myLogout() {
      var txt;
      if (confirm("Are you sure you want to log out?")) {
            window.location.href ="logout.php";
      }
      document.getElementById("demo").innerHTML = txt;
    }
    </script>
    <script>
    document.querySelector('.buttonA').addEventListener('click', () => {
      document.querySelector('.contentA').classList.toggle('isOpen');
    });
        
        
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
      } else {
      dropdownContent.style.display = "block";
      }
      });
    }    
    </script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>

<script type="text/javascript">
function delete_id(id)
{
     if(confirm('Sure To Remove This Record ?'))
     {
        window.location.href='delete.php?promo_id='+id;
     }
}
</script>
</body>
</html>
