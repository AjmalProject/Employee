

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="employee/style.css">
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

$server = "localhost";
$username = "root";
$password = "";
$db = "employeen";

$conn = mysqli_connect($server,$username,$password,$db);

if($conn)
{
    echo "Connected successfully!";
}
else
{
    echo "Connection failed!".mysqli_connect_error();
}

?>

<div class="header">
  <h1>This is Employee Home Page</h1>
  
</div>

<div class="topnav">
  <a href="home.php">Home</a>
  <a href="myprofile.php">my profile</a>
  <a href="emproject.php">my project</a>
  <a href="emleave.php">apply leave</a>
  <a href="changepass.php" style="float:right">Change Password</a>
  <a href="?sign=out" style="float:right">Logout</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      
      <h5>Today <?php echo date('d m y');?></h5>
      <div class="fakeimg" style="height:200px;"><img src="w.jpg" height="100%" width="100%"></div>
      
    </div>
    <div class="card">
      <h5>Today <?php echo date('D:M:Y');?></h5>
      
  </div>
  
  <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
	  <?php
 include("../connection.php");
 $email=$_SESSION['user_id'];
 $sql="select name,phone,pic from regemploye where email='$email'";
 $r=mysqli_query($conn,$sql);
 $row=mysqli_fetch_assoc($r);
 $name=$row['name'];
 $image=$row['pic'];
 
 $mbl=$row['department'];
 echo "<h3 >Hello I am $name.</h3><br>";
 echo "<h3>ID# $email.</h3>";
 echo "<div class='fakeimg' style='height:100px;'><img src='../Simage/$image' height='80px' width='100px'></div>";
 echo "<p><b>DEPARTMENT NAME.:</b> $mbl</p>";
?>  
    </div>
    <div class="card">
      
    </div>
    <div class="card">
      <
    </div>
  </div>
</div>

<div class="footer">
  <h2>Copyright@puc.cse</h2>
</div>

</body>
</html>