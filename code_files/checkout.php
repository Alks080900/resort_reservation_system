<?php
include ('connection.php');
session_start();
if(!$_SESSION['login']){
    header("location:adminlogin.php");
    die;
}
?>

<?php
// Set the timezone to the Philippines
date_default_timezone_set('Asia/Manila');

// Get the current date and time in the desired format
$user_date = date('Y-m-d h:i:s A');

// Get the AM/PM indicator from the $am_pm variable
$am_pm = date('A');

// Connect to the database (replace the placeholders with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_reservation";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID of the user to update
$id = $_GET['id'];

// Update the user's status to 0 and the user_date to the current Philippine Standard Time in 12-hour format
$sql = "UPDATE users SET status=2, user_date='$user_date', am_pm='$am_pm' WHERE id=" . $id;

if ($conn->query($sql) === TRUE) {
    // Redirect to the users page with a success message
    header("Location: dashboard.php?status=archive_success");
    exit();
} else {
    // Redirect to the users page with an error message
    header("Location: dashboard.php?status=error");
    exit();
}

// Close the database connection
$conn->close();
?>