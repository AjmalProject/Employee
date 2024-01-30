<?php
  
  $server = "localhost";
  $username = "root";
  $password = "";
  $db = "employeen";
  
  $conn = mysqli_connect($server,$username,$password,$db);
  $sql="select * from regemploye";
  $result=mysqli_query($conn,$sql);
  
  $sql2="select * from addemployee";
  $result1=mysqli_query($conn,$sql2);
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="2" style="border-collapse:collapse; width:100%">
    <caption style="color:red;font-size:60px;";> Registration Employee leaderboard</caption>
    <tr style="background-color:green;font-size:25px;font-weight:bolder;">
    <td >Emp-id </td>
    <td>First Name </td>
    <td>Email</td>
    <td>Age</td>
    <td>password</td>
    <td>Gender</td>
    
    <td>Phone Number</td>
    
    </tr>
    <?php
    while($r=mysqli_fetch_array($result))
    {
        echo"<tr >";
        echo"<td>".$r['id']."</td>";
        echo"<td>".$r['name']."</td>";
        echo"<td>".$r['email']."</td>";
        echo"<td>".$r['DOB']."</td>";
        echo"<td>".$r['password']."</td>";

        echo"<td>".$r['gender']."</td>";
      
        echo"<td>".$r['phone']."</td>";
       

    }
    ?>
    </table><br><br>
    


    <table border="2" style="border-collapse:collapse; width:100%">
    <caption style="color:red;font-size:60px;";>ADD Employee Salary status</caption>

    <tr style="background-color:green;font-size:25px;font-weight:bolder;">
    <td >Emp-id </td>
    <td>First Name </td>
    <td>Salary</td>
    <td>Hired date</td>
    <td>Bonus</td>
    <td>Department</td>
    
    
    
    </tr>
    <?php
    while($p=mysqli_fetch_array($result1))
    {
        echo"<tr >";
        echo"<td>".$p['id']."</td>";
        echo"<td>".$p['name']."</td>";
        echo"<td>".$p['salary']."</td>";
        echo"<td>".$p['hired date']."</td>";
        echo"<td>".$p['bonus']."</td>";

        echo"<td>".$p['department']."</td>";
      
        
       

    }
    ?>
    </table>



</body>
</html>
