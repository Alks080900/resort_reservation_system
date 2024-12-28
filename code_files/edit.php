<?php
include ('connection.php');
session_start();

// Set the time limit for the session in seconds
$session_timeout = 1800; // 30 minutes

// Check if the user is logged in
if(!$_SESSION['login']){
    header("location:adminlogin.php");
    die;
}

// Check if the session is active
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $session_timeout)) {
    // If the user has been inactive for too long, destroy the session and clear the session ID from the database
    $session_id = session_id();
    session_unset();
    session_destroy();
    if(!empty($session_id)){
        $sql = "UPDATE admins SET session_id='' WHERE session_id='$session_id'";
        mysqli_query($conn, $sql);
    }
    header('Location: adminlogin.php');
    exit;
}

// Update the last activity time
$_SESSION['last_activity'] = time();
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
    <link rel="stylesheet" href="/css/vicinity1.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.4/pdfobject.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  </head>
  <body class="scrollbar scrollbar-juicy-peach">
      
<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_reservation";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Get the ID of the student to edit from the query string
$ID = $_GET['id'];

// Define the table name
$table = "users";

// Execute a SELECT statement to retrieve data for the specified student
$sql = "SELECT * FROM $table WHERE id='$ID'";
$result = $conn->query($sql);

// Check if a row was returned
if ($result->num_rows == 1) {
	// Fetch the row and store the values in variables
    $row = $result->fetch_assoc();
    $slot = $row['slot'];
    $fullname = $row['fullname'];
    $colleague1 = $row['colleague1'];
    $colleague2 = $row['colleague2'];
    $colleague3 = $row['colleague3'];
    $colleague4 = $row['colleague4'];
    $mainplace = $row['mainplace'];
    $file = $row['file'];
} else {
	// If no row was returned, display an error message
	echo "Error: No data found";
	exit;
}
?>
<!-- END OF RETRIEVE DATA CODE -->



<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
 // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "db_reservation";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get the user id from the URL
  $id = $_GET["id"];
  
// Create the user_date and am_pm variables
date_default_timezone_set('Asia/Manila');
$user_date = date('Y-m-d h:i:s A');
$am_pm = date('A');


    // Prepare and bind the SQL statement for updating data in the database
    $status = 0;
    $sql ="UPDATE users SET slot=?, fullname=?, colleague1=?, colleague2=?, colleague3=?, colleague4=?, user_date=?, am_pm=?, status=? WHERE id=?";
    
   $stmt = $conn->prepare($sql);
   
    $stmt->bind_param("ssssssssii", $slot, $fullname, $colleague1, $colleague2, $colleague3, $colleague4, $user_date, $am_pm, $status, $id);
    
        // Get the form data
$slot = isset($_POST["slot"]) ? mysqli_real_escape_string($conn, $_POST["slot"]) : "";
$fullname = isset($_POST["fullname"]) ? mysqli_real_escape_string($conn, $_POST["fullname"]) : "";
$colleague1 = isset($_POST["colleague1"]) ? mysqli_real_escape_string($conn, $_POST["colleague1"]) : "";
$colleague2 = isset($_POST["colleague2"]) ? mysqli_real_escape_string($conn, $_POST["colleague2"]) : "";
$colleague3 = isset($_POST["colleague3"]) ? mysqli_real_escape_string($conn, $_POST["colleague3"]) : "";
$colleague4 = isset($_POST["colleague4"]) ? mysqli_real_escape_string($conn, $_POST["colleague4"]) : "";
$file = $_FILES["file"]["name"];

    // Execute the SQL statement to update user data
  if ($stmt->execute()) {
    $ID = $_GET['id'];
    $url = "dashboard.php";
    echo '<script type="text/javascript">';
    echo 'swal("SUCCESS","User has been updated! Redirecting you...","success");';
    echo "setTimeout(function () { window.location = '$url'; }, 3000);"; // add the redirection inside the setTimeout
    echo '</script>';
    
  }

