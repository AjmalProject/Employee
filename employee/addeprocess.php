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

$server = "localhost";
$username = "root";
$password = "";
$db = "employeen";

$conn = mysqli_connect($server,$username,$password,$db);

if($conn)
{
    echo "";
}
else
{
    echo "Connection failed!".mysqli_connect_error();
}

?>


<div class="topnav">
  <a href="home.php">Home</a>
  <a href="myprofile.php">my profile</a>
  <a href="emproject.php">my project</a>
  <a href="newapply.php">apply leave</a>
  <a href="leavestatus.php">leave status</a>
  <a href="changepass.php" style="float:right">Change Password</a>
  <a href="?sign=out" style="float:right">Logout</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      
      <h5>Today <?php echo date('d m y');?></h5>
      <div class="fakeimg" style="height:400px;"><img src="banner.jpg" height="100%" width="100%"></div>
      
    </div>
    <div class="card">
      <h5>Today <?php echo date('D:M:Y');?></h5>
      
  </div>
</div>
  <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
	  <?php
 include("../connection.php");
 $email=$_SESSION['user_id'];
 $sql="select name,department,pic from addemployee where email='$email'";
 $r=mysqli_query($conn,$sql);
 $row=mysqli_fetch_assoc($r);
 $name=$row['name'];
 $image=$row['pic'];
 
 $de=$row['department'];
 echo "<h3 >Hello I am $name.</h3><br>";
 echo "<h3>EMAIL:# $email.</h3>";
 echo "<div class='fakeimg' style='height:300px;'><img src='../admin/adimage/$image' height='200px' width='200px'></div>";
 echo "<p><b>DEPARTMENT NAME.:</b> $de</p>";
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