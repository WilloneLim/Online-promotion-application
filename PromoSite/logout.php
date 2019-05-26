<?php
session_start();
session_destroy();
echo 'You have been logged out. <a href="signin.php">Go back</a>';
//header('Location: signin.php');

?>
