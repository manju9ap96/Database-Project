
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100">
<td><a href="owner.php"><img src="home.jpg" width="200" height="100" border="0"  /></a>
	<title>Sell House</title>
</head>
<body><link rel="stylesheet" type="text/css" href="add.css"><link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100">
<center>
<?php
session_start();
if(isset($_SESSION['userid']))
$id=$_SESSION['userid'];
$host="localhost";
$dbusername="root";
$password="";
$databasename="mun";
$ownerid=filter_input(INPUT_POST,'ownerid');
$propertyid=filter_input(INPUT_POST,'propertyid');
$location=filter_input(INPUT_POST, 'houselocation');
$desc=filter_input(INPUT_POST, 'house');
$photos=filter_input(INPUT_POST,'images');
$area=filter_input(INPUT_POST, 'area');
$face=filter_input(INPUT_POST, 'face');
$trans=filter_input(INPUT_POST, 'trans');
$const=filter_input(INPUT_POST, 'const');
$amt=filter_input(INPUT_POST, 'amt');
if(!empty($ownerid)&&($propertyid)){
$conn=new mysqli($host,$dbusername,$password,$databasename);
if(mysqli_connect_error())
{
	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
$sql="INSERT INTO `shouse` (`propertyid`,`ownerid`,`houselocation`,`housedesc`,`images`,`area`,`face`,`trans`,`const`,`amt`) VALUES ('$propertyid','$ownerid','$location','$desc','$photos','$area','$face','$trans','$const','$amt')" ;
if($conn->query($sql))
{
	if(!empty($amt))
	echo '<span style="color:blue;font-size:20px;">"Your House Details are Posted"</span style>';
}

else
{
	echo "Error".$sql."<br>".$conn->error;
}
$conn->close();
}

else{
	#if(empty($ownerid))
	#echo '<span style="color:red; font-size:20px;"> "Please Compulsarily fill all fields"</span style>';
}
?>
		<form method="post" action="sellhouse.php">
		
			<fieldset>
				<legend><p>ADD your House details</p></legend>

				<label class="field" for="ownerid">Owner id:</label><input type="varchar"  readonly value="<?php include_once('connect_db.php');echo $id?>" name=" ownerid"><br><br>
				<label class="field" for="propertyid">House id:</label><input type="text" name="propertyid" required/></label><br><br>
		<label class="field" for="houseloction">House Location:</label></label><input type="text" value ="" name ="houselocation" required/><br><br>
		<label class="field" for="housedescription">House Description:</label><select name="house" required/>
		<label class="field" for="house"><option>--HOUSE CONTAINS--</option>
			<option>1BHK</option>
			<OPTION>2BHK</OPTION>
			<OPTION>3BHK</OPTION>
					</select><br><br>
		<p><label class="field" for="photos">Photos:</label><input type="file" name="images" ><br><br></p>
		<label class="field" for="area">Built up area:</label><input type="varchar" name="area" required/>	<br><br>	
		<label class="field" for="face">Facing:</label><select name="face"><option>--HOUSE FACING--</option>
			<option>NORTH</option>
			<OPTION>South</OPTION>
			<OPTION>East</OPTION>
			<option>West</option>
					</select><br><br>
		<label class="field" for="tranaction">Transaction Type:</label><select name="trans" placeholder="Select Transaction Type" required/>
		<option>----Transaction Type----</option>
		<option>New Property</option>
		<option>Resale</option>
		
		</select><br><br>
		<label class="field" for="Construction">Age of Construction:</label><select name="const" placeholder="Select Transaction ">
		<option>---Age of Construction---</option>
		<option>New construction</option>
		<option>Less than 5 years</option>
		<option>5 to 10 years</option>
		<option>10 to 15 years</option>
		<option>Above 15 years</option>
		</select><br><br>
		<label class="field" for="rent">Expected Price:</label> <input type="varchar" name="amt" value="&#8377" required/><br><br>
		<labe classs=field"for="submit"> </label><input type="button" name="back"  value="CANCEL" onclick="window.location.href='owner.php'"required/></form>
			<input type="submit" name=name"ADD" value="ADD">

	</center>
	
</form>
</body>
</html>

