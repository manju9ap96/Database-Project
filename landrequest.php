<?php
	session_start();
	if(isset($_SESSION['userid']))
		{
			?>


<?php include_once('connect_db.php');
$propertyid=$_GET['propertyid'];

$result123 = mysql_query("SELECT * FROM land 	WHERE 	propertyid='$propertyid'")or die(mysql_error());
    	while($row = mysql_fetch_array( $result123 )) {
        	
        	$propid = $row['propertyid'];
$ownerid=$row['ownerid'];

        	 }



?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100">
	<title>
		Land Requests
	</title>
	<link rel="stylesheet" type="text/css" href="add.css">
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
<script type="text/javascript">
function preback(){window.history.forward();}
setTimeout("preback()",0);
window.onunload=function(){null};
</script>


</head>
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
		 <label class="field" for="type">What to you What to do?:</label>
<select id="ddlPassport" name="type">
<option value="none">--------Select-------- </option>
    <option value="sell">Buy</option>
    <option value="rent">Rent</option>
</select>
<br><br>

<div id="dvPassport" style="display: none">
   <label class="field" for ="">Expecting Amount:</label> 
    <input type="varchar"  value="&#8377" id="num" required/>
</div>
<div id="dvPassports"><br>
<label class="field">Security Deposit:</label><input type="varchar" name="advance" value="&#8377">
<br>
<br>
<label class="field">Rent:</label><input type="text" name="rent" value="&#8377" required/>	
		
		</form><br><br></div>
		<br>
		<input type="button" name="button" value="BACK " onclick="window.location.href='viewlandte.php'">
			<input type="submit" name="submit" value="SUBMIT">

	</center>

</body>
</html>
<?php
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
$shop=filter_input(INPUT_POST, 'type');
$conn=new mysqli($host,$dbusername,$password,$databasename);
if(mysqli_connect_error())
{
	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
$sql="INSERT INTO `requests` (`ownerid`,`propertyid`,`name`,`phone`,`email`,`advance`,`rent`,`type`) VALUES ('$ownerid','$propertyid','$name','$phone','$email','$advance','$rent','$shop')" ;
if($conn->query($sql))
{
	if(!empty($advance))
		

		header('Location: http://localhost/mun/viewlandte.php');
	

}

else
{
	echo "Error".$sql."<br>".$conn->error;
}
$conn->close();

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