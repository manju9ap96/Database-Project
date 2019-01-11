<?php
session_start();
if(isset($_SESSION['userid']))
$id=$_SESSION['userid'];
include_once('connect_db.php');
		$man= $_GET['propertyid'];
	
		
    	$result123 = mysql_query("SELECT * FROM shop 	WHERE 	propertyid='$man'")or die(mysql_error());
    	while($row = mysql_fetch_array( $result123 )) {
        	$photo = $row['photos'];
        	$propid = $row['propertyid'];
        	$location=$row['shoplocation'];
        	$rent=$row['rent'];
        	$area=$row['area'];
        	$advance=$row['advance'];
        	$direction=$row['direction']; }

?>

<html>
<head>
	<title>
		Update Shop
	</title>
	<link rel="stylesheet" type="text/css" href="add.css">
	<link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100">

</head>
<body>
	<center>
		<form method="post" action="updateshop.php">
			<fieldset>
				<legend><p>Edit your Shop details</p></legend>

				<label class="field" for="ownerid">Owner id:</label><input type="varchar" value="<?php include_once('connect_db.php');echo $id?>" name=" ownerid"><br><br>
				<label class="field" for="propertyid">Shop id:</label><input type="text" name="propertyid" value="<?php echo $propid;  ?>"></label><br><br>
		<label class="field" for="houseloction">Shop Location:</label></label><input type="text" value ="<?php echo $location;  ?>" name ="shoploction"><br><br>
		
		<p><label class="field" for="photos">Photos:</label><input type="file" name="images" value="<?php echo $photos;  ?>"><br><br></p>
		<label class="field" for="area">Built up area:</label><input type="varchar" name="area" value="<?php echo $area;  ?>" required/>	<br><br>	
		<label class="field" for="face">Facing:</label><select name="face" value=""><label class="field" for="house"<?php echo $direction;  ?><option>--SHOP DIRECTION--</option>
			<option>NORTH</option>
			<OPTION>SOUTH</OPTION>
			<OPTION>EAST</OPTION>
			<option>WEST</option>
					</select><br><br>
		<label class="field" for="security">Security Deposit:</label><input type="varchar" name="advance" value="<?php echo $advance;  ?>"><br><br>
		<label class="field" for="rent">Rent:</label> <input type="varchar" name="rent" value="<?php echo $rent;  ?>"><br><br>
		<labe classs=field"for="submit"> </label><input type="button" name="back"  value="CANCEL" onclick="window.location.href='viewshop.php'"></form>
			<input type="submit" name="ADD" value="UPDATE">

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
$houseloction=filter_input(INPUT_POST, 'shoploction');
$housedesc=filter_input(INPUT_POST, 'house');
$photos=filter_input(INPUT_POST, 'images');
$area=filter_input(INPUT_POST,'area');
$direction=filter_input(INPUT_POST, 'face');
$advance=filter_input(INPUT_POST, 'advance');
$rent=filter_input(INPUT_POST, 'rent');
$conn=new mysqli($host,$dbusername,$password,$databasename);
mysql_select_db('mun')or die("cannot connect to database");
 $result = mysql_query("SELECT * FROM shop	#WHERE 	ownerid='1234'")or die(mysql_error());
 $propertyid2=$propertyid;
echo "$propertyid";
if(mysqli_connect_error())
{
	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
$sql="UPDATE shop SET propertyid='$propertyid',shoplocation='$houseloction', 
photos='$photos',area='$area',direction='$direction',advance='$advance', rent='$rent' WHERE propertyid='$propertyid' ";
if($conn->query($sql)===true)
{
	if(!empty($advance))
	header('Location:viewshop.php');
}

else
{
	echo "Error".$sql."<br>".$conn->error;
}
$conn->close();

?>