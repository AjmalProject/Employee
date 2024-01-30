<?php
//including the database connection file
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



//getting id of the data from url
$eid=$_SESSION['eid'];
$eid = $_GET['eid'];
//echo $id;
$reason = $_POST['reason'];

$start = $_POST['start'];
//echo "$reason";
$end = $_POST['end'];
$eid=$post['eid'];
$sql = "INSERT INTO `employee_leave`(`eid`, `start`, `end`, `reason`, `status`) VALUES ('$eid','$start','$end','$reason','Pending')";

$result = mysqli_query($conn, $sql);

//redirecting to the display page (index.php in our case)
header("Location:leavestatus.php?eid=$eid");
?>
