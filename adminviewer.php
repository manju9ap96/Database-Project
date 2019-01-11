	<html>
	<head>
	<link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100"><link rel="stylesheet" type="text/css" href="table.css"></head>
	<title>List of viewers</title>
	<body>
			<td><a href="admin.php"><img src="home.jpg" width="200" height="100" border="0"  /></a></td><?php 
		
        include_once('connect_db.php');
include_once('connect_db.php');
session_start();
if(isset($_SESSION['userid']))
$id=$_SESSION['userid'];
       $result = mysql_query("SELECT * FROM viewer 	")or die(mysql_error());
		 echo "<table border='1' cellpadding='5'align='center'>";
        echo "<tr> <th>Owner Name</th><th>Owner Id </th> <th>Phone</th> <th>Email</th></tr>";
        // loop through results of database query, displaying them in the table
        echo "<p align='center'> <font color=blue  size='6pt'>LIST OF VIEWERS</font> </p>";  

        while($row = mysql_fetch_array( $result )) {
        	

                // echo out the contents of each row into a table
                echo "<tr>";
				 echo '<td>' . $row['username'] . '</td>';
				 echo '<td>' . $row['ownerid'] . '</td>';
				 echo '<td>' . $row['phno'] . '</td>';
				 echo '<td>' . $row['email'] . '</td>';
				
				?>
				
					
				
				<?php
		 }

		 echo "</table>";
		?> 
		
		 </body>
		 </html>
		