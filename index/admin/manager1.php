<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "employeen";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
    echo "Connection failed!" . mysqli_connect_error();
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
  <a href="home.php">Home</a>
  <a href="course.php">Create Offer List</a>
  <a href="advisor1.php">Assign manager</a>
  <a href="changepass.php" style="float:right">Change Password</a>
  <a href="?sign=out" style="float:right">Logout</a>
</div>

<div class="row">
  <h2 align='center'>Assign manager to the Employee</h2>
  <div class="container">
    <form action="manager1.php" method="post">
      <div class="row">
        <div class="col-25">
          <label for="pass">Select department</label>
        </div>
        <div class="col-75">
          <select name="department">
            <?php
            // Assuming $conn is your database connection
            $sql = "select distinct department from addemployee";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $b = $row['department'];
                echo "<option value='$b'>$b</option>";
              }
            } else {
              echo "error!" . mysqli_error($conn);
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
  if (isset($_POST['submit'])) {
    $department = $_POST['department'];
    $sql = "select id,name from addemployee where department='$department'";
    $result = mysqli_query($conn, $sql);
    
    echo "<form action='manager1.php' method='post'>";
    echo "<select name='adv'>";
    
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        $sname = $row['name'];
        echo "<option value='$sname'>$sname</option>";
      }
    } else {
      echo "error!" . mysqli_error($conn);
    }
    
    echo "</select>";
    
    if (mysqli_num_rows($result) > 0) {
      echo "<table align='center'>";
      echo "<tr><th>employee Id</th><th>employee Name</th></tr>";
      
      while ($row = mysqli_fetch_array($result)) {
        $s_id = $row['id'];
        $s_name = $row['name'];
        echo "<tr><td><input type='checkbox' value='$s_id' name='id[]'/>$s_id</td>
        &nbsp;&nbsp;&nbsp;&nbsp;<td>$s_name</td></tr>";
      }
      
      echo "</table>";
      echo "<input name='insert' type='submit' value='Assign'/>";
      echo "</form>";
    } else {
      echo mysqli_error($conn);
    }
  }
  ?>
  
  <?php
  if (isset($_POST['insert'])) {
    $sid = $_POST['id'];
    $aid = $_POST['adv'];
    
    include("../connection.php");
    
    foreach ($sid as $item) {
      $id = $item;
      $query = "insert into manager (manager_id, employee_id) values ('$aid', '$id')";
      mysqli_query($conn, $query);
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