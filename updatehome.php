<?php
session_start();
$id=$_SESSION['userid'];
?>
<?php
		include_once('connect_db.php');
		$man= $_GET['propertyid'];
	
		
    	$result123 = mysql_query("SELECT * FROM house 	WHERE 	propertyid='$man'")or die(mysql_error());
    	while($row = mysql_fetch_array( $result123 )) {
        	$photo = $row['photos'];
        	$propid = $row['propertyid'];

        	$location=$row['houselocation'];
        	$rent=$row['rent'];
        	$housedesc=$row['housedesc'];
        	$photos=$row['photos'];
        	$area=$row['area'];
        	$advance=$row['advance'];
        	$direction=$row['direction']; }

 ?>       	

<!DOCTYPE html>
<html>
<head>
	<title>
	Update House
	</title>
	<link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100">
	<link rel="stylesheet" type="text/css" href="add.css">

</head>
<body>
	<center>
		<form method="post" action="up2.php  ?rent='. $row['rent'].'">
			<fieldset>
				<legend><p>Edit your house details</p></legend>

				<label class="field" for="ownerid">Owner id:</label><input type="varchar" name=" ownerid" readonly value="<?php 		echo $id?>"><br><br>
				<label class="field" for="propertyid">House id:</label></label><input type="text" name ="propertyid" placeholder="" id="username" value="<?php echo $propid;  ?>"><br><br>
		
		<label class="field" for="houseloction">House Location:</label></label><input type="text" name ="houseloction"  value="<?php  echo $location; ?>"><br><br>
		<label class="field" for="housedescription">House Description:</label><select name="house" value="">
		<label class="field" for="house" <?php echo $housedesc; ?> <option>--HOUSE CONTAINS--</option>
			<option>1BHK</option>
			<OPTION>2BHK</OPTION>
			<OPTION>3BHK</OPTION>
					</select><br><br>
		<p><label class="field" for="photos">Photos:</label><input type="file" name="images" value="<?php  echo $photos; ?>"><br><br></p>
		<label class="field" for="area">Built up area:</label><input type="varchar" name="area" value="<?php echo $area ;?>" endss="Sqft">	<br><br>	
		<label class="field" for="face">Facing:</label><select name="face">
		<label class="field" for="face" <?php echo $direction; ?><option>--HOUSE DIRECTION--</option>
			<option>NORTH</option>
			<OPTION>South</OPTION>
			<OPTION>East</OPTION>
			<option>West</option>
					</select><br><br>
					
		<label class="field" for="security">Security Deposit:</label><input type="varchar" name="advance" value="<?php  echo $advance; ?>"><br><br>
		<label class="field" for="rent">Rent:</label> <input type="varchar" name="rent" value="<?php  echo $rent; ?>"><br><br>
		</form>		<labe classs=field"for="submit"> </label><input type="button" name="upload"  value="CANCEL" onclick="window.location.href='viewhouse.php'">

			<input type="submit" name="submit" value="UPDATE">

	</center>

</body>
</html>
<?php
session_start();
include_once('connect_db.php');
$host="localhost";
$dbusername="root";
$password="";
$databasename="mun";
$propertyid=filter_input(INPUT_POST,'propertyid');
$houseloction=filter_input(INPUT_POST, 'houseloction');
$housedesc=filter_input(INPUT_POST, 'house');
$photos=filter_input(INPUT_POST, 'images');
$area=filter_input(INPUT_POST,'area');
$direction=filter_input(INPUT_POST, 'face');
$advance=filter_input(INPUT_POST, 'advance');
$rent=filter_input(INPUT_POST, 'rent');
$conn=new mysqli($host,$dbusername,$password,$databasename);
mysql_select_db('mun')or die("cannot connect to database");
 $result = mysql_query("SELECT * FROM house 	#WHERE 	ownerid='1234'")or die(mysql_error());
 $propertyid2=$propertyid;
echo "$propertyid";
if(mysqli_connect_error())
{
	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
$sql="UPDATE house SET propertyid='$propertyid', houselocation='$houseloction', housedesc='$housedesc',
photos='$photos',area='$area',direction='$direction',advance='$advance', rent='$rent' WHERE propertyid='$propertyid' ";
if($conn->query($sql)===true)
{
	if(!empty($advance))
	header('Location:viewhouse.php');
}

else
{
	echo "Error".$sql."<br>".$conn->error;
}
$conn->close();

?>
