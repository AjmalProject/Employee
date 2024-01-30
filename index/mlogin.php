<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="signup.css">
<link rel="stylesheet" href="login.css">
</head>
<body>

<div class="header">
  <h1>Login Form</h1>
</div>

<div class="row">
  <div class="container">
  <form action="login.php" method="post">
  <div class="row">
    <div class="col-25">
      <label for="userid">User ID</label>
    </div>
    <div class="col-75">
      <input type="text" id="uid" name="id" placeholder="User ID...">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="password">Password</label>
    </div>
    <div class="col-75">
      <input type="password" id="pass" name="pass" placeholder="Password">
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Signin" name="login">
  </div>
  </form>
</div>
</div>

<div class="footer">
  <h2>Copyright@puc.cse</h2>
  
</div>

</body>
</html>

<?php
include("connection.php");
if(isset($_POST['login']))
{
	$id=$_POST['id'];
	$pass=$_POST['pass'];

	$sql="select mid,password from rmanager where mid='$id' and password='$pass'";
    
            $mr=mysqli_query($con,$sql);
            
            if(mysqli_num_rows($mr)==1)
            {
                $_SESSION['user_id']=$id;
                
                header("Location:manager/mhome.php");
            }
           
            else
            {
                echo "<p style='color: red;'>Incorrect UserId or Password</p>";
            }
	
}
?>