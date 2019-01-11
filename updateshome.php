<?php
session_start();
$id=$_SESSION['userid'];
?>
<?php
		include_once('connect_db.php');
		$man= $_GET['propertyid'];
	
		
    	$result123 = mysql_query("SELECT * FROM shouse 	WHERE 	propertyid='$man'")or die(mysql_error());
    	while($row = mysql_fetch_array( $result123 )) {
        	
        	$propid = $row['propertyid'];

        	$location=$row['houselocation'];
        	$housedesc=$row['housedesc'];
        	$photos=$row['images'];
        	$area=$row['area'];
        	$advance=$row['amt'];
        	$direction=$row['face']; 
        	$trans=['trans'];
        	$const=['const'];
        }

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
		<form method="post" action="updateshome.php" >
		
			<fieldset>
				<legend><p>ADD your House details</p></legend>

				<label class="field" for="ownerid">Owner id:</label><input type="varchar"  readonly value="<?php include_once('connect_db.php');echo $id?>" name=" ownerid"><br><br>
				<label class="field" for="propertyid">House id:</label><input type="text"  value="<?php echo $propid ?>" name="propertyid" required/></label><br><br>
		<label class="field" for="houseloction">House Location:</label></label><input type="text" value ="<?php echo $location?>" name ="houselocation" required/><br><br>
		<label class="field" for="housedescription">House Description:</label><select name="house" required/>
		<label class="field" for="house" value=<?php echo $housedesc ?> <option>--HOUSE CONTAINS--</option>
			<option>1BHK</option>
			<OPTION>2BHK</OPTION>
			<OPTION>3BHK</OPTION>
					</select><br><br>
		<p><label class="field" for="photos">Photos:</label><input type="file" name="images" value="<?php echo $photos?>;" required/><br><br></p>
		<label class="field" for="area">Built up area:</label><input type="varchar" name="area" value="<?php echo $area?>" required/>	<br><br>	
		<label class="field" for="face">Facing:</label><select name="face"value=<?php echo $direction ?><option>--HOUSE FACING--</option>
			<option>NORTH</option>
			<OPTION>South</OPTION>
			<OPTION>East</OPTION>
			<option>West</option>
					</select><br><br>
		<label class="field" for="tranaction">Transaction Type:</label><select name="trans"
		value=<?php echo $trans ?><option>----Transaction Type----</option>
		<option>New Property</option>
		<option>Resale</option>
		
		</select><br><br>
		<label class="field" for="Construction">Age of Construction:</label><select name="const" value=<?php echo $const ?><option>---Age of Construction---</option>
		<option>New construction</option>
		<option>Less than 5 years</option>
		<option>5 to 10 years</option>
		<option>10 to 15 years</option>
		<option>Above 15 years</option>
		</select><br><br>
		<label class="field" for="rent">Expected Price:</label> <input type="varchar" name="amt"  value="<?php echo $advance ?>" required/><br><br>
		<labe classs=field"for="submit"> </label><input type="button" name="back"  value="CANCEL" onclick="window.location.href='owner.php'"required/></form>
			<input type="submit" name=name"ADD" value="UPDATE">

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
$houseloction=filter_input(INPUT_POST, 'houselocation');
$housedesc=filter_input(INPUT_POST, 'house');
$photos=filter_input(INPUT_POST, 'images');
$area=filter_input(INPUT_POST,'area');
$direction=filter_input(INPUT_POST, 'face');
$trans=filter_input(INPUT_POST, 'trans');
$const=filter_input(INPUT_POST, 'const');
$advance=filter_input(INPUT_POST, 'amt');
$rent=filter_input(INPUT_POST, 'rent');
$conn=new mysqli($host,$dbusername,$password,$databasename);
mysql_select_db('mun')or die("cannot connect to database");
 $result = mysql_query("SELECT * FROM house 	#WHERE 	ownerid='1234'")or die(mysql_error());
 $propertyid2=$propertyid;
if(mysqli_connect_error())
{
	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
$sql="UPDATE shouse SET propertyid='$propertyid', houselocation='$houseloction', housedesc='$housedesc',
images='$photos',area='$area',face='$direction',amt='$advance' ,trans='$trans',const='$const' WHERE propertyid='$propertyid' ";
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
