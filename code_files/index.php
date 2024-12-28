<?php
include ('connection.php');

$current_time = new DateTime('now', new DateTimeZone('Asia/Manila'));
$start_time = new DateTime('8:00', new DateTimeZone('Asia/Manila'));
$end_time = new DateTime('17:00', new DateTimeZone('Asia/Manila'));
if ($current_time < $start_time || $current_time > $end_time) {
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Shercon</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <!-- Bootstrap CSS -->
    <link rel="icon" href="/img/logog.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="/css/vicinity.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.4/pdfobject.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  </head>
  <body>
      <nav class="navbar navbar-light" data-aos="fade-right">
<div class="nav mb-4"style="max-width: 400px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="/img/logog.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8 mt-3">
      <div class="card-body">
        <h6 class="card-text">UNIVERSITY, COLLEGE, AND SCHOOL REGISTRARS ASSOCIATION (UCSRA) INC.
      </div>
    </div>
  </div>
</div>
</nav>
  <div style="background-color: #f8d7da; color: #721c24; padding: 1rem;" data-aos="fade-up" class="mt-5">
    <p style="margin: 0; text-align:center; font-weight:bold; font-size: 25px">Sorry, the reservation system is currently closed. Please come back during our operating hours from 8:00 AM to 5:00 PM (Philippine Standard Time).</p>
  </div>
   <!-- Bootstrap JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  // update the name of the dropdown when an item is selected
  $(".dropdown-menu a").click(function(){
    $("#selectedPlace").text($(this).text());
  });
  AOS.init();

// You can also pass an optional settings object
// below listed default settings
AOS.init({
  // Global settings:
  disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init', // class applied after initialization
  animatedClassName: 'aos-animate', // class applied on animation
  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
  

  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 120, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 1000, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: false, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});
</script>
<script>
// disable right click
    document.addEventListener('contextmenu', event => event.preventDefault());
 
    document.onkeydown = function (e) {
 
        // disable F12 key
        if(e.keyCode == 123) {
            return false;
        }
 
        // disable I key
        if(e.ctrlKey && e.shiftKey && e.keyCode == 73){
            return false;
        }
 
        // disable J key
        if(e.ctrlKey && e.shiftKey && e.keyCode == 74) {
            return false;
        }
 
        // disable U key
        if(e.ctrlKey && e.keyCode == 85) {
            return false;
        }
    }
  </script>
    </body>
</html>
  <?php
  exit();
}
?>

<!-- IF RESERVATION IS OPEN, REDIRECT THIS PAGE -->

<!DOCTYPE html>
<html>
  <head>
    <title>Shercon</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <!-- Bootstrap CSS -->
    <link rel="icon" href="/img/logog.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="/css/vicinity1.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.4/pdfobject.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  </head>
  <body class="scrollbar scrollbar-juicy-peach">
      
     <?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Set reCAPTCHA API keys
