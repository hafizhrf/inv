<?php
session_start();
 
// Destroy user session
unset($_SESSION['user_id']);
unset($_SESSION['level']);
unset($_SESSION['daftar']);

// Redirect to index.php page
header("Location: ../index.php");
?>