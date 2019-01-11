	<html>
	<head><link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100"><link rel="stylesheet" type="text/css" href="table.css"></head><title>View Shops</title>
	<body><td><a href="owner.php"><img src="home.jpg" width="200" height="100" border="0"  /></a></td><?php 
		
        include_once('connect_db.php');
include_once('connect_db.php');
session_start();
if(isset($_SESSION['userid']))
$id=$_SESSION['userid'];
       $result = mysql_query("SELECT * FROM shop 	WHERE 	ownerid='$id'")or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='10'align='center'>";
        echo "<tr> <th>Photos</th><th>Property Id </th> <th>Shoplocation</th><th>Built up area</th><th>Facing</th><th>Advance</th><th>Rent</th><th>Update</th><th>Delete</th></tr>";
        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                // echo out the contents of each row into a table
                echo "<tr>";
				echo "<td> <img src='images/".$row['photos']."' height='130' width='150'></td>";
				echo '<td>' . $row['propertyid'] . '</td>';
				 echo '<td>' . $row['shoplocation'] . '</td>';
				echo '<td>' . $row['area'] . '</td>';
				echo '<td>' . $row['direction'] . '</td>';
				echo '<td>' . $row['advance'] . '</td>';
				echo '<td>' . $row['rent'] . '</td>';
				?>
				<td><a href="updatehome.php?rent=<?php echo $row['rent']?>">
					<a href="updateshop.php?propertyid=<?php echo $row['propertyid']?>"><img src="Update-icon.png" width="105" height="55" border="0" /></a></td> 
				<td><a href="deleteshop.php?propertyid=<?php echo  $row['propertyid'] ?>"><img src="delete-icon.png" width="105" height="55" border="0" /></a></td>
				<?php

		 }
		 echo "</table>";

		?> 
		<br><br>
		<center><td><a href="addshop.php"><img src="add.png" width="200" height="50" border="0"  /></a></td></center>
		 </body>
		 </html>