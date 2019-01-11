<?php
session_start();
if(isset($_SESSION['userid']))
$id=$_SESSION['userid'];
$host="localhost";
$dbusername="root";
$password="";
$databasename="mun";
$ownerid=filter_input(INPUT_POST, 'ownerid');
$propertyid=filter_input(INPUT_POST,'propertyid');
$houseloction=filter_input(INPUT_POST, 'landlocation');
$photos=filter_input(INPUT_POST, 'images');
$area=filter_input(INPUT_POST,'area');
$advance=filter_input(INPUT_POST, 'advance');
$rent=filter_input(INPUT_POST, 'rent');
if(!empty($ownerid)&&($propertyid)){
$conn=new mysqli($host,$dbusername,$password,$databasename);
if(mysqli_connect_error())
{
	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
$sql="INSERT INTO `land` (`propertyid`,`ownerid`,`landlocation`,`photos`,`area`,`advance`,`rent`) VALUES ('$propertyid','$ownerid','$houseloction','$photos','$area','$advance','$rent')" ;
if($conn->query($sql))
{
	if(!empty($advance))
	echo "Your house details are Posted";

}
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
	# code...
	echo "";
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
<!DOCTYPE html>
<html>
<head>
	<title>
		Add house
	</title>
	<link rel="stylesheet" type="text/css" href="add.css">

</head>
<body>
	<center>
		<form method="post" action="addland.php" enctype="multipart/form-data">
		<input type="hidden" name="size" value="10000000">
			<fieldset>
				<legend><p>ADD your Land details</p></legend>

				<label class="field" for="ownerid">Owner id:</label><input type="varchar" value="<?php include_once('connect_db.php');echo $id?>" name=" ownerid"><br><br>
				<label class="field" for="propertyid">House id:</label><input type="text" name="propertyid"></label><br><br>
		<label class="field" for="houseloction">Land Location:</label></label><input type="text" value ="" name ="landlocation"><br><br>
		
		<p><label class="field" for="photos">Photos:</label><input type="file" name="images"><br><br></p>
		<label class="field" for="area">Total area:</label><input type="varchar" name="area">	<br><br>	
		
		<label class="field" for="security">Security Deposit:</label><input type="varchar" name="advance" value="&#8377"><br><br>
		<label class="field" for="rent">Rent:</label> <input type="varchar" name="rent" value="&#8377"><br><br>
		<labe classs=field"for="submit"> </label><input type="button" name="back"  value="CANCEL" onclick="window.location.href='owner.php'"></form>
			<input type="submit" name="ADD" value="ADD">

	</center>

</body>
</html>
