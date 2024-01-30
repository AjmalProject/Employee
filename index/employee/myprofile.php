
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


$email=$_SESSION['user_id'];
 
  $sql = "SELECT * from addemployee WHERE email='$email'";
  
  $result = mysqli_query($conn, $sql);
  
  
 
  if($result){
  while($res = mysqli_fetch_assoc($result)){
  $name = $res['name'];
  
  $email = $res['email'];
  
  
  $sal = $res['salary'];
  $bonus = $res['bonus'];
 
  $dept = $res['department'];
  
  $pic = $res['pic'];
}
}

?>

<html>
<head>
  <title>My Profile | Employee Management System</title>
  <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="style.css" media="all">
    <link rel="stylesheet" type="text/css" href="myprofile.css">
    <link rel="stylesheet" type="text/css" href="emprofile.css">
</head>
<body>
  <header>
   
      <nav>
			<h1>Employee Management System</h1>
			<ul id="navli">
				<li><a class="homered" href="#">HOME</a></li>
     <li> <a class="homeblack"href="?sign=out" style="float:right">LOGOUT</a></li>		
				
				
			</ul>
		</nav>
  </header>
  
  <div class="divider"></div>
  

    <!-- <form id = "registration" action="edit.php" method="POST"> -->
  <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">My Info</h2>
                    <form method="POST" action="myprofileup.php?id=<?php echo $id?>" >

                        <div class="input-group">
                          <img src="../admin/adimage/<?php echo $pic;?>" height = 150px width = 150px>
                        </div>


                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                  <p> NAME</p>
                                     <input class="input--style-1" type="text" name="name" value="<?php echo $name;?>" readonly >
                                </div>
                            </div>
                            



                        <div class="input-group">
                          <p>EMAIL</p>
                            <input class="input--style-1" type="email"  name="email" value="<?php echo $email;?>" readonly>
                        </div>

                        <div class="input-group">
                          <p>BONUS</p>
                            <input class="input--style-1" type="bonus"  name="bonus" value="<?php echo $bonus;?>" readonly>
                        </div>
                       
                            
                        
                        

                        

                        <div class="input-group">
                          <p>Department</p>
                            <input class="input--style-1" type="text" name="dept" value="<?php echo $dept;?>" readonly>
                        </div>

                        <div class="input-group">
                          <p>SALARY</p>
                            <input class="input--style-1" type="text" name="sal" value="<?php echo $sal;?>" readonly>
                        </div>


                        

                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green"  name="send" > <a  href="#">back</button></a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


    
</body>
</html>