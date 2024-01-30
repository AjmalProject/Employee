<!DOCTYPE html>
<html>
<head>
	<title>Log In | Employee Management System</title>
	<link rel="stylesheet" type="text/css" href="login.css">
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
				<li><a class="homeblack" href="indexmain.php">HOME</a></li>
				<li><a class="homered" href="managerlogin.php">manager Login</a></li>
				
			</ul>
		</nav>
	</header>
	<div class="divider"></div>

	<div class="loginbox">
	<img src="image/avatar.jpg" class="avatar">
        <h1>Login Here</h1>
        <form action="manager/mprocess.php" method="POST">
            <p>USE ID</p>
            <input type="id" name="id" placeholder="Enter your id" required="required">
            <p>Password</p>
            <input type="password" name="pwd" placeholder="Enter Password" required="required">
            <input type="submit" name="login-submit" value="Login">
           
			<div class="footer ">
  
				<p>don't have an account?</p><h1><a href="mregister.php">Register manager</a></h1>
				
				  
				</div>
           
        </form>
        
    </div>
</body>
</html>
