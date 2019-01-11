	<html>
	<head>
	<link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100">
	<link rel="stylesheet" type="text/css" href="table.css"></head>
	<title>View Lands</title>
	<body>
			<td><a href="owner.php"><img src="home.jpg" width="200" height="100" border="0"  /></a></td><?php 
		
        include_once('connect_db.php');
include_once('connect_db.php');
session_start();
if(isset($_SESSION['userid']))
$id=$_SESSION['userid'];
       $result = mysql_query("SELECT * FROM land 	WHERE 	ownerid='$id' AND type='rent'")or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='10'align='center'>";
        echo "<tr> <th>Photos</th><th>Owner id</th><th>Land Id </th> <th>Landlocation</th><th>Total area</th><th>Security Deposit</th><th>Rent</th><th>Update</th><th>Delete</th></tr>";
        // loop through results of database query, displaying them in the table
        echo "<p align='center'> <font color=blue  size='6pt'>Lands Under Rent</font> </p>";  

        while($row = mysql_fetch_array( $result )) {
        	

                // echo out the contents of each row into a table
                echo "<tr>";
			echo "<td> <img src='images/".$row['photos']."' height='130' width='100'></td>";
				echo '<td>'.$row['ownerid'].'</td>';
				echo '<td>' . $row['propertyid']. '</td>';
				 echo '<td>' . $row['landlocation'] . '</td>';
				echo '<td>' . $row['area'] . '</td>';
				echo '<td>' . $row['amount'] . '</td>';
				echo '<td>' . $row['rent'] . '</td>';
				?>
				<td><a>
					<a href="updatelands.php?propertyid=<?php echo $row['propertyid']?>"><img src="Update-icon.png" width="105" height="55" border="0" /></a></td> 
				<td><a href="deleteland.php?propertyid=<?php echo  $row['propertyid'] ?>"><img src="delete-icon.png" width="105" height="55" border="0" /></a></td>
				<?php
		 }

		 echo "</table>";
		?> 
		<br><br>
		<?php 
		
        include_once('connect_db.php');
session_start();
if(isset($_SESSION['userid']))
$id=$_SESSION['userid'];
       $result = mysql_query("SELECT * FROM land 	WHERE 	ownerid='$id' AND type='sell'")or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='5'align='center'>";
        echo "<tr> <th>Photos</th><th>Owner id</th><th>Land Id </th> <th>Landlocation</th><th>Total area</th><th>Total Amount</th><th>Update</th><th>Delete</th></tr>";
        // loop through results of database query, displaying them in the table
        echo "<p align='center'> <font color=blue  size='6pt'>Lands Under Sale</font> </p>";  

        while($row = mysql_fetch_array( $result )) {
        	$photo = $row['images'];
        	$propid = $row['propertyid'];

                // echo out the contents of each row into a table
                echo "<tr>";
				echo "<tr>";
			echo "<td> <img src='images/".$row['photos']."' height='130' width='100'></td>";
				echo '<td>'.$row['ownerid'].'</td>';
				echo '<td>' . $row['propertyid']. '</td>';
				 echo '<td>' . $row['landlocation'] . '</td>';
				echo '<td>' . $row['area'] . '</td>';
				echo '<td>' . $row['amount'] . '</td>';
				
				?>
				<td><a>
					<a href="updatelands.php?propertyid=<?php echo $row['propertyid']?>"><img src="Update-icon.png" width="105" height="55" border="0" /></a></td> 
				<td><a href="deleteland.php?propertyid=<?php echo  $row['propertyid'] ?>"><img src="delete-icon.png" width="105" height="55" border="0" /></a></td>
				<?php
		 }

		 echo "</table>";
		?> 
		 </body>
		 </html>