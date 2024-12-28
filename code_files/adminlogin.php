<?php
include ("connection.php");
session_start();
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <link rel="stylesheet" href="/css2/adminlogin.css">
    <link rel="icon" href="/img/logog.png">
  </head>
  <body>

<?php  
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['username'];
        $pword = $_POST['password'];
    
        if(empty($name) || empty($pword)) {
            echo "Please complete the input.";
        }
        else {
            $servername="localhost";
            $username="root";
            $password="";
            $dbname="db_reservation";
    
            $conn=mysqli_connect ($servername, $username, $password, $dbname);
    
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
    
            $stmt = mysqli_prepare($conn, "SELECT * FROM admins WHERE username = ? AND password = ?");
            mysqli_stmt_bind_param($stmt, "ss", $name, $pword);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
    
            if ($count > 0) {
                // Get the current session ID
                $session_id = session_id();
    
                // Update the session_id field in the admins table for the logged in user
                $stmt = mysqli_prepare($conn, "UPDATE admins SET session_id = ? WHERE username = ?");
                mysqli_stmt_bind_param($stmt, "ss", $session_id, $name);
                mysqli_stmt_execute($stmt);
    
                // Check if the user is already logged in by comparing the stored session ID with the current session ID
                if ($row['session_id'] == $session_id) {
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal("FAILED","The account is currently logged In","error");';
                  echo '}, 1000);</script>';
                  header("Refresh: 4; url=adminlogin.php"); // Redirect to somepage.php after 4 seconds
                  exit();
              
                }
    
                // Set session variables and redirect to dashboard
                $_SESSION['id'] = $row['userid'];
                $_SESSION["id"] = $row['Id'];
                $_SESSION["Pword"] = $row['Pword'];
                $_SESSION["Lname"] = $row['Lname']; 
                $_SESSION["Fname"] = $row['Fname'];
                $_SESSION["Mname"] = $row['Mname']; 
                $_SESSION['login'] = true;
    
                header ('location:dashboard.php');
                exit();
            } 
    
            else {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("LOG IN FAILED","Username / Password is incorrect","error");';
                echo '}, 1000);</script>';
            }
    
            mysqli_close($conn);
        }
    }
    
    ?>
<nav class="navbar navbar-light" data-aos="fade-right">
<div class="nav mb-4"style="max-width: 400px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="/img/logog.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8 mt-2">
      <div class="card-body">
        <h6 class="card-text">UNIVERSITY, COLLEGE, AND SCHOOL REGISTRARS ASSOCIATION (UCSRA) INC.
      </div>
    </div>
  </div>
</div>
</nav>
<div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h1 class="text-center mt-5 mb-5">Login Form</h1>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>
        </div>
      </div>
    </div>
    
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