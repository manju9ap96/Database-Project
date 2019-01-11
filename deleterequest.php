<?php
session_start();
include_once('connect_db.php');
$host="localhost";
$dbusername="root";
$password="";
$databasename="mun";
$conn=new mysqli($host,$dbusername,$password,$databasename);
mysql_select_db('mun')or die("cannot connect to database");
if(mysqli_connect_error())
{
	die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
}
$propertyid=$_GET['propertyid'];
$sql="delete from requestS where propertyid='$propertyid'";
if($conn->query($sql)){
//$rows=mysql_fetch_assoc($result);
header('Location:requestowner.php');}
?>


