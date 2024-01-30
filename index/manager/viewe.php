
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





//echo "$sql";


$id=$_SESSION['user_id'];
 
$sql = "SELECT * FROM manager where MID= '$id'";
$result = mysqli_query($conn, $sql);
  
 
  ?>

<html>
<head>
	<title>Employee Panel | Employee Management System</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	
	<header>
		<nav>
			<h1>Employee Management System</h1>
			<ul id="navli">
				<li><a class="homeblack" href="managerwel.php?id=<?php echo $id?>"">HOME</a></li>
				<li><a class="homeblack" href="assing.php">ASSIGN Projects</a></li>
				<li><a class="homered" href="empproject.php?id=<?php echo $id?>"">MY PROFILE</a></li>
				<li><a class="homeblack" href="mproject.php">PROJECT STATUS</a></li>
				<li><a class="homeblack" href="managerwel.php">LOG OUT</a></li>
				
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">


		<table>
			<tr>

				<th align = "center">MANAGER ID</th>
				<th align = "center">EMPLOYEE ID</th>
				
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {

					echo "<tr>";
					echo "<td>".$employee['MID']."</td>";
					echo "<td>".$employee['SID']."</td>";
					
					

					

				}


			?>

		</table>

		</body>
</html>