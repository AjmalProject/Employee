<!DOCTYPE html>

<html>
<head>
	<title>Employee Management System</title>
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="ind.css">
</head>
<body>
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

?>
	<header>
		<nav>
			<h1>Employee Management System</h1>
			<ul id="navli">
				<li><a class="homered" href="#">HOME</a></li>
				<li><a class="homeblack" href="about.php">ABOUT</a></li>
				<li><a class="homeblack" href="elogin.php">LOG IN</a></li>
				<li><a class="homeblack" href="register.php">Registration Emp</a></li>
				
				
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>
	<div id="divimg">
		
	</div>

	
	
	

	<div style="margin-top: 175px">
		
		<h1 style="font-family: 'Lobster', cursive; font-weight: 200; font-size: 50px; margin-top: 100px; text-align: center;">Welcome to Employee Management System.</h1>
	</div>
		

	
</body>
</html>
