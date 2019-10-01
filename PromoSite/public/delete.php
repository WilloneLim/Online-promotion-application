<?php
include 'connect.php'; 
session_start();

if(isset($_SESSION["admin_id"])){

//deleting the application promoter account
if(isset($_GET['pr_id'])){
    $sql_query="DELETE FROM application WHERE app_id='".$_GET['pr_id']."'";
    
        if ($conn->query($sql_query) === TRUE) {
            echo "<script> alert ('Record deleted successfully'); </script>";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    header('Location: viewapplicationsadmin.php');
}

//deleting the promoter account
if(isset($_GET['del_id'])){
	$sql = "DELETE FROM promoter WHERE promoter_id='".$_GET['del_id']."'";
	
	if ($conn->query($sql) === TRUE) {
        echo "<script> alert ('Record deleted successfully'); </script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    header('Location: charts.php');
}

if(isset($_GET['promo_id'])){
    $sql_query="DELETE FROM applypromo WHERE proapp_id='".$_GET['promo_id']."'";
    
        if ($conn->query($sql_query) === TRUE) {
            echo "<script> alert ('Record deleted successfully'); </script>";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    header('Location: viewpromoappsadmin.php');
}
}else{
    echo "An error occured";
}

$conn->close();

?>
