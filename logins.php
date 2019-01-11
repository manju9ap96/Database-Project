<?php/*
$host="localhost";
$username="root";
$password="";
$db_name="mun";
$tab="owner";
$conn= new mysqli("$host","$username","$password")or die("cannot connect");
mysqli_select_db($conn,"$db_name")or die("cannots selecr db");
$myusername=$_POST['username'];
$mypassword=$_POST['password'];
$sql="SELECT * FROM $tab WHERE username='$myusername' and password='$mypassword'";
if($sql===false)
{
	echo "string";
}
$result= mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count==1)
{
	#echo "sucess";
	session_start();
$_SESSION['username']=$row[0];
$_SESSION['password']=$row[1];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/auth.php");
}
else
{
	echo "Failed";
}*/session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>login details</title>
	<link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100">
<link rel="stylesheet" type="text/css" href="logincss.css">

</head>

<body style="background : url(download1.jpg);background-repeat: no-repeat;background-size: 1100px 650px">
	<div>
	<i><font size="5">	<h1 style="color: rgb(102, 255, 102)">Rental Management</h1></font></i>
		<br>
		<center>	<h1>Login Failed Please Enter Correct  Details</h1>
			
		<center ><div class="loginbox"><form  method="post" action="auth.php">
			<div class="lbox">
<h1 pEnter login details</h1>


<input type="text" placeholder="User Id" name="userid">
<input type="Password" placeholder="Password" name="password"><br>
<select name="loginas">
	<option> --Login as--</option>
	<option>Owner</option>
	<option>Viewer</option>
	<option>Admin</option>
</select><br>
<div class="submit"><input type="submit" name="submit" value="Login">
<br><input type="button" value="Add New User" onclick="window.location.href='newuser.php'" />
<a href="viewhouse.php?username=<?php echo $row['username']?>"></a>

</h1>
</div>
</form>
</div>
</center></form>
</div>
</body>
</html>
<?php/*
$host="localhost";
$username="root";
$password="";
$db_name="mun";
$tab="owner";
$tab2="viewer";
$conn= new mysqli("$host","$username","$password")or die("cannot connect");
mysqli_select_db($conn,"$db_name")or die("cannots selecr db");
$myusername=filter_input(INPUT_POST, 'username');
$mypassword=filter_input(INPUT_POST, 'password');
$postion=filter_input(INPUT_POST, 'postion');
$ownerid=filter_input(INPUT_POST,'ownerid');
echo "$ownerid";
if(!empty($ownerid)and($myusername)and($mypassword)and ($postion)){
if($postion=='Viewer'){
$sql="SELECT * FROM $tab2 WHERE username='$myusername' and ownerid='$ownerid' and password='$mypassword'";
if($sql===false)
{
	echo "string";
}
$result= mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count==1)
{
	#echo "sucess";
	session_start();
$_SESSION['username']=$row[0];
$_SESSION['password']=$row[1];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/viewer.php");
}
else
{
	echo " Invalid Details or Details are not found in the Records";
}
}
else{
	$sql="SELECT * FROM $tab WHERE username='$myusername' and ownerid='$ownerid' and password='$mypassword'";
if($sql===false)
{
	echo "string";
}
$result= mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count==1)
{
	#echo "sucess";
	session_start();
$_SESSION['username']=$row[0];
$_SESSION['password']=$row[1];
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/owner.php");
}
else
{
	echo "Invalid Details or Details are not found in the Records";
}
}
}*/
session_start();
?>
