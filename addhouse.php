
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100">
</head>	<title>
		Add House for Rent
	</title>

	<link rel="stylesheet" type="text/css" href="add.css"><link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100">
<title></title>

<link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100">
<body><td><a href="owner.php"><img src="home.jpg" width="200" height="100" border="0"  /></a>
	<center>
	<?php
session_start();
if(isset($_SESSION['userid']))

$id=$_SESSION['userid'];
if (isset($_POST['ADD'])) {  #this means the next content takes only when you have entered add button only
	# code...

$host="localhost";
$dbusername="root";
$password="";
$databasename="mun";
$ownerid=filter_input(INPUT_POST, 'ownerid');
$propertyid=filter_input(INPUT_POST,'propertyid');
$houseloction=filter_input(INPUT_POST, 'houseloction');
$housedesc=filter_input(INPUT_POST, 'house');

$area=filter_input(INPUT_POST,'area');
$direction=filter_input(INPUT_POST, 'face');
$advance=filter_input(INPUT_POST, 'advance');
$rent=filter_input(INPUT_POST, 'rent');

$target="images/".basename($_FILES['image']['name']);
$photos=$_FILES['image']['name'];

if(!empty($ownerid)&&($propertyid)){
$conn=new mysqli($host,$dbusername,$password,$databasename);
if(mysqli_connect_error())
{
	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
$sql= "INSERT INTO `house` (`propertyid`,`ownerid`,`houselocation`,`housedesc`,`photos`,`area`,`direction`,`advance`,`rent`) VALUES ('$propertyid','$ownerid','$houseloction','$housedesc','$photos','$area','$direction','$advance','$rent')";
if($conn->query($sql))
{
	if(!empty($advance))

	echo '<span style="color:blue;font-size:20px;">"Your House Details are Posted "</span style>';

if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
	# code...
	echo "";
}
}

}

else
{
	echo "Error".$sql."<br>".$conn->error;
}
$conn->close();
}
else{
	#echo '<span style="color:red; font-size:20px;"> "Please Compulsarily fill all fields"</span style>';
}
?>

		<form method="post" action="addhouse.php" enctype="multipart/form-data">
		<input type="hidden" name="size" value="100000000">
			<fieldset>
				<legend><p>ADD your House details</p></legend>

				<label class="field" for="ownerid">Owner id:</label><input type="varchar" readonly value="<?php include_once('connect_db.php');echo $id?>" name=" ownerid"><br><br>
				<label class="field" for="propertyid">House id:</label><input type="text" name="propertyid" required/></label><br><br>
		<label class="field" for="houseloction">House Location:</label></label><input type="text" value ="" name ="houseloction" required/><br><br>
		<label class="field" for="housedescription">house descriotion:</label><select name="house">
		<label class="field" for="house"><option>--HOUSE CONTAINS--</option></label>
			<option>1BHK</option>
			<OPTION>2BHK</OPTION>
			<OPTION>3BHK</OPTION>
					</select><br><br>
		<p><label class="field" for="photos">Photos:</label><input type="file" name="image"><br><br></p>
		<label class="field" for="area">Built up area:</label><input type="varchar" name="area">	<br><br>	
		<label class="field" for="face">Facing:</label><select name="face" required/><label class="field" for="house"><option>--HOUSE FACING--</option>
			<option>NORTH</option>
			<OPTION>SOUTH</OPTION>
			<OPTION>EAST</OPTION>
			<option>WEST</option>
					</select><br><br>
		<label class="field" for="security">Security Deposit:</label><input type="varchar" name="advance" value="&#8377" required/><br><br>
		<label class="field" for="rent">Rent:</label> <input type="varchar" name="rent" value="&#8377" required/><br><br>
		<labe classs=field"for="submit"> </label><input type="button" name="back"  value="CANCEL" onclick="window.location.href='owner.php'" required/></form>
			<input type="submit" name="ADD" value="ADD">

	</center>

</body>
</html>
