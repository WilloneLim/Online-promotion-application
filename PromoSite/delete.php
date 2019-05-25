<?php
include 'connect.php'; 

//deleting the application promoter account
if(isset($_GET['del_id'])){
    $sql_query="DELETE FROM application WHERE app_id=".$_GET['del_id'];
    
    if (mysqli_query($conn, $sql_query)) {
        echo "<script>alert 'Record deleted successfully';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
header('Location: applicantview.php');
$conn->close();

//deleting the promoter account
if(isset($_GET['del_id'])){
	$sql = "DELETE FROM promoter WHERE promoter_id=".$_GET['del_id'];
	
	if(mysqli_query($conn, $sql)){
		echo "<script>alert 'Record deleted successfully';</script>";
	}else{
		echo "Error deleting record: ".mysqli_error($conn);
	}
}
header('Location: adminindex.php');
$conn->close();

?>
