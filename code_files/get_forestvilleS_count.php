<?php
  // Connect to database
  $db_host = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "db_reservation";
  
  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the sum of all integers in rows with mainplace equals to "Forestville Suites"
$sql = "SELECT SUM(slot) FROM users WHERE mainplace LIKE '%Forestville Suites%' AND status IN (0,1)";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$count = mysqli_fetch_row($result)[0];

// Return count as response
if ($count === '60') {
    echo $count;
} else {
    echo 'Error: The total must be 60.';
}

mysqli_close($conn);
?>
