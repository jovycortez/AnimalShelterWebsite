<?php
	
	include('kozycorner.dbconfig.inc');
	
	// Connect to MySQL
	$conn = mysqli_connect($hostname,$username, $password, $dbname);
	if (mysqli_connect_errno()) {
		 print "Connect failed: " . mysqli_connect_error();
		 exit;
	}
	
	// Default variables to wildcard (except $section!)
	$pet_name = '%';
	$pet_type = '%';
	$breed_name = '%';
	$gender = '%';
	$color = '%';
	$weight = '%';
	$address = '%';
	$city = '%';
	$state = '%';
	$zipcode = '%';
	$date_found = '%';
	
	// If field is filled and not blank, set variable to it
	if (isSet($_POST["petname"])	&& $_POST["petname"] != "")		{ $pet_name = $_POST["petname"]; }
	if (isSet($_POST["pettype"]) 	&& $_POST["pettype"] != "")		{ $pet_type = $_POST["pettype"]; }
	if (isSet($_POST["breedname"]) 	&& $_POST["breedname"] != "")	{ $breed_name = $_POST["breedname"]; }
	if (isSet($_POST["gender"])		&& $_POST["gender"] != "" ) 	{ $gender = $_POST["gender"]; }
	if (isSet($_POST["color"])		&& $_POST["color"] != "" ) 		{ $color = $_POST["color"]; }
	if (isSet($_POST["weight"])		&& $_POST["weight"] != "" ) 	{ $weight = $_POST["weight"]; }
	if (isSet($_POST["address"]) 	&& $_POST["address"] != "" ) 	{ $address = $_POST["address"]; }
	if (isSet($_POST["city"]) 		&& $_POST["city"] != "" ) 		{ $city = $_POST["city"]; }
	if (isSet($_POST["state"]) 		&& $_POST["state"] != "" ) 		{ $state = $_POST["state"]; }
	if (isSet($_POST["zipcode"]) 	&& $_POST["zipcode"] != "" ) 	{ $zipcode = $_POST["zipcode"]; }
	if (isSet($_POST["date_found"]) && $_POST["date_found"] != "" ) { $date_found = $_POST["date_found"]; }
	
	// Build query
	$query = "SELECT * FROM pets
			  INNER JOIN breed
			  ON pets.breed_id = breed.breed_id
			  WHERE section LIKE '%$section%' &&
					pet_name LIKE '%$pet_name%' &&
					pet_type LIKE '%$pet_type%' &&
					breed_name LIKE '%$breed_name%' &&
					gender LIKE '%$gender%' &&
					color LIKE '%$color%' &&
					weight LIKE '%$weight%' &&
					address LIKE '%$address%'&&
					city LIKE '%$city%'&&
					state LIKE '%$state%'&&
					zipcode LIKE '%$zipcode%'&&
					date_found LIKE '%$date_found%'";
	
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
			print "<span class=\"title\">$row[color] $row[pet_type]</span><br />";
			print "$row[breed_name]<br /><br />";
			print "$row[section] around $row[city], $row[state]<br />";
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