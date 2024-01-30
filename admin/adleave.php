
<?php
  
  $server = "localhost";
  $username = "root";
  $password = "";
  $db = "employeen";
  
  $conn = mysqli_connect($server,$username,$password,$db);
  $sql="select * from employee_leave";
  $result=mysqli_query($conn,$sql);
  

  

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
    <tr style="background-color:green;font-size:15px;font-weight:bolder;">
    <td >ID </td>
    
    
    <td>Reason</td>
    <td>Start Date</td>
    <td>End Date</td>
    <td>Status</td>
   
    
    </tr>
    <?php
    while($r=mysqli_fetch_array($result))
    {
        echo"<tr >";
        echo"<td>".$r['eid']."</td>";
        
        echo"<td>".$r['reason']."</td>";
        echo"<td>".$r['start']."</td>";
        echo"<td>".$r['end']."</td>";
        echo"<td>".$r['status']."</td>";
        
        echo "<td><a href=\"approve.php?eid=$r[eid]\"  onClick=\"return confirm('Are you sure you want to Approve the request?')\">Approve</a> | <a href=\"cancel.php?id=$r[eid]\" onClick=\"return confirm('Are you sure you want to Canel the request?')\">Cancel</a></td>";
    }
    ?>
    </table>
</body>
</html>