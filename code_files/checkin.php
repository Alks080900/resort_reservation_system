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

// Update the user's status to 0
$status = 0;
$sql = "UPDATE users SET status=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $status, $id);
$stmt->execute();
$stmt->close();


// Get the user's email address, fullname and mainplace
$sql = "SELECT * FROM users WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$email = $row["email"];
$fullname = $row["fullname"];
$mainplace = $row["mainplace"];
$slot = $row["slot"];
$colleague1 = $row["colleague1"];
$colleague2 = $row["colleague2"];
$colleague3 = $row["colleague3"];
$colleague4 = $row["colleague4"];
$stmt->close();


// Send an email to the user using PHPMailer
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Replace with your email provider's SMTP server
$mail->SMTPAuth = true;
$mail->Username = 'your_email'; // Replace with your email address
$mail->Password = 'your_password'; // Replace with your email password
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('your_email', 'CONFIRMATION'); // Replace with your name and email address
$mail->addAddress($email);
$user_date = date('Y-m-d h:i:s A');
$am_pm = date('A');

$mail->isHTML(true);
$mail->Subject = 'Reservation';
$mail->Body = "Dear $fullname,<br><br>
It is with great pleasure to inform you that your payment has been successfully processed and you are now officially checked in at <strong><u>$mainplace</u></strong>, with a reservation of <strong><u>$slot</u></strong>";

// Check if the slot equals integer 1
if ($slot != 1) {
  $mail->Body .= " (including yourself)";
}

$mail->Body .= ". We are thrilled to have you as our guest and we cannot wait to make your stay a memorable one.<br><br>";

// Check if there is at least one non-empty companion name
if (!empty($colleague1) || !empty($colleague2) || !empty($colleague3) || !empty($colleague4)) {
  $mail->Body .= "Companion(s): <br>";
  if (!empty($colleague1)) {
    $mail->Body .= "<strong>$colleague1</strong><br>";
  }
  if (!empty($colleague2)) {
    $mail->Body .= "<strong>$colleague2</strong><br>";
  }
  if (!empty($colleague3)) {
    $mail->Body .= "<strong>$colleague3</strong><br>";
  }
  if (!empty($colleague4)) {
    $mail->Body .= "<strong>$colleague4</strong><br>";
  }
}

$mail->Body .= "Confirmed Transaction Date&Time: $user_date.<br><br>
Thank you for choosing Shercon Resort. We hope you have a wonderful stay with us.<br><br>
Best regards,<br>
UCSRA Convention Team 23";


// Embed image in email body
$image_path = 'img/Reservation.png'; // Replace with your image file path
$image_cid = 'Reservation'; // Choose a unique CID for the image
$mail->addEmbeddedImage($image_path, $image_cid);
$mail->Body .= '<br><br><img src="cid:' . $image_cid . '" alt="Reservation" style="display: block; max-width: 60%; height: auto;">';

// Try to send the email and check for errors
if(!$mail->send()) {
    // Redirect to the users page with an error message
    header("Location: dashboard.php?status=error");
    exit();
} else {
    // Update the user's status to 1 and the user_date to the current Philippine Standard Time in 12-hour format
    $user_date = date('Y-m-d h:i:s A');
    $am_pm = date('A');
    $sql = "UPDATE users SET status=1, user_date=?, am_pm=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $user_date, $am_pm, $id);
    $stmt->execute();
    $stmt->close();
    
    // Redirect to the users page with a success message
    header("Location: dashboard.php?status=unarchive_success");
    exit();
}

// Close the database connection
$conn->close();

?>