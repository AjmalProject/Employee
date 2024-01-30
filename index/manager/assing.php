<?php




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
?>


<!DOCTYPE html>
<html>

<head>
   

    
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <header>
        <nav>
            <h1>EMS</h1>
            
        </nav>
    </header>
    
    <div class="divider"></div>




    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Assign Project</h2>
                    <form action="assingup.php" method="POST" enctype="multipart/form-data">


                        

                         <div class="input-group">
                         <select class="input--style-1" id="authorid" name="eid">
                            <option value="" selected>-- Select Employee --</option>
                            <?php
                            session_start();
                            $id = $_SESSION['user_id'];
                            $sql = "SELECT SID FROM manager WHERE MID = $id";
                            $queryResult = mysqli_query($conn, $sql);

                            while ($empData = mysqli_fetch_assoc($queryResult)) {
                                echo '<option value="'.$empData['SID'].'">'.$empData['SID'].'</option>';
                            }

                            ?>
                        </select>
                        </div>





                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Project Name" name="pname" required="required">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="date" name="duedate" required="required">
                                   
                                </div>
                            </div>
                            
                        </div>
                        
                        



                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   

</body>

</html>

