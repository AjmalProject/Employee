<?php
   session_start();
   
   //Sign Out code
   if(isset($_GET['sign']) and $_GET['sign']=="out") {
	$_SESSION['student_login_status']="loged out";
	unset($_SESSION['user_id']);
   header("Location:../index/indexmain.php");    
   }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="signup.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
  <h1>Welcome to Admin Home Page</h1>
  
</div>

<div class="topnav">
  <a href="addeprocess.php">Home</a>
  
  <a href="changepass.php" style="float:right">Change Password</a>
  <a href="?sign=out" style="float:right">Logout</a>
</div>

<div class="row">
<h2 align='center'>Change Your Password</h2>
  <div class="container">
  <form action="changepass.php" method="post">
    <div class="row">
    <div class="col-25">
      <label for="pass">Old Password</label>
    </div>
    <div class="col-75">
      <input type="password" id="pass" name="opass" placeholder="Your old password..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="pass">New Password</label>
    </div>
    <div class="col-75">
      <input type="password" id="pass" name="npass" placeholder="Your new password..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="pass">Confirm Password</label>
    </div>
    <div class="col-75">
      <input type="password" id="pass" name="cpass" placeholder="Retype Your password..">
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Change Password" name="submit">
  </div>
  </form>
</div>
<?php
if(isset($_POST['submit']))
{
	include("../connection.php");
    $email=$_SESSION['user_id'];
    $opass=$_POST['opass'];
    $npass=$_POST['npass'];
	$cpass=$_POST['cpass'];
	if($npass==$cpass)
	{
	$sql="select password from addemployee where password='$opass' and email='$email'";
    $r=mysqli_query($con,$sql);
    if(mysqli_num_rows($r)>0)
    {
       $sql1="update addemployee set password='$npass' where email='$email'"; 
       if(mysqli_query($con,$sql1))
       {
         echo "Password Changed Successfully!";
       }  
    }
	else
	{
		echo "Old password does not match";
	}
	}
    else
    {
        echo "New password does not match with Confirm password";
    }
}

?>
</div>
<div class="footer">
  <h2>Copyright@puc.cse</h2>
</div>

</body>
</html>
