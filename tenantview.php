	<html>
	<head>

	<link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100">
	<link rel="stylesheet" type="text/css" href="table.css"></head>
	
	<body>
	<title>Tenants</title>
			<td><a href="owner.php"><img src="home.jpg" width="200" height="100" border="0"  /></a></td>
			<?php 
include_once('connect_db.php');
session_start();
if(isset($_SESSION['userid']))
$id=$_SESSION['userid'];
       $result = mysql_query("SELECT * FROM tenants 	WHERE 	ownerid='$id'")or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='10'align='center'>";
        echo "<tr> <th>Tenant Name</th><th>Tenant Phno</th><th>Tenant Mail </th><th>House Id </th> <th>Rented</th><th>Rental Type</th><th> Security Deposit</th><th>Rent Amount</th><th>Date In</th><th>Valid Till</th><th>Update</th><th>Delete</th></tr>";
        // loop through results of database query, displaying them in the table
        echo "<p align='center'> <font color=blue  size='6pt'>Tenants List Are</font> </p>";  

        while($row = mysql_fetch_array( $result )) {
        	

                // echo out the contents of each row into a table
                echo "<tr>";
				echo '<td>' . $row['name'] . '</td>';
				echo '<td>'.$row['phno'].'</td>';
				echo '<td>' . $row['email']. '</td>';
				echo '<td>'.$row['propertyid'].'</td>';
				 echo '<td>' . $row['property'] . '</td>';
				echo '<td>' . $row['housedesc'] . '</td>';
				echo '<td>' . $row['advance'] . '</td>';
				echo '<td>' . $row['rent'] . '</td>';
				echo '<td>'.$row['datein'].'</td>';
				echo '<td>'.$row['dateout'].'</td>';
				?>
				<td><a>
					<a href="updatetenant.php?propertyid=<?php echo $row['propertyid']?>"><img src="Update-icon.png" width="105" height="55" border="0" /></a></td> 
				<td><a href="tenantdelete.php?propertyid=<?php echo  $row['propertyid'] ?>"><img src="delete-icon.png" width="105" height="55" border="0" /></a></td>
				<?php
		 }

		 echo "</table>";
		?> 
		<br><br>
		<center><td><a href="tenants.php"><img src="add.png" width="200" height="100" border="0"  /></a></td></center>
		</a>
		</td>
		</body>
		</html>