<?php
	session_start();
	if(isset($_SESSION['userid']))
		{
			?>

<!DOCTYPE html>
<html>

<head>
<title>Requests</title>
<link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100"><link rel="stylesheet" type="text/css" href="table.css"></head>
	

	<body>
	<td><a href="owner.php"><img src="home.jpg" width="200" height="100" border="0"  /></a></td>
		<?php 
		
        include_once('connect_db.php');
include_once('connect_db.php');
session_start();
if(isset($_SESSION['userid']))
$id=$_SESSION['userid'];
       $result = mysql_query("SELECT * FROM requests 	WHERE 	ownerid='$id'")or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='10'align='center'>";
        echo "<tr> <th>Property Id </th> <th>Name</th> <th>Phone</th><th>Email</th><th>Security Deposit</th><th>Rent</th><th>Delete</th></tr>";
 echo "<p align='center'> <font color=blue  size='6pt'>Your Requests are</font> </p>";  
        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                // echo out the contents of each row into a table
                echo "<tr>";
				echo '<td>' . $row['propertyid'] . '</td>';
				echo '<td>' . $row['name'] . '</td>';
				 echo '<td>' . $row['phone'] . '</td>';
				 echo '<td>' . $row['email'] . '</td>';
				echo '<td>' . $row['advance'] . '</td>';
				echo '<td>' . $row['rent'] . '</td>';
			?>

				<td><a href="deleterequest.php?propertyid=<?php echo  $row['propertyid'] ?>"><img src="delete-icon.png" width="105" height="55" border="0" /></a></td> 
				<?php
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