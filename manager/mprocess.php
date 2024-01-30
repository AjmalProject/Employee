<?php

session_start();
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



$id= $_POST['id'];
$password = $_POST['pwd'];

$sql = "SELECT * from rmanager WHERE mid = '$id' AND password = '$password'";

//echo "$sql";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){
	
    $_SESSION['user_id']=$id;
	//echo ("logged in");
	header("location:managerwel.php");
}
else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}
?>