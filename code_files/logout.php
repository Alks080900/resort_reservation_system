<?php
include ('connection.php');
session_start();

// Get session ID
$session_id = session_id();

// Clear session data
session_unset();
session_destroy();

// Clear session ID from database
if(!empty($session_id)){
   $sql = "UPDATE admins SET session_id='' WHERE session_id='$session_id'";
   mysqli_query($conn, $sql);
}

// Set cache headers
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Redirect to login page
header("Location: adminlogin.php");
exit;
?>