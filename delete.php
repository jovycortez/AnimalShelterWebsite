<!DOCTYPE html>
<html lang = "en">
	<head>
		<title> Form </title>
		<meta charset = "utf-8" />
		<link rel="stylesheet" type="text/css" href="layout.css" />
	</head>
	<body>
	
	<?php
	include ('navbar.php');
	include('kozycorner.dbconfig.inc');
	
	// Connect to MySQL	
	$conn = mysqli_connect($hostname,$username, $password, $dbname);
	if (mysqli_connect_errno()) {
		 print "Connect failed: " . mysqli_connect_error();
		 exit;
	}
	
		//Set variables
		$id = $_GET['petid'];

		
		//Delete post
		$query = "DELETE FROM $dbname.pets WHERE pet_id = '$id'";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			print "Error - the delete query could not be executed: " . mysqli_error($conn);
			exit;	
		}
		
		?>
		<div class="wrapper">
		<h1>Your post has been deleted!</h1>
		</div>
		
		<?php
			include ('footer.php');
		?>
	</body>
	</head>
</html>