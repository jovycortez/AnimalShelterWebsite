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

				// Build query
				$query = "SELECT * FROM users_pets
						  INNER JOIN pets
						  ON pets.pet_id = users_pets.pet_id
						  WHERE user_id = '$_COOKIE[user_id]'";
				
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
				
				$image = "images/default.png";
				
				// For each row in the table, get the fields we want
				for($row_num = 0; $row_num < $num_rows; $row_num++) {
					
					print "<div class=\"post-container\">";
					
						$button = "<span class=\"button\">View Record</span>";
					
						print "<div class=\"post\">";
						print "<img src=\"$image\" width=\"200\" height=\"150\" \>";
						print "</div>";
						
						print "<div class=\"post\"><br />";		
						print "<span class=\"title\">$row[color] $row[pet_type]</span><br />";
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
			
		</div>
		
		<?php
			include ('footer.php');
		?>
</body>
</html>