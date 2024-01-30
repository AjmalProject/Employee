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



$email = $_POST['mailuid'];
$password = $_POST['pwd'];

$sql = "SELECT * from regemploye WHERE email = '$email' AND password = '$password'";
$sql2 = "SELECT * from addemployee WHERE email = '$email' AND password = '$password'";
//echo "$sql";

$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
if(mysqli_num_rows($result) == 1){
	
    
    $_SESSION['user_id']=$email;
    $empData = mysqli_fetch_assoc($result);
    $_SESSION['eid'] = $empData['id'];
	//echo ("logged in");
	header("location:eloginwel.php");
}
else if(mysqli_num_rows($result2)>0)
{
    $empData = mysqli_fetch_assoc($result2);
    $_SESSION['user_id']=$email;
    $_SESSION['eid'] = $empData['id'];


   
	//echo ("logged in");
	header("location:addeprocess.php");
    
}


else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}
?>