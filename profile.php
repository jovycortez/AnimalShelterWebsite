<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lost pets</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="layout.css" />
</head>
<body>

		<?php
			include ('navbar.php');
		?>
	
		<div class="wrapper">
			<h2>Pet Profile</h2>
			
			<?php
			
			include('kozycorner.dbconfig.inc');

			// Get form value
			$petid = $_GET["petid"];

			// Connect to MySQL
			$db = mysqli_connect($hostname,$username, $password, $dbname);
			if (mysqli_connect_errno()) {
				 print "Connect failed: " . mysqli_connect_error();
				 exit;
			}
			
			$query = "SELECT * FROM pets
					  INNER JOIN breed
					  ON pets.breed_id=breed.breed_id
					  WHERE pet_id='$petid'";
			
			// Run query
			$result = mysqli_query($db, $query);
			if (!$result) {
				print "Error - the query could not be executed: " . mysqli_error($db);
				exit;
			}
			
			// Get information about $result object
			$num_rows = mysqli_num_rows($result);
			$num_fields = mysqli_num_fields($result);
			$row = mysqli_fetch_assoc($result);
			
			$image = "images/default.png";
			print "<img src=\"$image\" width=\"200\" height=\"150\" \><br />";
			print "<b>Name:</b> $row[pet_name]<br />";
			print "<b>Type:</b> $row[pet_type]<br />";
			print "<b>Breed:</b> $row[breed_name]<br />";
			print "<b>Gender:</b> $row[gender]<br />";
			print "<b>Color:</b> $row[color]<br />";
			print "<b>Weight:</b> $row[weight] lbs<br />";
			print "<b>Description:</b> $row[pet_description]<br />";
			print "<b>Date Found:</b> $row[date_found]<br />";
			print "<b>Location Found:</b> $row[city], $row[state] $row[zipcode]<br />";
			
			$query = "SELECT * FROM users
					  WHERE user_id='$row[user_id]'";
			
			// Run query
			$result = mysqli_query($db, $query);
			if (!$result) {
				print "Error - the query could not be executed: " . mysqli_error($db);
				exit;
			}
			
			// Get information about $result object
			$num_rows = mysqli_num_rows($result);
			$num_fields = mysqli_num_fields($result);
			$row = mysqli_fetch_assoc($result);
			
			print "<h2>Contact Info</h2>";
			print "Email: $row[email]";
			print "";
			
			?>
		</div>
		
		<?php
			include ('footer.php');
		?>
</body>
</html>