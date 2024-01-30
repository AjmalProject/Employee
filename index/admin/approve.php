<?php
//including the database connection file

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
$eid = $_GET['eid'];


//deleting the row from table
$result = mysqli_query($conn, "UPDATE `employee_leave` SET `status`='Approved' WHERE eid = $eid ;");

//redirecting to the display page (index.php in our case)
header("Location:/html2/index/employee/empleave.php");
?>