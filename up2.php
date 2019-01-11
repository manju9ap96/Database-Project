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