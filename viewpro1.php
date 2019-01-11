<?php
session_start();
if(isset($_SESSION['userid']))
$id=$_SESSION['userid'];
include_once('connect_db.php');
		$man= $_GET['propertyid'];
	
		
    	$result123 = mysql_query("SELECT * FROM owner	WHERE 	ownerid='$id'")or die(mysql_error());
    	while($row = mysql_fetch_array( $result123 )) {
        	$name = $row['username'];
        	$userid = $row['ownerid'];
        	$password=$row['password'];
        	$phone=$row['phno'];
        	$email=$row['email'];
        	 }
             echo "YOu Should Create profile html page";

?>
<?php
echo $userid;
?>