$site_key = 'your_key';
$secret_key = 'your_key';
    
    // Verify reCAPTCHA response
    $captcha_response = $_POST['g-recaptcha-response'];
    $captcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $captcha_data = array(
        'secret' => $secret_key,
        'response' => $captcha_response,
        'remoteip' => $_SERVER['REMOTE_ADDR']
    );
    $captcha_options = array(
        'http' => array (
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query($captcha_data)
        )
    );
    $captcha_context = stream_context_create($captcha_options);
    $captcha_result = file_get_contents($captcha_url, false, $captcha_context);
    $captcha_json = json_decode($captcha_result);
    if ($captcha_json->success !== true) {
        echo '<script type="text/javascript">';
        echo 'swal("ERROR","Please complete the reCAPTCHA verification!","error");';
        echo '</script>';
        exit();
    }

    // Get the form data
    $cluster = mysqli_real_escape_string($conn, $_POST["cluster"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $slot = mysqli_real_escape_string($conn, $_POST["slot"]);
    $fullname = mysqli_real_escape_string($conn, $_POST["fullname"]);
    $colleague1 = !empty($_POST["colleague1"]) ? mysqli_real_escape_string($conn, $_POST["colleague1"]) : null;
    $colleague2 = !empty($_POST["colleague2"]) ? mysqli_real_escape_string($conn, $_POST["colleague2"]) : null;
    $colleague3 = !empty($_POST["colleague3"]) ? mysqli_real_escape_string($conn, $_POST["colleague3"]) : null;
    $colleague4 = !empty($_POST["colleague4"]) ? mysqli_real_escape_string($conn, $_POST["colleague4"]) : null;
    $contact = mysqli_real_escape_string($conn, $_POST["contact"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $mainplace = mysqli_real_escape_string($conn, $_POST["mainplace"]);
    $file = $_FILES["file"]["name"];
    
    // Check if the file is a JPG or PDF
    $filetype = strtolower(pathinfo($file,PATHINFO_EXTENSION));
    if($filetype != "jpg" && $filetype != "pdf") {
        die("Only JPG and PDF files are allowed.");
    }

// Create the user_date and am_pm variables
date_default_timezone_set('Asia/Manila');
$user_date = date('Y-m-d h:i:s A');
$am_pm = date('A');

// Check if email already exists in the database
$stmt = $conn->prepare("SELECT COUNT(*) as count FROM users WHERE email=? AND status IN (0, 1)");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$emailCount = $result->fetch_assoc()['count'];

// Check if contact already exists in the database
$stmt = $conn->prepare("SELECT COUNT(*) as count FROM users WHERE contact=? AND status IN (0, 1)");
$stmt->bind_param("s", $contact);
$stmt->execute();
$result = $stmt->get_result();
$contactCount = $result->fetch_assoc()['count'];

// Check if mainplace already exists in the database
$stmt = $conn->prepare("SELECT COUNT(*) as count FROM users WHERE mainplace=? AND status IN (0, 1)");
$stmt->bind_param("s", $mainplace);
$stmt->execute();
$result = $stmt->get_result();
$mainplaceCount = $result->fetch_assoc()['count'];

// Check if mainplace already exists in the database
$stmt = $conn->prepare("SELECT COUNT(*) as count, SUM(slot) as totalSlot FROM users WHERE mainplace=? AND status IN (0, 1)");
$stmt->bind_param("s", $mainplace);
$stmt->execute();
$result = $stmt->get_result();
$mainplaceCount = $result->fetch_assoc()['count'];
$totalSlot = $result->fetch_assoc()['totalSlot'] ?? 0;

// Check if mainplace already exists in the database
$stmt = $conn->prepare("SELECT COUNT(*) as count FROM users WHERE mainplace=? AND status IN (0, 1)");
$stmt->bind_param("s", $mainplace);
$stmt->execute();
$result = $stmt->get_result();
$mainplaceCount = $result->fetch_assoc()['count'];

// Check if the mainplace is occupied (has 5 users already)
$stmt = $conn->prepare("SELECT COUNT(*) as count, SUM(slot) as total_slot FROM users WHERE mainplace=? AND status IN (0, 1)");
$stmt->bind_param("s", $mainplace);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$occupiedCount = $row['count'];
$total_slot = $row['total_slot'];

$errors = array();

if ($emailCount > 0) {
    $errors[] = "Email";
}

if ($contactCount > 0) {
    $errors[] = "Contact";
}

if ($mainplaceCount > 0 && $occupiedCount >= 5) {
    $errors[] = "Room";
}

if ($total_slot + $slot > 5) {
    $errors[] = "Slot";
}

if (count($errors) > 0) {
    // Error message
    $errorMsg = implode(" and ", $errors) . " is already taken";
    if (in_array("Room", $errors)) {
        $errorMsg .= " and has been occupied.";
    } else {
        $errorMsg .= ".";
    }
    
    if (in_array("Slot", $errors)) {
        $errorMsg .= " The available slots is " . (5 - $total_slot);
    }
    
    $url = $_SERVER['HTTP_REFERER'];
    echo '<script type="text/javascript">';
    echo 'swal({';
    echo 'title: "ERROR",';
    echo 'text: "' . $errorMsg . ' Try again.",';
    echo 'type: "error",';
    echo 'showCancelButton: false,';
    echo 'closeOnConfirm: false,';
    echo 'closeOnCancel: false';
    echo '}, function(isConfirm) {';
    echo 'if (isConfirm) {';
    echo 'window.history.back();';
    echo '} else {';
    echo 'window.history.back();';
    echo '}';
    echo '});';
    echo '</script>';
    exit;
}

    // Prepare and bind the SQL statement for inserting data into the database
$status = 0;
$stmt = $conn->prepare("INSERT INTO users (cluster, email, slot, fullname, colleague1, colleague2, colleague3, colleague4, contact, gender, mainplace, file, user_date, am_pm, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssssssi", $cluster, $email, $slot, $fullname, $colleague1, $colleague2, $colleague3, $colleague4, $contact, $mainplace, $gender, $file, $user_date, $am_pm, $status);

   // Generate a unique file name
$file_name = time() . '_' . basename($_FILES["file"]["name"]);

// Move the uploaded file to a folder on the server with the unique file name
$target_dir = "uploads/";
$target_file = $target_dir . $file_name;
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    // Set the file variable to the unique file name
    $file = $file_name;
    // Insert the data into the database with the unique file name
    $stmt->bind_param("ssssssssssssssi", $cluster, $email, $slot, $fullname, $colleague1, $colleague2, $colleague3, $colleague4, $contact, $gender, $mainplace, $file, $user_date, $am_pm, $status);
    $stmt->execute();
    // Redirect the user to a success page with a query parameter
    $url = "index.php";
    echo '<script type="text/javascript">';
    echo 'swal({';
    echo 'title: "SUCCESS",';
    echo 'text: "Wait for the confirmation email of check in!",';
    echo 'type: "success",';
    echo 'showCancelButton: false,';
    echo 'closeOnConfirm: false,';
    echo 'closeOnCancel: false';
    echo '}, function(isConfirm) {';
    echo 'if (isConfirm) {';
    echo "window.location.replace('$url');";
    echo '} else {';
    echo "window.location.replace('$url');";
    echo '}';
    echo '});';
    echo '</script>';
    exit;
} 

else {
    // Show an error message
    $url = "index.php";
    echo '<script type="text/javascript">';
    echo 'swal({';
    echo 'title: "ERROR",';
    echo 'text: "Something went wrong!",';
    echo 'type: "error",';
    echo 'showCancelButton: false,';
    echo 'closeOnConfirm: false,';
    echo 'closeOnCancel: false';
    echo '}, function(isConfirm) {';
    echo 'if (isConfirm) {';
    echo "window.location.replace('$url');";
    echo '} else {';
    echo "window.location.replace('$url');";
    echo '}';
    echo '});';
    echo '</script>';
    exit;
}

    // Close the database connection
    $stmt->close();
    $conn->close();

}
?>
<?php
// Establish database connection
$host = 'localhost'; // your database server host
$dbname = 'db_reservation'; // your database name
$username = 'root'; // your database username
$password = ''; // your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit;
}

// Check if the value already exists in the database and hide the option
$sql = "SELECT mainplace FROM users WHERE status IN (0, 1)";
$stmt = $pdo->query($sql);
$mainplaces = $stmt->fetchAll(PDO::FETCH_COLUMN);

echo "<script>document.addEventListener('DOMContentLoaded', function() {";
echo "setInterval(function() {";
echo "var select = document.querySelector('.place');";
echo "if (select) {";

foreach ($mainplaces as $mainplace) {
    $count = getCount($pdo, $mainplace);
    $remaining = 5 - $count;
    $occupied = $count == 5;
    
    echo "var option = select.querySelector('option[value=\"$mainplace\"]');";
    echo "if (option) {";
    if ($occupied) {
        echo "option.disabled = true;";
        echo "option.style.color = 'red';";
        echo "option.style.fontWeight = 'bold';";
        echo "option.text = '$mainplace (Occupied)';";
    } else {
        echo "option.disabled = false;";
        echo "option.style.color = 'green';";
        echo "option.style.fontWeight = 'bold';";
        echo "option.text = '$mainplace ($remaining Slots Remaining)';";
    }
    echo "}";
}
echo "}";
echo "}, 1000);";
echo "});</script>";

function getCount($pdo, $mainplace) {
    $sql = "SELECT SUM(slot) FROM users WHERE mainplace = ? AND status IN (0,1)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$mainplace]);
    $count = $stmt->fetchColumn();
    return $count ? $count : 0;
}
?>
<nav class="navbar navbar-light" data-aos="fade-right">
<div class="nav mb-4"style="max-width: 400px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/logog.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8 mt-3">
      <div class="card-body">
        <h6 class="card-text">UNIVERSITY, COLLEGE, AND SCHOOL REGISTRARS ASSOCIATION (UCSRA) INC.
      </div>
    </div>
  </div>
</div>
</nav>
<section id="room" class="forest">
<form method="post" id="form" enctype="multipart/form-data">
  <div class="container shadow p-3 bg-body rounded-3 c3" data-aos="fade-up">
    <h2 class="text-center mb-5" id="headerText">UPLOADING OF RECEIPT & ROOM RESERVATION</h2>
    <div class="row">
    <pre style="color: red; font-weight: 700; font-size: 16px;">NOTE: Convention Fee: <u>PHP8,500 - Until April 10, 2023</u>
      Convention Fee: <u>PHP9,500 - After April 10, 2023</u></pre>
      <div class="form-group col-lg-6 c1">
        <label for="file">Upload Receipt (JPG or PDF only)</label>
        <input type="file" class="form-control-file" id="file" name="file" accept=".jpg,.pdf" required>
      </div>
        <div class="form-group col-lg-6 c1" id="preview" style="max-width: 100%; max-height: 500px;">
      </div>
      <div class="form-group col-lg-4 c1">
        <label for="email">Cluster</label>
            <select id="" class="form-control form-select" name="cluster" required>
            <option value="" selected>Select Place</option>
            <option value="CAVITE">CAVITE</option>
            <option value="LAGUNA">LAGUNA</option>
            <option value="BATANGAS">BATANGAS</option>
            <option value="RIZAL">RIZAL</option>
            <option value="QUEZON">QUEZON</option>
            <option value="OTHERS">OTHERS</option>
          </select>
        </div>
      <div class="form-group col-lg-4 c1">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" required>
        </div>
      <div class="form-group col-lg-4 c1">
        <label for="Gender">Gender</label>
            <select id="gender" class="form-control form-select" name="gender" required>
            <option value="" selected>Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
      <div class="dropdown col-lg-4 c1">
        <label for="Suites">Type of Room</label>
  <select id="roomDropdown" class="form-control form-select place" name="mainplace" disabled required>
  <option value="" selected>Choose</option>
  <option value="Forestville Suites, 1st Floor, Room 101" style="color:green; font-weight: bold;" id="female">Forestville Suites, 1st Floor, Room 101 (5 Slots Remaining)</option>
    <option value="Forestville Suites, 1st Floor, Room 102" style="color:green; font-weight: bold;" id="female">Forestville Suites, 1st Floor, Room 102 (5 Slots Remaining)</option>
    <option value="Forestville Suites, 1st Floor, Room 103" style="color:green; font-weight: bold;" id="female">Forestville Suites, 1st Floor, Room 103 (5 Slots Remaining)</option>
    <option value="Forestville Suites, 1st Floor, Room 104" style="color:green; font-weight: bold;" id="female">Forestville Suites, 1st Floor, Room 104 (5 Slots Remaining)</option>
    <option value="Forestville Suites, 1st Floor, Room 105" style="color:green; font-weight: bold;" id="female">Forestville Suites, 1st Floor, Room 105 (5 Slots Remaining)</option>
    <option value="Forestville Suites, 2nd Floor, Room 206" style="color:green; font-weight: bold;" id="female">Forestville Suites, 2nd Floor, Room 206 (5 Slots Remaining)</option>
    <option value="Forestville Suites, 2nd Floor, Room 207" style="color:green; font-weight: bold;" id="female">Forestville Suites, 2nd Floor, Room 207 (5 Slots Remaining)</option>
    <option value="Forestville Suites, 2nd Floor, Room 208" style="color:green; font-weight: bold;" id="female">Forestville Suites, 2nd Floor, Room 208 (5 Slots Remaining)</option>
    <option value="Forestville Suites, 2nd Floor, Room 209" style="color:green; font-weight: bold;" id="female">Forestville Suites, 2nd Floor, Room 209 (5 Slots Remaining)</option>
    <option value="Forestville Suites, 2nd Floor, Room 210" style="color:green; font-weight: bold;" id="female">Forestville Suites, 2nd Floor, Room 210 (5 Slots Remaining)</option>
    <option value="Forestville Suites, 2nd Floor, Room 211" style="color:green; font-weight: bold;" id="female">Forestville Suites, 2nd Floor, Room 211 (5 Slots Remaining)</option>
    <option value="Forestville Suites, 2nd Floor, Room 212" style="color:green; font-weight: bold;" id="female">Forestville Suites, 2nd Floor, Room 212 (5 Slots Remaining)</option>
    <option value="Forestville Cabin (Left), Room 1" style="color:green; font-weight: bold;" id="male">Forestville Cabin (Left), Room 1 (5 Slots Remaining)</option>
    <option value="Forestville Cabin (Left), Room 2" style="color:green; font-weight: bold;" id="male">Forestville Cabin (Left), Room 2 (5 Slots Remaining)</option>
    <option value="Forestville Cabin (Left), Room 3" style="color:green; font-weight: bold;" id="male">Forestville Cabin (Left), Room 3 (5 Slots Remaining)</option>
    <option value="Forestville Cabin (Left), Room 4" style="color:green; font-weight: bold;" id="male">Forestville Cabin (Left), Room 4 (5 Slots Remaining)</option>
    <option value="Forestville Cabin (Left), Room 5" style="color:green; font-weight: bold;" id="male">Forestville Cabin (Left), Room 5 (5 Slots Remaining)</option>
    <option value="Forestville Cabin (Right), Room 6" style="color:green; font-weight: bold;" id="male">Forestville Cabin (Right), Room 6 (5 Slots Remaining)</option>
    <option value="Forestville Cabin (Right), Room 7" style="color:green; font-weight: bold;" id="male">Forestville Cabin (Right), Room 7 (5 Slots Remaining)</option>
    <option value="Forestville Cabin (Right), Room 8" style="color:green; font-weight: bold;" id="male">Forestville Cabin (Right), Room 8 (5 Slots Remaining)</option>
    <option value="Forestville Cabin (Right), Room 9" style="color:green; font-weight: bold;" id="male">Forestville Cabin (Right), Room 9 (5 Slots Remaining)</option>
    <option value="Forestville Cabin (Right), Room 10" style="color:green; font-weight: bold;" id="male">Forestville Cabin (Right), Room 10 (5 Slots Remaining)</option>
    <option value="Blue House, 1st Floor, Room 101" style="color:green; font-weight: bold;" id="male">Blue House, 1st Floor, Room 101 (5 Slots Remaining)</option>
    <option value="Blue House, 1st Floor, Room 102" style="color:green; font-weight: bold;" id="male">Blue House, 1st Floor, Room 102 (5 Slots Remaining)</option>
    <option value="Blue House, 2nd Floor, Room 201" style="color:green; font-weight: bold;" id="male">Blue House, 2nd Floor, Room 201 (5 Slots Remaining)</option>
    <option value="Blue House, 2nd Floor, Room 202" style="color:green; font-weight: bold;" id="male">Blue House, 2nd Floor, Room 202 (5 Slots Remaining)</option>
    <option value="Club Manuel Cabin, Cabin 1" style="color:green; font-weight: bold;" id="female">Club Manuel Cabin, Cabin 1 (5 Slots Remaining)</option>
    <option value="Club Manuel Cabin, Cabin 2" style="color:green; font-weight: bold;" id="female">Club Manuel Cabin, Cabin 2 (5 Slots Remaining)</option>
    <option value="Club Manuel Cabin, Cabin 3" style="color:green; font-weight: bold;" id="female">Club Manuel Cabin, Cabin 3 (5 Slots Remaining)</option>
    <option value="Club Manuel Cabin, Cabin 4" style="color:green; font-weight: bold;" id="female">Club Manuel Cabin, Cabin 4 (5 Slots Remaining)</option>
    <option value="Club Manuel Cabin, Cabin 5" style="color:green; font-weight: bold;" id="female">Club Manuel Cabin, Cabin 5 (5 Slots Remaining)</option>
    <option value="Club Manuel Cabin, Cabin 6" style="color:green; font-weight: bold;" id="female">Club Manuel Cabin, Cabin 6 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites (MALE), 1st Floor, Room 101" style="color:green; font-weight: bold;" id="male">Club Manuel Suites, 1st Floor, Room 101 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites (FEMALE), 1st Floor, Room 102" style="color:green; font-weight: bold;" id="female">Club Manuel Suites, 1st Floor, Room 102 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 1st Floor, Room 103" style="color:green; font-weight: bold;" id="male">Club Manuel Suites, 1st Floor, Room 103 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 1st Floor, Room 104" style="color:green; font-weight: bold;" id="female">Club Manuel Suites, 1st Floor, Room 104 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 1st Floor, Room 105" style="color:green; font-weight: bold;" id="male">Club Manuel Suites, 1st Floor, Room 105 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 1st Floor, Room 106" style="color:green; font-weight: bold;" id="female">Club Manuel Suites, 1st Floor, Room 106 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 1st Floor, Room 107" style="color:green; font-weight: bold;" id="male">Club Manuel Suites, 1st Floor, Room 107 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 2nd Floor, Room 201" style="color:green; font-weight: bold;" id="female">Club Manuel Suites, 2nd Floor, Room 201 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 2nd Floor, Room 202" style="color:green; font-weight: bold;" id="male">Club Manuel Suites, 2nd Floor, Room 202 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 2nd Floor, Room 203" style="color:green; font-weight: bold;" id="female">Club Manuel Suites, 2nd Floor, Room 203 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 2nd Floor, Room 204" style="color:green; font-weight: bold;" id="male">Club Manuel Suites, 2nd Floor, Room 204 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 2nd Floor, Room 205" style="color:green; font-weight: bold;" id="female">Club Manuel Suites, 2nd Floor, Room 205 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 2nd Floor, Room 206" style="color:green; font-weight: bold;" id="male">Club Manuel Suites, 2nd Floor, Room 206 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 2nd Floor, Room 207" style="color:green; font-weight: bold;" id="female">Club Manuel Suites, 2nd Floor, Room 207 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 3rd Floor, Room 301" style="color:green; font-weight: bold;" id="male">Club Manuel Suites, 3rd Floor, Room 301 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 3rd Floor, Room 302" style="color:green; font-weight: bold;" id="female">Club Manuel Suites, 3rd Floor, Room 302 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 3rd Floor, Room 303" style="color:green; font-weight: bold;" id="male">Club Manuel Suites, 3rd Floor, Room 303 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 3rd Floor, Room 304" style="color:green; font-weight: bold;" id="female">Club Manuel Suites, 3rd Floor, Room 304 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 3rd Floor, Room 305" style="color:green; font-weight: bold;" id="male">Club Manuel Suites, 3rd Floor, Room 305 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 3rd Floor, Room 306" style="color:green; font-weight: bold;" id="female">Club Manuel Suites, 3rd Floor, Room 306 (5 Slots Remaining)</option>
    <option value="Club Manuel Suites, 3rd Floor, Room 307" style="color:green; font-weight: bold;" id="male">Club Manuel Suites, 3rd Floor, Room 307 (5 Slots Remaining)</option>
  </select>
</div>

<div class="form-group col-lg-4 c1">
        <label for="email">Number of Reservation</label>
            <select id="nop" class="form-control form-select" name="slot" required>
            <option value="" selected>Choose</option>
            <option value="1">Only you</option>
            <option value="2">2 (including yourself)</option>
            <option value="3">3 (including yourself)</option>
            <option value="4">4 (including yourself)</option>
            <option value="5">5 (including yourself)</option>
          </select>
        </div>
        <div class="form-group col-lg-4 c1">
          <label for="fullname">Holder's Full Name</label>
          <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" disabled required>
        </div>
        <div class="form-group col-lg-4 c1">
          <label for="fullname">Companion 2</label>
          <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" id="colleague1" name="colleague1" placeholder="Full Name" disabled=true required>
        </div>
        <div class="form-group col-lg-4 c1">
          <label for="fullname">Companion 3</label>
          <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" id="colleague2" name="colleague2" placeholder="Full Name" disabled=true required>
        </div>
        <div class="form-group col-lg-4 c1">
          <label for="fullname">Companion 4</label>
          <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control"  id="colleague3" name="colleague3" placeholder="Full Name" disabled=true required>
        </div>
        <div class="form-group col-lg-4 c1">
          <label for="fullname">Companion 5</label>
          <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" id="colleague4" name="colleague4" placeholder="Full Name" disabled=true required>
        </div>
        <div class="form-group col-lg-4 c1">
          <label for="contact">Contact Number</label>
          <input type="text" class="form-control" id="contact" placeholder="Contact Number" name="contact" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength = "11" required>
          </div>
        <div class="mt-4 col-lg-4 c1 text-center">
  <a class="btn btn-primary" type="button" onclick="clicky()">View Rooms</a>
      </div>
      <br>
      <div class="g-recaptcha" data-sitekey="6LeEQyclAAAAAEkld0mct-MtKdeC453Rj6pGAXu1" data-callback="callback"></div>
      <br>
      <button type="submit" class="btn btn-primary mt-3" id="oops" disabled>PROCEED</button>
    </div>
  </div>
</form>
</section>

    <section id="vic">
    <div class="container" id="cont" data-aos="fade-up">
    <div class="row g-4">
  
    <div class="col-12 col-md-6 col-lg-4" id="">
    <div class="card h-100" data-toggle="modal" data-target="#forestsuites">
      <img src="img/forestville suites.png"  class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title text-center">Forestville Suites</h5>
        <button type="button" class="btn btn-primary mt-5">
        Click Me!
      </button>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-4">
    <div class="card h-100" data-toggle="modal" data-target="#forestcabins">
      <img src="img/forestville cabins.png" class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title text-center">Forestville Cabins</h5>
        <button type="button" class="btn btn-primary mt-5" >
        Click Me!
      </button>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-4">
    <div class="card h-100" data-toggle="modal" data-target="#bluehouse">
      <img src="img/bluehouse.jpg"  class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title text-center">Blue House</h5>
        <button type="button" class="btn btn-primary mt-5" >
        Click Me!
      </button>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-4">
    <div class="card h-100" data-toggle="modal" data-target="#clubmanuel">
      <img src="img/club manuel.png"  class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title text-center">Club Manuel Cabins</h5>
        <button type="button" class="btn btn-primary mt-5" >
        Click Me!
      </button>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-4">
    <div class="card h-100" data-toggle="modal" data-target="#clubmanuelsuites">
      <img src="img/club manuel suites.jpg"  class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title text-center">Club Manuel Suites</h5>
        <button type="button" class="btn btn-primary mt-5" >
        Click Me!
      </button>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6 col-lg-4">
    <div class="card h-100 meow">
      <div class="card-body text-center">
        <a type="button" id="goback" class="btn btn-primary" onclick="showFileUpload()">
        Go Back
    </a>
      </div>
    </div>
    </div>
    <div class="modal fade " id="forestsuites" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Vicinity Map</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
          <img src="img/forestvillesui.png" class="w-100"alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade " id="forestcabins" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Vicinity Map</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
          <img src="img/forestvillevic.png" class="w-100"alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade " id="clubmanuel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Vicinity Map</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
          <img src="img/clubmanuelcabins.png" class="w-100"alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade " id="clubmanuelsuites" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Vicinity Map</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
          <img src="img/clubmanuelsuit.png" class="w-100"alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade " id="bluehouse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Vicinity Map</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
          <img src="img/bluehouse.png" class="w-100"alt="">
          </div>
        </div>
      </div>
    </div>
    </section>
    <img src="/img/logogo.png" class="rounded float-end mt-3" style="max-width:340px"alt="...">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
      function callback() {
        const submitButton = document.getElementById("oops");
        submitButton.removeAttribute("disabled");
      }
    </script>
    
<script>
       $('#forestcabins').appendTo("body");
      $('#forestsuites').appendTo("body");
      $('#clubmanuel').appendTo("body");
      $('#clubmanuelsuites').appendTo("body");
      $('#bluehouse').appendTo("body");

var genderDropdown = document.getElementById("gender");
genderDropdown.addEventListener("change", function() {
  var selectedValue = this.value;
  
  var roomOptions = document.querySelectorAll("#roomDropdown option");
  
  for (var i = 0; i < roomOptions.length; i++) {
    var roomOption = roomOptions[i];
    
    if (selectedValue === "Male" && roomOption.id === "male") {
      roomOption.style.display = "block";
        var options = document.getElementsByTagName("option");
  // AJAX request to get sum of all integers in rows where mainplace equals to "Forestville Cabin"
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "get_forestvilleC_count.php", true);
  xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      var count = parseInt(this.responseText);
      if (count === 50) {
        // Show all "Forestville Cabin" options
        for (var i = 0; i < options.length; i++) {
          if (options[i].innerHTML.indexOf("Blue House") !== -1) {
            options[i].style.display = "";
          }
        }
      } else {
        // Hide all "Forestville Cabin" options
        for (var i = 0; i < options.length; i++) {
          if (options[i].innerHTML.indexOf("Blue House") !== -1) {
            options[i].style.display = "none";
          }
        }
      }
    }
  };
  xhr.send();
  var options = document.getElementsByTagName("option");
  // AJAX request to get sum of all integers in rows where mainplace equals to "Club Manuel Cabin"
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "get_bh_count.php", true);
  xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      var count = parseInt(this.responseText);
      if (count === 20) {
        // Show all "Forestville Cabin" options
        for (var i = 0; i < options.length; i++) {
          if (options[i].innerHTML.indexOf("Club Manuel Suites") !== -1) {
            options[i].style.display = "";
          }
        }
      } else {
        // Hide all "Forestville Cabin" options
        for (var i = 0; i < options.length; i++) {
          if (options[i].innerHTML.indexOf("Club Manuel Suites") !== -1) {
            options[i].style.display = "none";
          }
        }
      }
    }
  };
  xhr.send();
    } 
    else if (selectedValue === "Female" && roomOption.id === "female") {
      roomOption.style.display = "block";
      var options = document.getElementsByTagName("option");
  // AJAX request to get sum of all integers in rows where mainplace equals to "Club Manuel Cabin"
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "get_cmc_count.php", true);
  xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      var count = parseInt(this.responseText);
      if (count === 30) {
        // Show all "Forestville Cabin" options
        for (var i = 0; i < options.length; i++) {
          if (options[i].innerHTML.indexOf("Club Manuel Suites") !== -1) {
            options[i].style.display = "";
          }
        }
      } else {
        // Hide all "Forestville Cabin" options
        for (var i = 0; i < options.length; i++) {
          if (options[i].innerHTML.indexOf("Club Manuel Suites") !== -1) {
            options[i].style.display = "none";
          }
        }
      }
    }
  };
  xhr.send();
  var options = document.getElementsByTagName("option");
  // AJAX request to get sum of all integers in rows where mainplace equals to "Blue House"
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "get_forestvilleS_count.php", true);
  xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      var count = parseInt(this.responseText);
      if (count === 60) {
        // Show all "Forestville Cabin" options
        for (var i = 0; i < options.length; i++) {
          if (options[i].innerHTML.indexOf("Club Manuel Cabin") !== -1) {
            options[i].style.display = "";
          }
        }
      } else {
        // Hide all "Forestville Cabin" options
        for (var i = 0; i < options.length; i++) {
          if (options[i].innerHTML.indexOf("Club Manuel Cabin") !== -1) {
            options[i].style.display = "none";
          }
        }
      }
    }
  };
  xhr.send();
    } else {
      roomOption.style.display = "none";
    }
  }
  
  var roomDropdown = document.getElementById("roomDropdown");
  
  if (selectedValue === "") {
    roomDropdown.disabled = true;
  } else {
    roomDropdown.disabled = false;
  }
  
});
      // get references to the DOM elements
      const nopSelect = document.getElementById('nop');
