	<html>
	<head>
	<link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100"><link rel="stylesheet" type="text/css" href="table.css"></head>
	<title>View Houses</title>
	<body>

	
	<td><a href="viewer.php"><img src="home.jpg" width="200" height="100" border="0"  /></a></td>
		<td><link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100"></td> 

		<br><br><?php 
		
        include_once('connect_db.php');

       // get results from databas
        $ownerid=$_POST['ownerid'];
       $result = mysql_query("SELECT * FROM house 	#WHERE 	ownerid='1234'")or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='5'align='center'>";
        echo "<tr><th>Photos</th><th>Property Id </th> <th>HouseDescription</th> <th>Houselocation</th><th>Built up area</th><th>Facing</th><th>Advance</th><th>Rent</th><th>Send Request</th></tr>";
        // loop through results of database query, displaying them in the table
         echo "<p align='center'> <font color=blue  size='6pt'>Houses Under Rent</font> </p>";  
        while($row = mysql_fetch_array( $result )) {
                // echo out the contents of each row into a table
                echo "<tr>"; 
                
				echo "<td> <img src='images/".$row['photos']."' height='130' width='150'></td>";
				echo '<td>' . $row['propertyid'] . '</td>';
				 echo '<td>' . $row['housedesc'] . '</td>';
				 echo '<td>' . $row['houselocation'] . '</td>';
				echo '<td>' . $row['area'] . '</td>';
				echo '<td>' . $row['direction'] . '</td>';
				echo '<td>' . $row['advance'] . '</td>';
				echo '<td>' . $row['rent'] . '</td>';
				?>
				<td><a href="hrequest.php?propertyid=<?php echo $row['propertyid']?>"><img src="request.png" width="200" height="100" border="0"  /></a></td> 
				
				<?php
		 }
		 echo "</table>";

		?>
		<?php 
		
        include_once('connect_db.php');

       $result = mysql_query("SELECT * FROM shouse 	 	")or die(mysql_error());
		// display data in table
        echo "<table border='1' cellpadding='5'align='center'>";
        echo "<tr> <th>Photos</th><th>House Id </th> <th>HouseDescription</th> <th>Houselocation</th><th>Built up area</th><th>Facing</th><th>Transaction</th><th> Age of Construction</th><th>Amount</th><th>Send Request</th></tr>";
        // loop through results of database query, displaying them in the table
        echo "<p align='center'> <font color=blue  size='6pt'>Houses Under Sale</font> </p>";  

        while($row = mysql_fetch_array( $result )) {
        	$photo = $row['images'];
        	$propid = $row['propertyid'];

                // echo out the contents of each row into a table
               echo "<tr>"; 
                echo "<td> <img src='images/".$row['images']."' height='130' width='150'></td>";
				echo '<td>' . $propid. '</td>';
				 echo '<td>' . $row['housedesc'] . '</td>';
				 echo '<td>' . $row['houselocation'] . '</td>';
				echo '<td>' . $row['area'] . '</td>';
				echo '<td>' . $row['face'] . '</td>';
				echo '<td>' . $row['trans'] . '</td>';
				echo '<td>' . $row['const'] . '</td>';
				echo '<td>'.$row['amt'].'</td>';
			
				?>
				<td><a>
					<a href="hrequest.php?propertyid=<?php echo $row['propertyid']?>"><img src="request.png" width="155" height="105" border="0" /></a></td> 
				
				<?php
		 }

		 echo "</table>";
		?> 
		<br><br>
		
		 </body>
		 </html>