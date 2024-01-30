


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
 session_start();
 if(isset($_GET['sign']) && $_GET['sign'] === "out") {
  $_SESSION = array(); // Load all session variables
  // Destroy the session
  session_destroy();
  header("Location:/html2/indexmain.php");
  exit();
}
?>



<div class="header">
  <h1>This is Admin Home Page</h1>
  
</div>

<div class="topnav">
  <a href="#">Home</a>
  
  <a href="history.php">Employee history</a>
  <a href="advisor1.php">Assign Manager</a>
  <a href="adminreg.php">Add Employee</a>
  <a href="adleave.php">Employee_Leave_Status</a>
  <a href="changepass.php" style="float:right">Change Password</a>
  <a href="?sign=out" style="float:right">Logout</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      
      <h5>Today <?php echo date('D M Y');?></h5>
      <div class="fakeimg" style="height:200px;"><img src="ad.jpg" height="100%" width="100%"></div>
    
    </div>
    <div class="card">
      <h5>Today <?php echo date('D:M:Y');?></h5>
    
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
    <div class="fakeimg" style="height: 100px;"><img src="add.jpg" height="100%" width="100%"></div>

  <h2>About Me</h2>
        <p>I am a highly organised individual with great communication and interpersonal skills, and
        have ten years' experience working as an administrator.
        I have strong typing and data entry skills, and enjoy working independently as well as in a team.
        </p></div>