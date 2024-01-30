<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="signup.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

session_start();
if(isset($_GET['sign']) && $_GET['sign'] === "out") {
 $_SESSION = array(); // Load all session variables
 // Destroy the session
 session_destroy();
 header("Location:/html2/index/indexmain.php");
 exit();
}



$server = "localhost";
$username = "root";
$password = "";
$db = "employeen";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
    echo "Connection failed!" . mysqli_connect_error();
}
?>


<div class="header">
  <h1>Welcome to Admin Home Page</h1>
  
</div>

<div class="topnav">
  <a href="home.php">Home</a>
  
  <a href="advisor1.php">Assign Manager</a>
  <a href="changepass.php" style="float:right">Change Password</a>
  <a href="?sign=out" style="float:right">Logout</a>
</div>

<div class="row">
<h2 align='center'>Assign Manager to the Employees</h2>
  <div class="container">
  <form action="advisor1.php" method="post">
    <div class="row">
  <div class="row">
    <div class="col-25">
      <label for="pass">Select a department</label>
    </div>
    <div class="col-75">
	<select name="department">
      <?php
 include("../connection.php");
 $sql="select distinct department from addemployee";
 $r=mysqli_query($con,$sql);
 
 if(mysqli_num_rows($r)>0)
 {
    
    while($row=mysqli_fetch_array($r))
    {
        $b=$row['department'];
        echo "<option value='$b'>$b</option>";
    }
 }
 else
	{
		echo "error!".mysqli_error($con);
	}

?>
</select>
    </div>
  </div>
  <br>
  <div class="row">
    <input type="submit" value="Search" name="submit">
  </div>
  </form>
</div>
<?php
if(isset($_POST['submit']))
{
	include("../connection.php");
    $department=$_POST['department'];
	$sql="select id,name from addemployee where department='$department'" ;
    $r=mysqli_query($con,$sql);
echo "<form action='advisor1.php' method='post'>";

 
 
echo "</select>";
echo "<label for='adv'>Select Manager</label><select name='adv'>";
 $sql2="select mid,name from rmanager";
 $r2=mysqli_query($con,$sql2);
 
 if(mysqli_num_rows($r2)>0)
 {
    
    while($row=mysqli_fetch_array($r2))
    {
        $mid=$row['mid'];
		$mname=$row['name'];
    
        echo "<option value='$mid'>$mname</option>";
    }
 }
 else
	{
		echo "error!".mysqli_error($con);
	}
echo "</select>";
    if(mysqli_num_rows($r)>0)
    {
echo "<table align='center'>";
echo "<tr><th>Employee Id</th><th>Employee Name</th></tr>";
              while($row=mysqli_fetch_array($r))
              {
                $s_id=$row['id'];
                $s_name=$row['name'];
                echo "<tr><td><input  type='checkbox' value='$s_id' name='id[]'/>$s_id</td>
                &nbsp;&nbsp;&nbsp;&nbsp;<td>$s_name</td></tr>";
              } 
echo "</table>";
echo "<input name='insert' type='submit' value='Assign'/>";
echo "</form>";  
}
else
{
	echo mysqli_error($con);
}
}

?>
<?php
if(isset($_POST['insert']))
      {
        $sid=$_POST['id'];
		$aid=$_POST['adv'];
    
        include("../connection.php");
        foreach($sid as $item)
        {
            $id=$item;
			$query="insert into manager values('$aid','$id')";
            mysqli_query($con,$query);
		}
		echo "Successfully Assigned!";
	  }	
		
?>
</div>
<div class="footer">
  <h2>Copyright@puc.cse</h2>
</div>

</body>
</html>