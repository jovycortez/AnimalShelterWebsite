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
	$breed_name = '%';
	
	// Build query
	$query = "SELECT * FROM pets
			  INNER JOIN breed
			  ON pets.breed_id=breed.breed_id
			  WHERE section LIKE '$section' &&
					pet_name LIKE '$pet_name' &&
					pet_type LIKE '$pet_type' &&
					breed_name LIKE '$breed_name'";
	
	// Run query
	$result = mysqli_query($conn, $query);
	if (!$result) {
		print "Error - the query could not be executed: " . mysqli_error($conn);
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
	
	$image = "images/default.png";
	$sectionCaps = ucfirst("$section");
	
	// For each row in the table..
	for($row_num = 0; $row_num < $num_rows; $row_num++) {
		
		// ..display only certain elements in this row
		print "<div class=\"post-container\">";
		
			$button = "<span class=\"button\">View Record</span>";
		
			print "<div class=\"post\">";
			print "<img src=\"$image\" width=\"200\" height=\"150\" \>";
			print "</div>";
			
			print "<div class=\"post\"><br />";			
			print "<strong>$row[gender] $row[pet_type]</strong><br />";
			print "$row[color]<br /><br />";
			print "$sectionCaps around $row[city], $row[state]<br />";
			print "on $row[date_found]";
			print "</div>";
			
			print "<div class=\"post\">";	
			print "<br /><br /><br /><br /><br />";
			print "<a href=\"profile.php?petid=$row[pet_id]\">$button</a>";
			print "</div>";
		
		print "</div>\r\n\r\n"; // end post container
		
		// Move to the next row
		$row = mysqli_fetch_assoc($result);
	}
							
?>