const fullnameInput = document.getElementById('fullname');
const colleague1Input = document.getElementById('colleague1');
const colleague2Input = document.getElementById('colleague2');
const colleague3Input = document.getElementById('colleague3');
const colleague4Input = document.getElementById('colleague4');

nopSelect.addEventListener('change', function() {
  const selectedValue = nopSelect.value;

  if (selectedValue === '1') {
    fullnameInput.disabled = false;
    colleague1Input.disabled = true;
    colleague2Input.disabled = true;
    colleague3Input.disabled = true;
    colleague4Input.disabled = true;
  } else if (selectedValue === '2') {
    fullnameInput.disabled = false;
    colleague1Input.disabled = false;
    colleague2Input.disabled = true;
    colleague3Input.disabled = true;
    colleague4Input.disabled = true;
  } else if (selectedValue === '3') {
    fullnameInput.disabled = false;
    colleague1Input.disabled = false;
    colleague2Input.disabled = false;
    colleague3Input.disabled = true;
    colleague4Input.disabled = true;
  } else if (selectedValue === '4') {
    fullnameInput.disabled = false;
    colleague1Input.disabled = false;
    colleague2Input.disabled = false;
    colleague3Input.disabled = false;
    colleague4Input.disabled = true;
  } else if (selectedValue === '5') {
    fullnameInput.disabled = false;
    colleague1Input.disabled = false;
    colleague2Input.disabled = false;
    colleague3Input.disabled = false;
    colleague4Input.disabled = false;
  } else {
    fullnameInput.disabled = true;
    colleague1Input.disabled = true;
    colleague2Input.disabled = true;
    colleague3Input.disabled = true;
    colleague4Input.disabled = true;
  }
});

      function previewFile() {
  var preview = document.getElementById('preview');
  var file = document.querySelector('input[type=file]').files[0];
  var reader = new FileReader();

  reader.onloadend = function () {
    if (file.type === 'application/pdf') {
      PDFObject.embed(reader.result, preview);
    } else {
      var img = document.createElement("img");
      img.src = reader.result;
      img.style.maxWidth = "100%";
      img.style.maxHeight = "200px";
      preview.innerHTML = "";
      preview.appendChild(img);
    }
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.innerHTML = "";
  }
}

