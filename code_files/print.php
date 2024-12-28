<?php
require('fpdf.php');

// Retrieve selected options
$mainplace = $_POST['mainplace'];

// Generate query
if ($mainplace == 'All') {
  $query = "SELECT * FROM users WHERE status=1";
} else {
  $query = "SELECT * FROM users WHERE mainplace='$mainplace' AND status=1";
}

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_reservation";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute query
$result = $conn->query($query);

// Create PDF file
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

// Print data in PDF file
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(0, 10, "Holder's Full Name: ".$row['fullname'], 0, 1);
        $pdf->Cell(0, 10, "Location: ".$row['mainplace'], 0, 1);
        $pdf->Cell(0, 10, "Email: ".$row['email'], 0, 1);
        $pdf->Cell(0, 10, "Contact No.: ".$row['contact'], 0, 1);
        $companions = "Persons with: ";
if (!empty($row['colleague1'])) {
  $companions .= $row['colleague1'].", ";
}
if (!empty($row['colleague2'])) {
  $companions .= $row['colleague2'].", ";
}
if (!empty($row['colleague3'])) {
  $companions .= $row['colleague3'].", ";
}
if (!empty($row['colleague4'])) {
  $companions .= $row['colleague4'].", ";
}
// Remove the trailing comma and space
$companions = rtrim($companions, ", ");
$pdf->Cell(0, 10, $companions, 0, 1);
        $pdf->Cell(0, 10, "Check In Time: ".$row['user_date'].' '.$row['am_pm'], 0, 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, "No data found", 0, 1);
}

// Output PDF file
$pdf->Output();

// Close database connection
$conn->close();
?>

