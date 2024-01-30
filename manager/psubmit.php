<?php
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

//$id = (isset($_GET['id']) ? $_GET['id'] : '');
$pid = $_GET['pid'];
$id = $_GET['id'];
$date = date('Y-m-d');
//echo "$date";
$sql = "UPDATE `project` SET `subdate`='$date',`status`='Submitted' WHERE pid = '$pid';";
$result = mysqli_query($conn , $sql);
header("Location: mpproject.php?id=$id");
?>