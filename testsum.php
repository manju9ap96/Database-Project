<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="register.css" > 
    
    </head>
    
<body>
<div class="container">
    <img src="../Online Shopping/dad.png">
    <form action="testsum.php" method="post">
   
        
         
    <div class="form-input">
    <input type="text"  placeholder="Username" name="Username">
    </div>
    
     <div class="form-input">
    <input type="password" placeholder="Password" name="Password">
    </div>
         <div class="form-input">
    <input type="text" placeholder="Email" name="Email">
    </div>
    <div class="form-input">
    <input type="text" placeholder="First Name" name="FirstName">
    </div>
         <div class="form-input">
    <input type="text" placeholder="Last Name" name="Lname">
    </div>
    <div class="form-input">
    <input type="text" placeholder="Phone" name="Phone">
    </div>
         

         
        
        <input type="submit" name="submit" value="Sign_UP" >
        <br>
    <a href="#">Forget password? </a>
     </form>
    
     </div>    
    
    </body>    
</html>
<?php
session_start();
if(isset($_SESSION['userid']))
$id=$_SESSION['userid'];
$host="localhost";
$dbusername="root";
$password="";
$databasename="mun";
$ownerid=filter_input(INPUT_POST, 'Username');
$propertyid=filter_input(INPUT_POST,'Password');
$houseloction=filter_input(INPUT_POST, 'Email');
$housedesc=filter_input(INPUT_POST, 'FirstName');
$photos=filter_input(INPUT_POST, 'Lname');
$area=filter_input(INPUT_POST,'Phone');
$direction=filter_input(INPUT_POST, '');
$advance=filter_input(INPUT_POST, 'advance');
$rent=filter_input(INPUT_POST, 'rent');
if(!empty($ownerid)&&($propertyid)){
$conn=new mysqli($host,$dbusername,$password,$databasename);
if(mysqli_connect_error())
{
	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
$sql="INSERT INTO `reg` (`username`,`password`,`email`,`fname`,`lname`,`phno`) VALUES ('$propertyid','$ownerid','$houseloction','$housedesc','$photos','$area')" ;
if($conn->query($sql))
{
	#if(!empty($advance))
	echo "record inserted";

}

else
{
	echo "Error".$sql."<br>".$conn->error;
}
$conn->close();
}
else{
	echo '<span style="color:red; font-size:20px;"> "Please Compulsarily fill all fields"</span style>';
}
?>