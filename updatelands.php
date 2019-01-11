
 
<?php
session_start();
if(isset($_SESSION['userid']))
$id=$_SESSION['userid'];
?>
<?php
        include_once('connect_db.php');
        $man= $_GET['propertyid'];
    
        
        $result123 = mysql_query("SELECT * FROM land   WHERE   propertyid='$man'")or die(mysql_error());
        while($row = mysql_fetch_array( $result123 )) {
            $photo = $row['photos'];
            $propid = $row['propertyid'];
            $location=$row['landlocation'];
            $rent=$row['rent'];
            $photos=$row['photos'];
            $area=$row['area'];
            $advance=$row['amount'];
            $direction=$row['direction']; }

 ?> <!DOCTYPE html>
<html>
<head>
	<title>Update Lands</title>
    <link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100">
    <link rel="stylesheet" type="text/css" href="add.css">
</head><script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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
    
        <form method="post" action="updatelands.php">
            <fieldset>
                <legend><p>Edit your Land details</p></legend>

                <label class="field" for="ownerid">Owner id:</label><input type="varchar" value="<?php include_once('connect_db.php');echo $id?>" name=" ownerid"><br><br>
                <label class="field" for="propertyid">House id:</label><input type="text" name="propertyid" value="<?php echo $propid;  ?>"></label><br><br>
        <label class="field" for="houseloction">Land Location:</label></label><input type="text" value ="<?php echo $location;  ?>" name ="landlocation" ><br><br>
        
        <p><label class="field" for="photos">Photos:</label><input type="file" name="images" value="<?php echo $photos;  ?>"><br><br></p>
        <label class="field" for="area">Total area:</label><input type="varchar" name="area" value="<?php echo $area;  ?>">   <br><br>    
        <span>What to you What to do?</span>
<select id="ddlPassport" name="type" value="<?php echo $type;  ?>">
<option value="none">Select </option>
    <option value="sell">Sell</option>
    <option value="rent">Rent</option>
</select>
<br><br>

<div id="dvPassport" style="display: none">
    Expecting Amount:
    <input type="varchar"  name ="amt" id="num"  value="<?php echo $advance;  ?>" />
</div>
<div id="dvPassports"><br>
Security Deposit:<input type="varchar" name="advance" value="<?php echo $advance;  ?>">
<br>
<br>
Rent:<input type="text" name="rent" value="<?php echo $rent;  ?>">
<br><br>
</div>
        <label classs=field"for="submit"> </label><input type="button" name="back"  value="CANCEL" onclick="window.location.href='viewland.php'"></form>
            <input type="submit" name="UPDATE" value="UPDATE">

    </center>


</body>
</html>
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
$location=filter_input(INPUT_POST, 'landlocation');
$photos=filter_input(INPUT_POST, 'images');
$area=filter_input(INPUT_POST,'area');
$advance=filter_input(INPUT_POST, 'advance');
$rent=filter_input(INPUT_POST, 'rent');
$type=filter_input(INPUT_POST,'amt');
if(!empty($ownerid)&&($propertyid)){
$conn=new mysqli($host,$dbusername,$password,$databasename);
if(mysqli_connect_error())
{
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
$sql="UPDATE land SET propertyid='$propertyid', landlocation='$location', 
photos='$photos',area='$area',amount='$type', rent='$rent' WHERE propertyid='$propertyid' "; ;
if($conn->query($sql))
{
    if(!empty($advance))
    header('Location:viewland.php');

}

else
{
    echo "Error".$sql."<br>".$conn->error;
}
$conn->close();
}
else{
   # echo '<span style="color:red; font-size:20px;"> "Please Compulsarily fill all fields"</span style>';
}
?> 