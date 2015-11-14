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
					$query = "SELECT * FROM pets";
					
				} else {
					$query = "SELECT * FROM pets
							  WHERE user_id = '$_COOKIE[user_id]'";
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
					
						$button1 = "<span class=\"button\">View Record</span>";
						$button2 = "<span class=\"button\">Edit</span>";
						$button3 = "<span class=\"button\">Delete</span>";
					
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
						print "<a href=\"profile.php?petid=$row[pet_id]\">$button1</a>";
						print "<a href=\"editform.php?petid=$row[pet_id]\">$button2</a>";
						print "<a href=\"delete.php?petid=$row[pet_id]\">$button3</a>";
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