document.querySelector('input[type=file]').addEventListener("change", previewFile);
</script>


<script>
function generateInputs() {
  var selectBox = document.getElementById("myDropdown");
  var selectedValue = selectBox.options[selectBox.selectedIndex].value;
  var inputFieldsContainer = document.getElementById("inputFields");
  inputFieldsContainer.innerHTML = ""; // Clear any previously generated input fields

  for (var i = 0; i < selectedValue - 1; i++) {
    var inputField = document.createElement("input");
    inputField.type = "text";
    inputField.className = "input-field";
    inputFieldsContainer.appendChild(inputField);
  }
}
</script>

<script>
		function showFileUpload() {
			// Get reference to the form and the file upload section
			var form = document.getElementById("vic");
			var fileUploadSection = document.getElementById("room");
      $("#room").hide().fadeIn(1000, function() {
  AOS.init();
});
			// Hide the form and show the file upload section
			vic.style.display = "none";
			room.style.display = "block";
		}

    function clicky() {
			// Get reference to the form and the file upload section
			var form = document.getElementById("room");
			var fileUploadSection = document.getElementById("vic");
      $("#vic").hide().fadeIn(1000, function() {
  AOS.init();
});
			// Hide the form and show the file upload section
			room.style.display = "none";
			vic.style.display = "block";
		}
    const sectionElement = document.getElementById('vic');
