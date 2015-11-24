<?php
	if(!isset($_COOKIE["user_id"])){
		header('Location: login.php');
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Account</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="layout.css" />
</head>
<body>
		<?php
			include ('navbar.php');
		?>
		
		<div class="wrapper">
		
			<h2>My Account</h2>
		
			<?php
				include('kozycorner.dbconfig.inc');
				
				// Connect to MySQL
				$conn = mysqli_connect($hostname,$username, $password, $dbname);
				if (mysqli_connect_errno()) {
					 print "Connect failed: " . mysqli_connect_error();
					 exit;
				}
				
				// See if the user is an admin
				$query = "SELECT user_id, username, is_admin FROM users
						  WHERE user_id='$_COOKIE[user_id]'";
				
				$result = mysqli_query($conn, $query);
				if (!$result) {
					print "Error - the query could not be executed: " . mysqli_error($conn);
					exit;
				}
				
				$row = mysqli_fetch_assoc($result);
				$isAdmin = $row["is_admin"];
				
				// Admin can see all posts
				if ($isAdmin) {
					$query = "SELECT * FROM pets
							  INNER JOIN breed
							  ON pets.breed_id = breed.breed_id
							  ORDER BY date_found DESC";
					
				} else {
					$query = "SELECT * FROM pets
							  INNER JOIN breed
							  ON pets.breed_id = breed.breed_id
							  WHERE user_id = '$_COOKIE[user_id]'
							  ORDER BY date_found DESC";
				}
				
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
					print "<strong>$num_rows</strong> post found.<br /><br />";
				} else {
					print "<strong>$num_rows</strong> posts found.<br /><br />";
				}
				
				$image = "images/default.png";
				
				// For each row in the table, get the fields we want
				for($row_num = 0; $row_num < $num_rows; $row_num++) {
					
					print "<div class=\"post-container\">";
					
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
						print "<a class=\"button\" href=\"profile.php?petid=$row[pet_id]\">View Record</a> ";
						print "<a class=\"button\" href=\"editform.php?petid=$row[pet_id]\">Edit</a> ";
						print "<a class=\"button-warning\" href=\"delete.php?petid=$row[pet_id]\">Delete</a>";
						print "</div>";
					
					print "</div>\r\n\r\n"; // end post container
					
					// Move to the next row
					$row = mysqli_fetch_assoc($result);
				}
				
				// Display heading
				print "<h2>Recent posts in my area</h2>";
				
				// Get the users zipcode
				$query = "SELECT user_id, zip FROM users
						  WHERE user_id = '$_COOKIE[user_id]'";
				  
				$result = mysqli_query($conn, $query);
				if (!$result) {
					print "Error - the query could not be executed: " . mysqli_error($conn);
					exit;
				}
				
				$row = mysqli_fetch_assoc($result);
				$zipcode = $row["zip"];
				
				// Find posts with this same zip code as user
				$query = "SELECT * FROM pets
						  INNER JOIN breed
						  ON pets.breed_id = breed.breed_id
						  WHERE zipcode='$zipcode' && user_id NOT LIKE $_COOKIE[user_id]
						  ORDER BY section DESC, date_found DESC";
						  
				$result = mysqli_query($conn, $query);
				if (!$result) {
					print "Error - the query could not be executed: " . mysqli_error($conn);
					exit;
				}
				
				$num_rows = mysqli_num_rows($result);
				$num_rows = mysqli_num_rows($result);
				$row = mysqli_fetch_assoc($result);
				
				if ($num_rows == 1) {
					print "<strong>$num_rows</strong> post found.<br /><br />";
				} else {
					print "<strong>$num_rows</strong> posts found.<br /><br />";
				}
				
				for($row_num = 0; $row_num < $num_rows; $row_num++) {
					
					print "<div class=\"post-container\">";
					
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
						print "<a class=\"button\" href=\"profile.php?petid=$row[pet_id]\">View Record</a>";
						print "</div>";
					
					print "</div>\r\n\r\n"; // end post container
					
					// Move to the next row
					$row = mysqli_fetch_assoc($result);
				}
				
				
			?>
			
		</div>
		
		<?php
			include ('footer.php');
		?>
</body>
</html>