  <!DOCTYPE html>
<html>
<head>
	<style >
		div.lbox{
		color: black;
		background-color:white;
		width: 40%;

	}
	</style>
	<title>New user</title>
</head>
	<center>
		<h1>Enter your Details</h1>

<body bgcolor="cornflower">
	<div class="lbox">

	<form action="newuser.php"  method="post">
<table width="450 px">
	<td>
User Name:<input type="text" name="username" required="" />
<br><br>

User id:<input type="text" name="ownerid"  placeholder ="Unique id" required />
<br><br>
Password:<input type="Password" name="password" required/>
<br><br>
Phone No:<input type="text" maxlength="10"  pattern="\d{10}" name="phno" required="Numbersonly"><br><br>

Email:<input type="email" name="email;"><br><br>
<select name= "usertype" required/>
	<option >--Type of user--</option>
	<option> owner</option>
	<option>viewer</option>
</select>

<br><br>
<input type="submit" name="submit">
<br>
<br>
<input type="button" name="submit" value="Login" onclick="window.location.href='login.php'">
</div>
</centre>
<body>

</body>
</html>
<?php
$username = filter_input(INPUT_POST, 'username'); 
$password = filter_input(INPUT_POST, 'password');
$ownerid=filter_input(INPUT_POST, 'ownerid');#owner id is not only used for owner its used as as user id keepit in mind manja;
$usertype=filter_input(INPUT_POST, 'usertype');
$email=filter_input(INPUT_POST, 'email');
$phno=filter_input(INPUT_POST, 'phno');
if($usertype=='owner')
{
if(!empty($username))
{

$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="mun";
$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);

if(mysqli_connect_error())
{
	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
$sql="INSERT INTO `owner` (`username`,`ownerid`,`password`,`phno`,`email`) VALUES ('$username','$ownerid','$password','$phno','$email')" ;
if($conn->query($sql))
{
	echo "Your details are registered you can login now";

}

else
{
	echo "Error".$sql."<br>".$conn->error;
}
$conn->close();
}

else
{
	echo "Please entre all fields";
}
}
else{if(!empty($username)&&($password)&&($usertype))
{

$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="mun";
$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);

if(mysqli_connect_error())
{
	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
$sql="INSERT INTO `viewer` (`username`,`ownerid`,`password`,`phno`,`email`) VALUES ('$username','$ownerid','$password','$phno','$email')" ;
if($conn->query($sql))
{
	echo '<span style="color:blue; font-size:15px;">Your login details are registered you can login now </span style>';
}

else
{
	echo "Error".$sql."<br>".$conn->error;
}
$conn->close();
}

else
{
	
	echo "Please entre all the fields";
}

}
?>