sectionElement.style.display = 'none';

</script>

<script>
window.onload = function() {
  const forms = document.querySelectorAll('form');
  forms.forEach(form => {
    const inputs = form.querySelectorAll('input, textarea, select');
    inputs.forEach(input => {
      const randomString = Math.random().toString(36).substring(2, 15);
      input.setAttribute('autocomplete', randomString);
    });
  });
};
</script>
    
    <!-- Bootstrap JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  // update the name of the dropdown when an item is selected
  $(".dropdown-menu a").click(function(){
    $("#selectedPlace").text($(this).text());
  });
  AOS.init();

// You can also pass an optional settings object
// below listed default settings
AOS.init({
  // Global settings:
  disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init', // class applied after initialization
  animatedClassName: 'aos-animate', // class applied on animation
  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
  

  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 120, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 1000, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: false, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});
</script>

<!-- SCRIPT FOR VALIDATION OF FILE -->
<script>
  // Get the input file element with the name "myFile"
  const myFile = document.querySelector("input[name='file']");
  
  // Add an event listener to the input file element
  myFile.addEventListener("change", function() {
    // Get the file type of the selected file
    const fileType = myFile.files[0].type;
    
    // Check if the file type is not a JPG or PDF
    if (fileType !== "image/jpeg" && fileType !== "application/pdf") {
      // Show a SweetAlert with an error message
      swal("Error", "Only JPG and PDF files are allowed!", "error");
      
      // Clear the selected file
      myFile.value = "";
    }
  });
</script>


<script>
// disable right click
    document.addEventListener('contextmenu', event => event.preventDefault());
 
    document.onkeydown = function (e) {
 
        // disable F12 key
        if(e.keyCode == 123) {
            return false;
        }
 
        // disable I key
        if(e.ctrlKey && e.shiftKey && e.keyCode == 73){
            return false;
        }
 
        // disable J key
        if(e.ctrlKey && e.shiftKey && e.keyCode == 74) {
            return false;
        }
 
        // disable U key
        if(e.ctrlKey && e.keyCode == 85) {
            return false;
        }
    }
  </script>

  
  </body>
</html>