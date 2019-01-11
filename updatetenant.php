<?php
session_start();
if(isset($_SESSION['userid']))
$id=$_SESSION['userid'];
?>
<?php
		include_once('connect_db.php');
		$man= $_GET['propertyid'];
	
		
    	$result123 = mysql_query("SELECT * FROM tenants 	WHERE 	propertyid='$man'")or die(mysql_error());
    	while($row = mysql_fetch_array( $result123 )) {
        	$photos = $row['photos'];
        	$propid = $row['propertyid'];

        	$location=$row['houselocation'];
        	$rent=$row['rent'];
        	$housedesc=$row['housedesc'];
        	$name=$row['name']; 
        	$area=$row['area'];
        	$advance=$row['advance'];
        	$phno=$row['phno'];
        	$email=$row['email'];
        	$type=$row['property'];
        	$datein=$row['datein'];
        	$dateout=$row['dateout'];
        	$ownerid=$row['ownerid'];	
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#type").change(function () {
            if ($(this).val() == "RENT") {
                $("#rent").show();
                
            } else  {
                
                $("#rent").hide();
            }

        });
    });
</script>
<body>
	<center>
		<form method="post" action="updatetenant.php">
			<fieldset>
				<legend><p>ADD your Tenants details</p></legend>

				<label class="field" for="ownerid">Owner id:</label><input type="varchar" value="<?php include_once('connect_db.php');echo $id?>" name=" ownerid"><br><br>
				<label class="field" for="name">Tenant Name:</label><input type="varchar"    name="name" value="<?php  echo $name;?>">	<br><br>	
				<label class="field" for="area">Tenant Phno:</label><input type="varchar"  value="<?php echo $phno;  ?>" name="phno">	<br><br>	
				<label class="field" for="area">Tenant Email:</label><input type="varchar" value="<?php echo $email;  ?>" name="email">	<br><br>	
					<label class="field" for="housedescription">Property is:</label>
		<select id="" name="prop">
		<label class="field" for="face" ><option><?php echo $type;  ?></option>
		
			<option>HOUSE</option>
			<OPTION>SHOP</OPTION>
			<option>LAND</option>
			
					</select><br><br>
				<label class="field" for="propertyid">House/Shop id:</label><input type="text" value=" <?php echo $propid; ?>" placeholder="Unique Id" name="propertyid"></label><br><br>
		<label class="field" for="houseloction">House/Shop Location:</label></label><input type="text" value ="<?php echo $location;  ?>" placeholder="Place" name ="houseloction"><br><br>
		<label class="field" for="housedescription">Rental Type:</label>
		<select id="type" name="house">
		<option><?php echo $housedesc;  ?></option>
			<option>RENT</option>
			<OPTION>LEASE</OPTION>
			
					</select><br><br>
		<p><label class="field" for="photos">Photos:</label><input type="file" name="images"><br><br></p>
		<label class="field" for="area">Built up area:</label><input type="varchar" placeholder="In Sqft" value="<?php echo $area;  ?>" name="area">	<br><br>	
		
		<label class="field" for="security">Security Deposit:</label><input type="varchar" name="advance" value="<?php echo $advance;  ?>"><br><br>
		<div id="rent">
		<label class="field" for="rent">Rent:</label> <input type="varchar" name="rent" value="<?php echo $rent;  ?>"><br><br></div>
		<label class="field" for="area">Date of Agrement:</label><input type="date" value="<?php echo $datein;  ?>" name="date">	<br><br>
		<label class="field" for="">Valid till:</label><input type="date"  value="<?php echo $dateout;  ?>" name="year">	<br><br>		
		<labe classs=field"for="submit"> </label><input type="button" name="back"  value="CANCEL" onclick="window.location.href='owner.php'"></form>
			<input type="submit" name="UPDATE" value="UPDATE">

	</center>
</labe></select></fieldset></form></center></body></html>
</body>

</html>
<?php
session_start();
if(isset($_SESSION['userid']))
	include_once('connect_db.php');
		$man= $_GET['propertyid'];
		echo $man;
$id=$_SESSION['userid'];
$host="localhost";
$dbusername="root";
$password="";
$databasename="mun";
$ownerid=filter_input(INPUT_POST, 'ownerid');
$name=filter_input(INPUT_POST,'name');
$phno=filter_input(INPUT_POST, 'phno');
$email=filter_input(INPUT_POST, 'email');
$propertyid=filter_input(INPUT_POST,'propertyid');
echo $propertyid;
$houseloction=filter_input(INPUT_POST, 'houseloction');
echo $houseloction;
$housedesc=filter_input(INPUT_POST, 'house');
$photos=filter_input(INPUT_POST, 'images');
$area=filter_input(INPUT_POST,'area');
$direction=filter_input(INPUT_POST, 'face');
$advance=filter_input(INPUT_POST, 'advance');
$rent=filter_input(INPUT_POST, 'rent');
$date=filter_input(INPUT_POST,'date');
$year=filter_input(INPUT_POST, 'year');
$prop=filter_input(INPUT_POST, 'propertyid');
echo $name;
if(!empty($ownerid)&&($propertyid)){
$conn=new mysqli($host,$dbusername,$password,$databasename);
if(mysqli_connect_error())
{
	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
$sql="UPDATE `tenants` SET propertyid='$propertyid', houselocation='$houseloction', housedesc='$housedesc',
photos='$photos',area='$area',advance='$advance', rent='$rent' WHERE propertyid='$man' ";
if($conn->query($sql)===true)
{
	#if(!empty($advance))
	#header('Location:tenantview.php');
#
	echo "s";
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