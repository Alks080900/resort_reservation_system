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
	<title>Print Reports</title>
	<!-- Include Bootstrap CSS -->
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Include Font Awesome CSS -->
  <link rel="icon" href="/img/logog.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/css2/printreports.css">
</head>
<body>
	<!-- Top Bar -->
	<nav class="navbar navbar-expand-md navbar-light fixed-top">
    <img src="/img/logog.png" alt="Bootstrap" width="50" height="50">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav mr-auto"></ul>
			<ul class="navbar-nav">
            <li class="nav-item">
					<a class="nav-link" href="dashboard.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="printreports.php">Print Reports</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</nav>
<br>
<br>
<br>
<br>
<br>
	<!-- Page Content -->
  <div class="piw">
	<div class="dropdown">
    <form action="print.php" method="post" target="_blank">
    <label style="margin-right: 49px; font-weight: 500;">TYPE OF ROOM</label>
    <select id="roomDropdown" class="form-control form-select form-select-sm" name="mainplace" style="display: inline;" required>
     <option value="All">All</option>
    <option value="Forestville Suites, 1st Floor, Room 101">Forestville Suites, 1st Floor, Room 101</option>
    <option value="Forestville Suites, 1st Floor, Room 102" >Forestville Suites, 1st Floor, Room 102</option>
    <option value="Forestville Suites, 1st Floor, Room 103" >Forestville Suites, 1st Floor, Room 103</option>
    <option value="Forestville Suites, 1st Floor, Room 104" >Forestville Suites, 1st Floor, Room 104</option>
    <option value="Forestville Suites, 1st Floor, Room 105" >Forestville Suites, 1st Floor, Room 105</option>
    <option value="Forestville Suites, 2nd Floor, Room 206" >Forestville Suites, 2nd Floor, Room 206</option>
    <option value="Forestville Suites, 2nd Floor, Room 207" >Forestville Suites, 2nd Floor, Room 207</option>
    <option value="Forestville Suites, 2nd Floor, Room 208" >Forestville Suites, 2nd Floor, Room 208</option>
    <option value="Forestville Suites, 2nd Floor, Room 209" >Forestville Suites, 2nd Floor, Room 209</option>
    <option value="Forestville Suites, 2nd Floor, Room 210" >Forestville Suites, 2nd Floor, Room 210</option>
    <option value="Forestville Suites, 2nd Floor, Room 211" >Forestville Suites, 2nd Floor, Room 211</option>
    <option value="Forestville Suites, 2nd Floor, Room 212" >Forestville Suites, 2nd Floor, Room 212</option>
    <option value="Forestville Cabin (Left), Room 1" >Forestville Cabin (Left), Room 1</option>
    <option value="Forestville Cabin (Left), Room 2" >Forestville Cabin (Left), Room 2</option>
    <option value="Forestville Cabin (Left), Room 3" >Forestville Cabin (Left), Room 3</option>
    <option value="Forestville Cabin (Left), Room 4" >Forestville Cabin (Left), Room 4</option>
    <option value="Forestville Cabin (Left), Room 5" >Forestville Cabin (Left), Room 5</option>
    <option value="Forestville Cabin (Right), Room 6" >Forestville Cabin (Right), Room 6</option>
    <option value="Forestville Cabin (Right), Room 7" >Forestville Cabin (Right), Room 7</option>
    <option value="Forestville Cabin (Right), Room 8" >Forestville Cabin (Right), Room 8</option>
    <option value="Forestville Cabin (Right), Room 9" >Forestville Cabin (Right), Room 9</option>
    <option value="Forestville Cabin (Right), Room 10" >Forestville Cabin (Right), Room 10</option>
    <option value="Blue House, 1st Floor, Room 101" >Blue House, 1st Floor, Room 101</option>
    <option value="Blue House, 1st Floor, Room 102" >Blue House, 1st Floor, Room 102</option>
    <option value="Blue House, 2nd Floor, Room 201" >Blue House, 2nd Floor, Room 201</option>
    <option value="Blue House, 2nd Floor, Room 202" >Blue House, 2nd Floor, Room 202</option>
    <option value="Club Manuel Cabin, Cabin 1"  >Club Manuel Cabin, Cabin 1</option>
    <option value="Club Manuel Cabin, Cabin 2"  >Club Manuel Cabin, Cabin 2</option>
    <option value="Club Manuel Cabin, Cabin 3"  >Club Manuel Cabin, Cabin 3</option>
    <option value="Club Manuel Cabin, Cabin 4"  >Club Manuel Cabin, Cabin 4</option>
    <option value="Club Manuel Cabin, Cabin 5"  >Club Manuel Cabin, Cabin 5</option>
    <option value="Club Manuel Cabin, Cabin 6"  >Club Manuel Cabin, Cabin 6</option>
    <option value="Club Manuel Suites, 1st Floor, Room 101"  >Club Manuel Suites, 1st Floor, Room 101</option>
    <option value="Club Manuel Suites, 1st Floor, Room 102"  >Club Manuel Suites, 1st Floor, Room 102</option>
    <option value="Club Manuel Suites, 1st Floor, Room 103"  >Club Manuel Suites, 1st Floor, Room 103</option>
    <option value="Club Manuel Suites, 1st Floor, Room 104"  >Club Manuel Suites, 1st Floor, Room 104</option>
    <option value="Club Manuel Suites, 1st Floor, Room 105"  >Club Manuel Suites, 1st Floor, Room 105</option>
    <option value="Club Manuel Suites, 1st Floor, Room 106"  >Club Manuel Suites, 1st Floor, Room 106</option>
    <option value="Club Manuel Suites, 1st Floor, Room 107"  >Club Manuel Suites, 1st Floor, Room 107</option>
    <option value="Club Manuel Suites, 2nd Floor, Room 201"  >Club Manuel Suites, 2nd Floor, Room 201</option>
    <option value="Club Manuel Suites, 2nd Floor, Room 202"  >Club Manuel Suites, 2nd Floor, Room 202</option>
    <option value="Club Manuel Suites, 2nd Floor, Room 203"  >Club Manuel Suites, 2nd Floor, Room 203</option>
    <option value="Club Manuel Suites, 2nd Floor, Room 204"  >Club Manuel Suites, 2nd Floor, Room 204</option>
    <option value="Club Manuel Suites, 2nd Floor, Room 205"  >Club Manuel Suites, 2nd Floor, Room 205</option>
    <option value="Club Manuel Suites, 2nd Floor, Room 206"  >Club Manuel Suites, 2nd Floor, Room 206</option>
    <option value="Club Manuel Suites, 2nd Floor, Room 207"  >Club Manuel Suites, 2nd Floor, Room 207</option>
    <option value="Club Manuel Suites, 3rd Floor, Room 301"  >Club Manuel Suites, 3rd Floor, Room 301</option>
    <option value="Club Manuel Suites, 3rd Floor, Room 302"  >Club Manuel Suites, 3rd Floor, Room 302</option>
    <option value="Club Manuel Suites, 3rd Floor, Room 303"  >Club Manuel Suites, 3rd Floor, Room 303</option>
    <option value="Club Manuel Suites, 3rd Floor, Room 304"  >Club Manuel Suites, 3rd Floor, Room 304</option>
    <option value="Club Manuel Suites, 3rd Floor, Room 305"  >Club Manuel Suites, 3rd Floor, Room 305</option>
    <option value="Club Manuel Suites, 3rd Floor, Room 306"  >Club Manuel Suites, 3rd Floor, Room 306</option>
    <option value="Club Manuel Suites, 3rd Floor, Room 307"  >Club Manuel Suites, 3rd Floor, Room 307</option>