else {
    // Show an error message
    $url = "dashboard.php";
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

// Update the uploaded files (if any)
if (isset($_FILES["file"]) && $_FILES["file"]["name"] != "") {
  $filetype = $_FILES["file"]["type"];
  $filesize = $_FILES["file"]["size"];
  $filetemp = $_FILES["file"]["tmp_name"];
  if ($filetype == "application/pdf" || $filetype == "image/jpeg") {
    // Check if the user has an existing file
    $sql = "SELECT file FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if ($row["file"] != "") {
      unlink("uploads/" . $row["file"]); // Delete the existing file
    }
    // Insert the new file
    $newfilename = time() . '_' . basename($_FILES["file"]["name"]);
    move_uploaded_file($filetemp, "uploads/" . $newfilename);
    $sql = "UPDATE users SET file=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $newfilename, $ID);

    if ($stmt->execute()) {
      $ID = $_GET['id'];
      $url = "dashboard.php";
      echo '<script type="text/javascript">';
      echo 'swal("SUCCESS","User has been updated! Redirecting you...","success");';
      echo "setTimeout(function () { window.location = '$url'; }, 4000);"; // add the redirection inside the setTimeout
      echo '</script>';
    }
  
  else {
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("ERROR","Something went wrong!","error");';
      echo '}, 1000);</script>';
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}

}

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
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $ID; ?>" method="post" enctype="multipart/form-data">
  <div class="container shadow p-3 bg-body rounded-3 c3" data-aos="fade-up">
    <h2 class="text-center mb-5" id="headerText">UPDATING OF RECEIPT</h2>
    <div class="row">
    <pre style="color: red; font-weight: 700; font-size: 16px;">NOTE: Convention Fee: <u>PHP8,500 - Until April 10, 2023</u>
      Convention Fee: <u>PHP9,500 - After April 10, 2023</u></pre>
     <div class="row">
  <div class="col-lg-4">
    <div class="form-group c1">
      <label for="file">Upload Receipt (JPG or PDF only)</label>
      <div class="custom-file">
        <?php if ($file): ?>
          <a href="http://sherconreservation.online/uploads/<?php echo htmlspecialchars($file); ?>" target="_blank"><?php echo $file; ?></a>
        <?php else: ?>
          <label class="text-danger">RECEIPT (NO FILE UPLOADED)</label>
        <?php endif; ?>
        <input class="avatar" type="file" name="file" accept=".pdf,.jpg">
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="form-group c1">
      <label for="Suites">Type of Room</label>
      <div class="form-group">
        <p style="font-weight:bold; color:green;"><?php echo $mainplace; ?></p>
      </div>
    </div>
  </div>
  <div class="form-group col-lg-6 c1" id="preview" style="max-width: 1500px; max-height: 1500px;"></div>
</div>

<div class="form-group col-lg-4 c1">
        <label for="email">Number of Reservation</label>
            <select id="nop" class="form-control form-select" name="slot" required>
            <option value="<?php echo $slot; ?>" selected><?php echo $slot; ?></option>
            <option value="1">Only you</option>
            <option value="2">2 (including the holder)</option>
            <option value="3">3 (including the holder)</option>
            <option value="4">4 (including the holder)</option>
            <option value="5">5 (including the holder)</option>
          </select>
        </div>
        <div class="form-group col-lg-4 c1">
          <label for="fullname">Holder's Full Name</label>
          <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" value="<?php echo $fullname; ?>" id="fullname" name="fullname" placeholder="Full Name">
        </div>
        <div class="form-group col-lg-4 c1">
          <label for="fullname">Companion 2</label>
          <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" value="<?php echo $colleague1; ?>" id="colleague1" name="colleague1" placeholder="Full Name">
        </div>
        <div class="form-group col-lg-4 c1">
          <label for="fullname">Companion 3</label>
          <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" value="<?php echo $colleague2; ?>" id="colleague2" name="colleague2" placeholder="Full Name">
        </div>
        <div class="form-group col-lg-4 c1">
          <label for="fullname">Companion 4</label>
          <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" value="<?php echo $colleague3; ?>"  id="colleague3" name="colleague3" placeholder="Full Name">
        </div>
        <div class="form-group col-lg-4 c1">
          <label for="fullname">Companion 5</label>
          <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" id="colleague4" value="<?php echo $colleague4; ?>" name="colleague4" placeholder="Full Name">
        </div>
      <button type="submit" class="btn btn-primary mt-3" id="oops" >UPDATE USER</button>
    </div>
  </div>
</form>
</section>


      

<img src="/img/logogo.png" class="rounded float-end mt-3" style="max-width:340px"alt="...">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    
<script>
       $('#forestcabins').appendTo("body");
      $('#forestsuites').appendTo("body");
      $('#clubmanuel').appendTo("body");
      $('#clubmanuelsuites').appendTo("body");
      $('#bluehouse').appendTo("body");
      // get references to the DOM elements

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