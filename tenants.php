
<!DOCTYPE html>
<html>
<head>
	<title>
		Add Tenants
	</title>
	<link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100">
	<link rel="stylesheet" type="text/css" href="add.css">
	<a href="owner.php"><img src="home.jpg" width="200" height="100" border="0"  /></a></head>


</head>
<?php
session_start();
if(isset($_SESSION['userid']))
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
$houseloction=filter_input(INPUT_POST, 'houseloction');
$housedesc=filter_input(INPUT_POST, 'house');
$photos=filter_input(INPUT_POST, 'images');
$area=filter_input(INPUT_POST,'area');
$direction=filter_input(INPUT_POST, 'face');
$advance=filter_input(INPUT_POST, 'advance');
$rent=filter_input(INPUT_POST, 'rent');
$date=filter_input(INPUT_POST,'date');
$year=filter_input(INPUT_POST, 'year');
$prop=filter_input(INPUT_POST, 'prop');
if(!empty($ownerid)&&($propertyid)){
$conn=new mysqli($host,$dbusername,$password,$databasename);
if(mysqli_connect_error())
{
	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
$sql="INSERT INTO `tenants` (`ownerid`,`propertyid`,`name`,`phno`,`email`,`houselocation`,`property`,`housedesc`,`photos`,`area`,`advance`,`rent`,`datein`,`dateout`) VALUES ('$ownerid','$propertyid','$name','$phno','$email','$houseloction','$prop','$housedesc','$photos','$area','$advance','$rent','$date','$year')" ;
if($conn->query($sql))
{
	if(!empty($advance))
	   echo '<span style="color:blue; align:center;font-size:20px;">"Your Tentants Details are Added"</span style>';


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
		<form method="post" action="tenants.php" enctype="multypart/form-data">
		<input type="hidden" name="size" value="10000000">
			<fieldset>
				<legend><p>ADD your Tenants details</p></legend>

				<label class="field" for="ownerid">Owner id:</label><input type="varchar" value="<?php include_once('connect_db.php');echo $id?>" name=" ownerid"><br><br>
				<label class="field" for="name">Tenant Name:</label><input type="varchar"  name="name" required/>	<br><br>	
				<label class="field" for="area">Tenant Phno:</label><input type="varchar" name="phno" required/>	<br><br>	
				<label class="field" for="area">Tenant Email:</label><input type="email" name="email" required/>	<br><br>	
					<label class="field" for="housedescription">Property is:</label>
		<select id="" name="prop">
		<option>------SELECT------</option>
			<option>HOUSE</option>
			<OPTION>SHOP</OPTION>
			<option>LAND</option>
			
					</select><br><br>
				<label class="field" for="propertyid">House/Shop id:</label><input type="text"  placeholder="Unique Id" name="propertyid" required/></label><br><br>
		<label class="field" for="houseloction">House/Shop Location:</label></label><input type="text" value ="" placeholder="Place" name ="houseloction" required/><br><br>
		<label class="field" for="housedescription">Rental Type:</label>
		<select id="type" name="house">
		<option>------SELECT------</option>
			<option>RENT</option>
			<OPTION>LEASE</OPTION>
			
					</select><br><br>
		<p><label class="field" for="photos">Photos:</label><input type="file" name="images"><br><br></p>
		<label class="field" for="area">Built up area:</label><input type="varchar" placeholder="In Sqft" name="area" required/>	<br><br>	
		
		<label class="field" for="security">Security Deposit:</label><input type="varchar" name="advance" value="&#8377" required/><br><br>
		<div id="rent">
		<label class="field" for="rent">Rent:</label> <input type="varchar" name="rent" value="&#8377" required/><br><br></div>
		<label class="field" for="area">Date of Agrement:</label><input type="date" name="date" required/>	<br><br>
		<label class="field" for="">Valid till:</label><input type="date" name="year">	<br><br>		
		<labe classs=field"for="submit"> </label><input type="button" name="back"  value="CANCEL" onclick="window.location.href='tenantview.php'"></form>
			<input type="submit" name="ADD" value="ADD">

	</center>

</body>

<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
