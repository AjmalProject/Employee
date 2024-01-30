<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="regN.css">
</head>
<body>
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
    <form action="#" method="POST" enctype="multipart/form-data">
        <fieldset>
        <legend>Admin Registration Form for Employee</legend>
        <label class="class2" for="id">EID <span>*</span></label>
        <input class="class1" type="id" id="id"name="id" placeholder="Enter Employee ID" required><br><br>
        <label class="class2" for="name"> Name <span>*</span></label>
        <input class="class1" type="text" id="fname"name="name" placeholder="Enter Employee Name" required><br><br>
        <label class="class2" for="email">Email <span>*</span></label>
        <input class="class1" type="email" id="email"name="email" placeholder="Enter your Email" required><br><br>

        <label class="class2" for="num"> salary <span>*</span></label>
        <input class="class1" type="num" id="num"name="sal" placeholder="Enter  salary" required><br><br>
        <label class="class2" for="num"> hired date <span>*</span></label>
        <input class="class1" type="date" id="num"name="hd" placeholder="Enter  hire date" required><br><br>
        <label class="class2" for="num"> bonus <span>*</span></label>
        <input class="class1" type="num" id="num"name="bo" placeholder="Enter  bonus" required><br><br>
        <label class="class2" for="name"> Department <span>*</span></label>
        <input class="class1" type="text" id="name"name="de" placeholder="Enter department" required><br><br>

        <label class="class2" for="password">Password <span>*</span></label>
        <input class="class1" type="password" id="password"name="password" placeholder="Enter your Password" required><br><br>
        <label class="class2" for="image">image<span>*</span></label>
        <input class="class1" type="file" id="image"name="pic" >
        
        <input class="submit" type="Submit"value="Submit" name="submit">
    </fieldset>
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
   
    $sal=$_POST['sal'];
   
    $hd=$_POST['hd'];
    $bo=$_POST['bo'];
    $hd=$_POST['hd'];
    $de=$_POST['de'];
    $password=$_POST['password'];
    $email=$_POST['email'];
     //customer id generation
	$num=rand(10,100);
	$cus_id="c-".$num;
	
	//image upload code
	$ext= explode(".",$_FILES['pic']['name']);
    $c=count($ext);
    $ext=$ext[$c-1];
    $date=date("D:M:Y");
    $time=date("h:i:s");
    $image_name=md5($date.$time.$cus_id);
    $image=$image_name.".".$ext;
    
    $query="insert into addemployee values('$id','$name','$sal',' $hd','$bo','$de','$password','$image', '$email')";

    $data=mysqli_query($conn,$query);
    if($data)
    {
        echo"Data inserted into database";
        if($image !=null){
            move_uploaded_file($_FILES['pic']['tmp_name'],"adimage/$image");
            }
        
}
    
    else
    {
        echo "error!".mysqli_error($con);
    }

}

?>