
<?php 
	

session_start();
$eid=$_SESSION['eid'];
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
 

  
 $sql = "Select * From addemployee, employee_leave Where addemployee.id = $eid and employee_leave.eid = $eid ";

	$result = mysqli_query($conn, $sql);

//echo "$sql";



?>

<html>
<head>
	<title>Employee Panel | Employee Management System</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
</head>
<body>
	
	<header>
		
			<h1>Employee Management System</h1>
			










		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Leave Satus</h2>
    	

    	<table>

			<tr>
				
				<th align = "center">Start Date</th>
				<th align = "center">End Date</th>
				
				<th align = "center">Reason</th>
				<th align = "center">Status</th>
			</tr>

			

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {
					

					echo "<tr>";
					
					
					echo "<td>".$employee['start']."</td>";
					echo "<td>".$employee['end']."</td>";
					
					echo "<td>".$employee['reason']."</td>";
					echo "<td>".$employee['status']."</td>";
					
				}


				


			?>

		</table>




   
<br>
<br>
<br>
<br>
<br>







	</div>


		</h2>


		
		
	</div>
</body>
</html>