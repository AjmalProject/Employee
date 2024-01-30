<!DOCTYPE html>

<html>
<head>
	<title>welcome manager</title>
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="ind.css">
</head>
<body>
<?php


session_start();
if(isset($_GET['sign']) && $_GET['sign'] === "out") {
 $_SESSION = array(); // Load all session variables
 // Destroy the session
 session_destroy();
 header("Location:managerwel.php");
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
	<header>
		<nav>
			<h1>Employee Management System</h1>
			<ul id="navli">
				<li><a class="homered" href="#">HOME</a></li>
				<li><a class="homeblack" href="about.php">ABOUT</a></li>
				<li><a class="homeblack" href="viewe.php">VIEW EMPLOYEE</a></li>
				
				<li> <a href="?sign=out" style="float:right">Logout</a></li>
				
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>
	<div id="divimg">
		
	</div>

	
	
	

	
		

	
</body>
</html>