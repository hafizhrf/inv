<?php
session_start();
 
// Destroy user session
unset($_SESSION['user_id']);
 
// Redirect to index.php page
header("Location: login.php");
?>