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



$email = $_POST['mailuid'];
$password = $_POST['pwd'];

$sql = "SELECT * from `alogin` WHERE email = '$email' AND password = '$password'";

//echo "$sql";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){
	

	//echo ("logged in");
	header("location:aloginwel.php");
}
else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}
?>