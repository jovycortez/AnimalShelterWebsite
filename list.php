<?php
		
	include('kozycorner.dbconfig.inc');
	
	// Connect to MySQL
	$conn = mysqli_connect($hostname,$username, $password, $dbname);
	if (mysqli_connect_errno()) {
		 print "Connect failed: " . mysqli_connect_error();
		 exit;
	}
	
	// Temporarily put these variables here
	$pet_name = '%';
	$pet_type = '%';
	$breed_id = '%';
	
	// Build query
	$query = "SELECT * FROM PETS
			  WHERE section LIKE '$section' &&
					pet_name LIKE '$pet_name' &&
					pet_type LIKE '$pet_type' &&
					breed_id LIKE '$breed_id'";
	
	// Run query
	$result = mysqli_query($conn, $query);
	if (!$result) {
		print "Error - the query could not be executed" . mysqli_error($conn);
		exit;
	}
	
	// Get information about $result object
	$num_rows = mysqli_num_rows($result);
	$num_fields = mysqli_num_fields($result);
	$row = mysqli_fetch_assoc($result);
	
	// Display number of results found
	if ($num_rows == 1) {
		print "<strong>$num_rows</strong> result found.<br /><br />";
	} else {
		print "<strong>$num_rows</strong> results found.<br /><br />";
	}
	
	// Table heading
	print "<table border=\"1\" width=\"80%\">";
	print "<tr>";
		print "<th>Name</th>";
		print "<th>Type</th>";
		print "<th>Breed</th>";
		print "<th>Gender</th>";
		print "<th>Color</th>";
		print "<th>Weight</th>";
		print "<th>Birthdate</th>";
		print "<th>Description</th>";
		print "<th>Date Found</th>";
		print "<th>Zipcode Found</th>";
	print "</tr>";
	
	// For each row in the table..
	for($row_num = 0; $row_num < $num_rows; $row_num++) {
		
		// ..display only certain elements in this row
		print "<tr>";
			print "<td><a href=\"profile.php?petid=$row[pet_id]\">$row[pet_name]</a></td>";
			print "<td>$row[pet_type]</td>";
			print "<td>$row[breed_id]</td>";
			print "<td>$row[gender]</td>";
			print "<td>$row[color]</td>";
			print "<td>$row[weight] lbs</td>";
			print "<td>$row[birthdate]</td>";
			print "<td>$row[pet_description]</td>";
			print "<td>$row[date_found]</td>";
			print "<td>$row[zipcode]</td>";
		print "</tr>";
		
		// Move to the next row
		$row = mysqli_fetch_assoc($result);
	}
	
	// End table
	print "</table>";
							
?>