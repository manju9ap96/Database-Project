
<?php
    session_start();
    if(isset($_SESSION['userid']))
        {
            ?>
            <!DOCTYPE html>
<html>
<head>
	<title>Add Lands</title>
    <link rel="stylesheet" type="text/css" href="add.css">
    <link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100">
    <a href="owner.php"><img src="home.jpg" width="200" height="100" border="0"  /></a>
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
$houseloction=filter_input(INPUT_POST, 'landlocation');
$photos=filter_input(INPUT_POST, 'images');
$area=filter_input(INPUT_POST,'area');
$advance=filter_input(INPUT_POST, 'advance');
$rent=filter_input(INPUT_POST, 'rent');
$type=filter_input(INPUT_POST,'type');
if(!empty($ownerid)&&($propertyid)){
$conn=new mysqli($host,$dbusername,$password,$databasename);
if(mysqli_connect_error())
{
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
$sql="INSERT INTO `land` (`propertyid`,`ownerid`,`landlocation`,`photos`,`area`,`amount`,`rent`,`type`) VALUES ('$propertyid','$ownerid','$houseloction','$photos','$area','$advance','$rent','$type')" ;
if($conn->query($sql))
{
    if(!empty($advance))
   echo '<span style="color:blue;font-size:20px;">"Your Land Details are Posted"</span style>';

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
        <form method="post" action="addlands.php" enctype="multypart/form-data">
        <input type="hidden" name="size" value="1000000">
            <fieldset>
                <legend><p>ADD your Land details</p></legend>

                <label class="field" for="ownerid">Owner id:</label><input type="varchar" readonly value="<?php include_once('connect_db.php');echo $id?>" name=" ownerid"><br><br>
                <label class="field" for="propertyid">Land id:</label><input type="text" name="propertyid" required/></label><br><br>
        <label class="field" for="houseloction">Land Location:</label></label><input type="text" value ="" name ="landlocation"><br><br>
        
        <p><label class="field" for="photos">Photos:</label><input type="file" name="images"><br><br></p>
        <label class="field" for="area">Total area:</label><input type="varchar" name="area" required/>   <br><br>    
        <label class="field" for="type">What to you What to do?:</label>
<select id="ddlPassport" name="type">
<option value="none">--------Select-------- </option>
    <option value="sell">Sell</option>
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

</div>
<br><br>
        <label classs=field"for="submit"> </label><input type="button" name="back"  value="CANCEL" onclick="window.location.href='owner.php'"></form>
            <input type="submit" name="ADD" value="ADD">

    </center>


</body>
</html>
</body>
         </html>
         <?php
         }
         else
         {
            header("Location: login.php");
         }
         ?>
