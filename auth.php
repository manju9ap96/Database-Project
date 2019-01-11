<?php
$host="localhost";
$username="root";
$password="";
$db_name="mun";
$tab="owner";
$tab2="viewer";
$tab1="admin";

$conn= new mysqli("$host","$username","$password")or die("cannot connect");
mysqli_select_db($conn,"$db_name")or die("cannots selecr db");
$mypassword=$_POST['password'];
$postion=$_POST['loginas'];
$ownerid=$_POST['userid'];
session_start();
$_SESSION["userid"]=$ownerid;
#echo "Favorite color is " . $_SESSION["userid"] . ".<br>";

if($postion=='Viewer'){
$sql="SELECT * FROM $tab2 WHERE   ownerid='$ownerid' and password='$mypassword'";
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
	header('Location:logins.php');
}
}
elseif($postion=='Owner'){
	$sql="SELECT * FROM $tab WHERE  ownerid='$ownerid' and password='$mypassword'";
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
	header('Location:logins.php');
}
}
else{
	$sql="SELECT * FROM $tab1 WHERE adminid='$ownerid' and password='$mypassword'";
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
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin.php");

}
else
{
	header('Location:logins.php');
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="viewhouse.php?$username=<?php echo $myusername?>"></a>
	<?php 

	?>
</body>
</html>