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
        <legend>Employee Registration Form</legend>
        <label class="class2" for="id">ID <span>*</span></label>
        <input class="class1" type="id" id="id"name="id" placeholder="Enter your ID" required><br><br>
        <label class="class2" for="name"> Name <span>*</span></label>
        <input class="class1" type="text" id="fname"name="name" placeholder="Enter your Name" required><br><br>
        
        <label class="class2" for="email">Email <span>*</span></label>
        <input class="class1" type="email" id="email"name="email" placeholder="Enter your Email" required><br><br>
        <label class="class2" for="age">birthdate<span>*</span></label>
        <input class="class1" type="date" id="age"name="age" placeholder="Enter your birthdate" required><br><br>
        <label class="class2" for="password">Password <span>*</span></label>
        <input class="class1" type="password" id="password"name="password" placeholder="Enter your Password" required><br><br>
        <label class="class2" for="gender">Gender</label><br>
        <input  type="radio" id="gender" name="gender" value="male" > <span id="m1">Male</span>
        <input  type="radio" id="gender" name="gender" value="female"><span id="m1">Female</span> <br><br>
        <label class="class2" for="phone">Phone Number</label>
        <input class="class1" type="number" id="phone"name="pnumber" placeholder="Enter your Phone Number"><br><br>
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
   
    $email=$_POST['email'];
    $age=$_POST['age'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $pnumber=$_POST['pnumber'];

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
	 
    
    $query="insert into regemploye values('$id','$name','$email',' $age','$password','$gender','$pnumber','$image')";

    $data=mysqli_query($conn,$query);
    if($data)
    {
        echo("Data inserted into database");
        
        if($image !=null){
            move_uploaded_file($_FILES['pic']['tmp_name'],"Simage/$image");
            }
}
else
{
echo "error!".mysqli_error($con);
}
}
?>