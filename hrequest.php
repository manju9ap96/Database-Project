
<?php
	session_start();
	if(isset($_SESSION['userid']))
		{
			?>
<?php include_once('connect_db.php');
$propertyid=$_GET['propertyid'];

$result123 = mysql_query("SELECT * FROM house 	WHERE 	propertyid='$propertyid'")or die(mysql_error());
    	while($row = mysql_fetch_array( $result123 )) {
        	
        	$propid = $row['propertyid'];
$ownerid=$row['ownerid'];

        	 }
        	 $propertyid=$_GET['propertyid'];

$result12 = mysql_query("SELECT * FROM shouse 	WHERE 	propertyid='$propertyid'")or die(mysql_error());
    	while($row = mysql_fetch_array( $result12 )) {
        	
        	$propid = $row['propertyid'];
$ownerid=$row['ownerid'];

        	 }



?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Send Requests
	</title>
	<link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100">
	<link rel="stylesheet" type="text/css" href="add.css">

</head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#ddlPassport").change(function () {
            if ($(this).val() == "sell") {
                $("#dvPassport").show();
                $("#dvPassports").hide();
            } else if ($(this).val() == "rent") {
                $("#dvPassports").show();
                $("#dvPassport").hide();
            }

        });
    });
</script>
<body>
	<center>
		<form method="post" action="hrequest.php">
			<fieldset>
				<legend><p>Fill the details</p></legend>

				<label class="field" for="ownerid">Owner id:</label><input type="varchar" readonly  name=" ownerid" value="<?php echo $ownerid; ?>"><br><br>
				<label class="field" for="propertyid">Property id:</label><input type="text"   readonly value="<?php echo $propertyid ?>" name="propertyid"></label><br><br>
		<label class="field" for="houseloction">Your name:</label></label><input type="text" name ="name"><br><br>
		<label class="field" for="area">Phone:</label><input type="varchar" name="phone">	<br><br>	
		
		<label class="field" for="area">Email id:</label><input type="varchar" name="email">	<br><br>	
		<br><br>
		 <label class="field" for="type">What to you What to do?:</label>
<select id="ddlPassport" name="type">
<option value="none">--------Select-------- </option>
    <option value="sell">Sell</option>
    <option value="rent">Rent</option>
</select>
<br><br>
		<div id="dvPassport" style="display: none">
   <label class="field" for ="">Expecting Amount:</label> 
    <input type="varchar"  value="&#8377" name="advance" id="num" required/><br><br>
</div>
<div id="dvPassports"><br>
<label class="field">Security Deposit:</label><input type="varchar" name="advance" value="&#8377">
<br>
<br>
<label class="field">Rent:</label><input type="text" name="rent" value="&#8377" required/><br><br>

</div>
		</form>
		<input type="button" name="button" value="BACK " onclick="window.location.href='viewhouseo.php'">
			<input type="submit" name="submit" value="SUBMIT">

	</center>

</body>
</html>
<?php
if (isset($_POST["submit"])){
$host="localhost";
$dbusername="root";
$password="";
$databasename="mun";
$ownerid=filter_input(INPUT_POST, 'ownerid');
$propertyid=filter_input(INPUT_POST,'propertyid');
$name=filter_input(INPUT_POST, 'name');
$phone=filter_input(INPUT_POST, 'phone');
$email=filter_input(INPUT_POST, 'email');
$advance=filter_input(INPUT_POST, 'advance');
$rent=filter_input(INPUT_POST, 'rent');
$conn=new mysqli($host,$dbusername,$password,$databasename);
if(mysqli_connect_error())
{
	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
$sql="CALL inserting('".$_POST["ownerid"]."','".$_POST["propertyid"]."','".$_POST["name"]."','".$_POST["phone"]."','".$_POST["email"]."','".$_POST["advance"]."','".$_POST["rent"]."','".$_POST["type"]."') ";
if($conn->query($sql))
{
	if(!empty($advance))
		

		header('Location: http://localhost/mun/viewshopte.php');
	

}

else
{
	echo "Error".$sql."<br>".$conn->error;
}
$conn->close();
}
?>
</body>
		 </html>
		 <?php
		 }
		 else
		 {
		 	header("Location: login.php");
		 }
		 ?>