</select>
</div>
<button type="submit" class="btn btn-primary" name="print" id="print" style="margin-left: 166px;"><i class="bi bi-printer" style="margin-right: 10px;"></i>Print</button>
  </form>
	</div>
  </div>
    <!-- Page Content -->
	<div class="piw" style="margin-top:50px;">
    <h2>Current Particpants</h2>
    <table id="myTable" class="table table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Region Cluster</th>
                <th>Full Name</th>
                <th>No. of Reservation (including self)</th>
                <th>Email</th>
                <th>Contact No.</th>
                <th>Place Chosen</th>
                <th>Payment / Receipt</th>
                <th>Date & Time</th>

            </tr>
        </thead>
        <tbody class="table-striped">
            <?php
                // Assuming you have a database connection established

                // Query to retrieve data from the database
                $sql = "SELECT * FROM users WHERE status=1 ORDER BY id DESC";

                $result = mysqli_query($conn, $sql);

                // Check if any rows were returned
                if (mysqli_num_rows($result) > 0) {
                  // Output table rows
                  while ($row = mysqli_fetch_assoc($result)) {
                      $cluster = $row["cluster"];
                      $fullname = $row["fullname"];
                      $slot = $row["slot"];
                      $email = $row["email"];
                      $contact = $row["contact"];
                      $mainplace = $row["mainplace"];
                      $file = $row["file"];
                      $user_date = $row["user_date"];
                      $am_pm = $row["am_pm"];
                      echo "<tr>";
                      echo "<td>" . $row['cluster'] . "</td>";
                      echo "<td>" . $row['fullname'] . "</td>";
                      echo "<td>" . $row['slot'] . "</td>";
                      echo "<td>" . $row['email'] . "</td>";
                      echo "<td>" . $row['contact'] . "</td>";
                      echo "<td>" . $row['mainplace'] . "</td>";
                      echo "<td><a href='http://localhost/Reserve/uploads/".htmlspecialchars($file)."' target='_blank'>" . $file . "</a></td>";
                      echo "<td>" . $row['user_date'] . " " .  $row['am_pm'] . "</td>";
                      echo "</tr>";
                    }

                }
            ?>
        </tbody>
    </table>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>

    <script>$(document).ready(function () {
		$('#myTable').DataTable();
	});
$('#myTable').dataTable({
    lengthChange: false,
        pageLength: 15,
        searching: true, // show the search bar
        order: [], // disable default sorting
        columnDefs: [
            { orderable: false, targets: '_all' } // disable sorting on all columns
        ]
});</script>

<script>
  // update the name of the dropdown when an item is selected
  $(".dropdown-menu a").click(function(){
    $("#selectedPlace").text($(this).text());
  });
</script>


	<!-- Include jQuery and Bootstrap JS -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>