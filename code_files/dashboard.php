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
<title>Dashboard</title>
	<!-- Include Bootstrap CSS -->
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="icon" href="/img/logog.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Include Font Awesome CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/css2/dashboard.css">
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

<!-- Page Content -->
	<div class="piw" style="margin-top:100px;">
        <table id="myTable" class="table table-hover" style="width:100%">
        <h2>Pending Participants</h2>
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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-striped">
        <?php
                // Assuming you have a database connection established

                // Query to retrieve data from the database
                $sql = "SELECT * FROM users WHERE status=0 ORDER BY id ASC";

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
                        $user_agent = $_SERVER['HTTP_USER_AGENT'];
                        $is_mobile = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $user_agent);
                        $download_link = 'your_site_url/uploads/'.htmlspecialchars($file);
                        
                        if ($is_mobile) {
                            // User is on a mobile device, force download
                            echo "<td><a href='$download_link' download>" . $file . "</a></td>";
                        } else {
                            // User is not on a mobile device, open in new tab
                            echo "<td><a href='$download_link' target='_blank'>" . $file . "</a></td>";
                        }
                        echo "<td>" . $row['user_date'] . " " .  $row['am_pm'] . "</td>";
                       echo "<td style='white-space: nowrap;'>
                        <a href='asd.php?id=".htmlspecialchars($row["id"])."' class='btn btn-success' onclick='return confirm(\"Are you sure you want to check in?\");'>Check In</a>
                        <a href='edit.php?id=".htmlspecialchars($row["id"])."' class='btn btn-primary'>Edit Receipt</a>
                        <a href='archive.php?id=".htmlspecialchars($row["id"])."' class='btn btn-warning' onclick='return confirm(\"Are you sure you want to archive the participant?\");'>Archive</a>
                    </td>";
                        echo "</tr>";
                    }


                }
            ?>

        </tbody>
    </table>

    </table>
	</div>
    <!-- Page Content -->
	<div class="piw" style="margin-top:80px;">
    <h2>Checked In Participants</h2>
    <table id="myTable2" class="table table-hover" style="width:100%">
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
                <th>Actions</th>
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
                        $user_agent = $_SERVER['HTTP_USER_AGENT'];
                        $is_mobile = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $user_agent);
                        $download_link = 'your_site_url/uploads/'.htmlspecialchars($file);
                        
                        if ($is_mobile) {
                            // User is on a mobile device, force download
                            echo "<td><a href='$download_link' download>" . $file . "</a></td>";
                        } else {
                            // User is not on a mobile device, open in new tab
                            echo "<td><a href='$download_link' target='_blank'>" . $file . "</a></td>";
                        }
                        echo "<td>" . $row['user_date'] . " " .  $row['am_pm'] . "</td>";
                        echo "<td><a href='checkout.php?id=".htmlspecialchars($row["id"])."' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to check out?\");'>Check Out</a></td>";
                        echo "</tr>";

                }
                }
            ?>
        </tbody>
    </table>
	</div>
