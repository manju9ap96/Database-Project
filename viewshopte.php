	<html>
	<head><link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100"><link rel="stylesheet" type="text/css" href="table.css"></head><title>View Shops</title>
	<body><td><a href="viewer.php"><img src="home.jpg" width="200" height="100" border="0"  /></a></td><?php 
		
        include_once('connect_db.php');
include_once('connect_db.php');
session_start();
if(isset($_SESSION['userid']))
$id=$_SESSION['userid'];
       $result = mysql_query("SELECT * FROM shop  	")or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='10'align='center'>";
        echo "<tr> <th>Photos</th><th>Property Id </th> <th>Shoplocation</th><th>Built up area</th><th>Facing</th><th>Advance</th><th>Rent</th><th>Update</th></tr>";
        echo "<p align='center'> <font color=blue  size='10pt'>Shops Under Rent</font> </p>";
        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                // echo out the contents of each row into a table
                echo "<tr>";
				echo "<td> <img src='images/".$row['photos']."' height='130' width='100'></td>";
				echo '<td>' . $row['propertyid'] . '</td>';
				 echo '<td>' . $row['shoplocation'] . '</td>';
				echo '<td>' . $row['area'] . '</td>';
				echo '<td>' . $row['direction'] . '</td>';
				echo '<td>' . $row['advance'] . '</td>';
				echo '<td>' . $row['rent'] . '</td>';
				?>
				<td>
					<a href="shoprequest.php?propertyid=<?php echo $row['propertyid']?>"><img src="request.png" width="105" height="55" border="0" /></a></td> 
			
				<?php

		 }
		 echo "</table>";

		?> 
		<br><br>
	
		 </body>
		 </html>