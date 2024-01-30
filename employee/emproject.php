

<?php
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





//echo "$sql";


$eid=$_SESSION['eid'];
 
$sql = "SELECT * FROM `project` where eid = '$eid'";
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
				<li><a class="homeblack" href="eloginwel.php?id=<?php echo $id?>"">HOME</a></li>
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
				<li><a class="homered" href="empproject.php?id=<?php echo $id?>"">My Projects</a></li>
				<li><a class="homeblack" href="applyleave.php?id=<?php echo $id?>"">Apply Leave</a></li>
				<li> <a href="?sign=out" style="float:right">Logout</a></li>
 
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">


		<table>
			<tr>

				<th align = "center">Project ID</th>
				<th align = "center">Project Name</th>
				<th align = "center">Due Date</th>
				<th align = "center">Sub Date</th>
				<th align = "center">Mark</th>
				<th align = "center">Status</th>
				<th align = "center">Option</th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {

					echo "<tr>";
					echo "<td>".$employee['pid']."</td>";
					echo "<td>".$employee['pname']."</td>";
					echo "<td>".$employee['duedate']."</td>";
					echo "<td>".$employee['subdate']."</td>";
					echo "<td>".$employee['mark']."</td>";
					echo "<td>".$employee['status']."</td>";
					

					 echo "<td><a href=\"psubmit.php?pid=$employee[pid]&id=$employee[eid]\">Submit</a>";

				}


			?>

		</table>

		</body>
</html>