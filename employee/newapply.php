<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="style_leave_table.css">
</head>
<body>
    <header>
		<nav>
			<h1>Employee Management System</h1>
			<ul >
				<li><a class="homered" href="index.php">HOME</a></li>
				
			</ul>
		</nav>
	</header>
    <?php

session_start();
$server = "localhost";
$username = "root";
$password = "";
$db = "employeen";

$conn = mysqli_connect($server,$username,$password,$db);

if($conn)
{
    echo "";
}
else
{
    echo "Connection failed!".mysqli_connect_error();
}

?>
   <div class="salary">
    <h2>Leave Application</h2>
    <form action="#" method="post">
       

        
     
        
        <label class="class2" for="fname">Reason <span>*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></label>
        <input class="class1" type="text" id="fname" name="reason" placeholder="Enter your Reason" required><br><br>
       
        <label class="class2" for="email">Start Date <span>*&nbsp;</span></label>
        <input class="class1" type="date" id="email" name="sdate" placeholder="Enter your Start_Date" required><br><br>
        <label class="class2" for="email">End Date <span>*&nbsp;&nbsp;</span></label>
        <input class="class1" type="date" id="email" name="edate" placeholder="Enter your End_Date" required><br><br>
        
        
    
        <input class="submit" type="submit" value="Register" name="register">
    </div>
</body>
</html>
<?php
if(isset($_POST['register']))
{
    
    $eid=$_SESSION['eid'];
    
   
    $reason=$_POST['reason'];
    $sdate=$_POST['sdate'];
    $edate=$_POST['edate'];
    //$stutas=$_POST['stutas'];
   
   
   
    $query = "INSERT INTO `employee_leave`(`eid`, `start`, `end`, `reason`, `status`) VALUES ('$eid','$sdate','$edate','$reason','Pending')";
    
    
    
    

    $data=mysqli_query($conn,$query);
    if($data)
    {
        echo"Data inserted into database";
    }
    else
    {
        echo"Failed";
    }
    
}

?>