<!-- Page Content -->
<div class="piw" style="margin-top:80px;">
    <h2>Recent Participants</h2>
    <table id="myTable3" class="table table-hover" style="width:100%">
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
                $sql = "SELECT * FROM users WHERE status=2 ORDER BY id DESC";

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
                        $user_agent = $_SERVER['HTTP_USER_AGENT'];
                        $is_mobile = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $user_agent);
                        $download_link = 'your_site_url/uploads/'.htmlspecialchars($file);
                        
                        if ($is_mobile) {
                            // User is on a mobile device, force download
                            echo "<td><a href='$download_link' download>" . $file . "</a></td>";
                        } else {
                            // User is not on a mobile device, open in new tab
                            echo "<td><a href='$download_link' target='_blank'>" . $file . "</a></td>";
                        }
                        echo "<td>" . $row['user_date'] . " " .  $row['am_pm'] . "</td>";
                        echo "</tr>";
                    }


                }
            ?>
        </tbody>
    </table>
	</div>
	<!-- Page Content -->
	<div class="piw" style="margin-top:100px;">
        <table id="myTable4" class="table table-hover" style="width:100%">
        <h2>Archive Participants</h2>
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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-striped">
        <?php
                // Assuming you have a database connection established

                // Query to retrieve data from the database
                $sql = "SELECT * FROM users WHERE status=3 ORDER BY id ASC";

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
                        $user_agent = $_SERVER['HTTP_USER_AGENT'];
                        $is_mobile = preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $user_agent);
                        $download_link = 'your_site_url/uploads/'.htmlspecialchars($file);
                        
                        if ($is_mobile) {
                            // User is on a mobile device, force download
                            echo "<td><a href='$download_link' download>" . $file . "</a></td>";
                        } else {
                            // User is not on a mobile device, open in new tab
                            echo "<td><a href='$download_link' target='_blank'>" . $file . "</a></td>";
                        }
                        echo "<td>" . $row['user_date'] . " " .  $row['am_pm'] . "</td>";
                       echo "<td style='white-space: nowrap;'>
                        <a href='unarchive.php?id=".htmlspecialchars($row["id"])."' class='btn btn-warning' onclick='return confirm(\"Are you sure you want to unarchive the participant?\");'>Unarchive</a>
                    </td>";
                        echo "</tr>";
                    }


                }
            ?>

        </tbody>
    </table>

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
        pageLength: 7,
        searching: true, // show the search bar
        order: [], // disable default sorting
        columnDefs: [
            { orderable: false, targets: '_all' } // disable sorting on all columns
        ]
});</script>

<script>$(document).ready(function () {
		$('#myTable3').DataTable();
	});
$('#myTable3').dataTable({
    lengthChange: false,
        pageLength: 7,
        searching: true, // show the search bar
        order: [], // disable default sorting
        columnDefs: [
            { orderable: false, targets: '_all' } // disable sorting on all columns
        ]
});</script>

<script>$(document).ready(function () {
		$('#myTable4').DataTable();
	});
$('#myTable4').dataTable({
    lengthChange: false,
        pageLength: 7,
        searching: true, // show the search bar
        order: [], // disable default sorting
        columnDefs: [
            { orderable: false, targets: '_all' } // disable sorting on all columns
        ]
});</script>

<script>$(document).ready(function () {
		$('#myTable2').DataTable();
	});
$('#myTable2').dataTable({
    lengthChange: false,
        pageLength: 7,
        searching: true, // show the search bar
        order: [], // disable default sorting
        columnDefs: [
            { orderable: false, targets: '_all' } // disable sorting on all columns
        ]
});</script>
<script>
// Get the query string parameters from the URL
const urlParams = new URLSearchParams(window.location.search);

// Check if the "status" parameter is set to "archive_success"
if (urlParams.get("status") === "archive_success") {
  // Display the archive success message
  swal("SUCCESS!", "Check Out complete", "success").then(() => {
    // Remove the "status" parameter from the URL
    history.replaceState(null, null, window.location.pathname);
  });;
}
// Check if the "status" parameter is set to "archive_success1"
if (urlParams.get("status") === "archive_success1") {
  // Display the archive success message
  swal("SUCCESS!", "Archive complete", "success").then(() => {
    // Remove the "status" parameter from the URL
    history.replaceState(null, null, window.location.pathname);
  });;
}
// Check if the "status" parameter is set to "unarchive_success"
if (urlParams.get("status") === "unarchive_success") {
  // Display the unarchive success message
  swal("SUCCESS!", "Check In complete and participant has been emailed!", "success").then(() => {
    // Remove the "status" parameter from the URL
    history.replaceState(null, null, window.location.pathname);
  });;
}

// Check if the "status" parameter is set to "unarchive_success"
if (urlParams.get("status") === "unarchive_success2") {
  // Display the unarchive success message
  swal("SUCCESS!", "Unarchive complete!", "success").then(() => {
    // Remove the "status" parameter from the URL
    history.replaceState(null, null, window.location.pathname);
  });;
}

// Check if the "status" parameter is set to "error"
if (urlParams.get("status") === "error") {
  // Display the error message
  swal("ERROR!", "Something went wrong!", "error").then(() => {
    // Remove the "status" parameter from the URL
    history.replaceState(null, null, window.location.pathname);
  });;
}
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
  
  

	<!-- Include jQuery and Bootstrap JS -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>