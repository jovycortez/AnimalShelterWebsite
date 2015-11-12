<?php
	
	include('kozycorner.dbconfig.inc');
	
	// Connect to MySQL
	$conn = mysqli_connect('csc4370.com','f15g06dbadmin', 't7g$SBiv6r#^', 'f15g06db');
	if (mysqli_connect_errno()) {
		 print "Connect failed: " . mysqli_connect_error();
		 exit;
	}
	
	// Default variables to wildcard (except $section!)
	$user_id = '%';
	$username = '%';
	$password = '%';
	$email = '%';
	$firstName = '%';
	$lastName = '%';
	$zip = '%';
	
	
	// If field is filled and not blank, set variable to it
	if (isSet($_POST["user_id"])	&& $_POST["user_id"] != "")		{ $user_id = $_POST["user_id"]; }
	if (isSet($_POST["username"]) 	&& $_POST["username"] != "")		{ $username = $_POST["username"]; }
	if (isSet($_POST["password"]) 	&& $_POST["password"] != "")	{ $password = $_POST["password"]; }
	if (isSet($_POST["email"])		&& $_POST["email"] != "" ) 	{ $email = $_POST["email"]; }
	if (isSet($_POST["firstName"])		&& $_POST["firstName"] != "" ) 		{ $firstName = $_POST["firstName"]; }
	if (isSet($_POST["lastName"])		&& $_POST["lastName"] != "" ) 	{ $lastName = $_POST["lastName"]; }
	if (isSet($_POST["zip"]) 	&& $_POST["zip"] != "" ) 	{ $zip = $_POST["zip"]; }
	
	// Build query
	$query = "SELECT * FROM users
			  WHERE section LIKE '%$section%' &&
					user_id LIKE '%$user_id%' &&
					username LIKE '%$username%' &&
					password LIKE '%$password%' &&
					email LIKE '%$email%' &&
					firstName LIKE '%$firstName%' &&
					lastName LIKE '%$lastName%' &&
					zip LIKE '%$zip%'";
	
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