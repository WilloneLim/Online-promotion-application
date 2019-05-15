<?php
include 'connect.php'; 

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



?>