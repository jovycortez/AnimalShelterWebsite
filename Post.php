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
		$section = $_POST['section'];
		$pname = $_POST['petname'];
		$ptype = $_POST['type'];
		$breed = $_POST['breed'];
		$color = $_POST['color'];
		$weight = $_POST['weight'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['zipcode'];
		$date = $_POST['date'];
		$mixb = $_POST['mixbreed'];
		$description = $_POST['description'];
		$branch = $_POST['branch'];
		
		if($pname == null){
			$pname = '';
		}
		if($weight == null){
			$weight = '';
		}
		if($address == null){
			$address = '';
		}

		if(strcmp($branch, "na") == 0){
			$branch = 1;
		}else if(strcmp($branch, "la") == 0){
			$branch = 2;
		}else if(strcmp($branch, "atl") == 0){
			$branch = 3;
		}else if(strcmp($branch, "nyc") == 0){
			$branch = 4;
		}else if(strcmp($branch, "dal") == 0){
			$branch = 5;
		}else{
			$branch = 6;
		}
		
		if(strcmp($mixb, "TRUE") == 0){
			$mixb = TRUE;
		}else{
			$mixb = FALSE;
		}
		
		//Change all words so only first letter is upper case
		$pname = ucfirst($pname);
		$ptype = ucfirst($ptype);
		$breed = ucfirst($breed);
		$color = ucfirst($color);
		$address = ucfirst($address);
		$city = ucfirst($city);
		$state = strtoupper($state);
		
		//Selects and runs to hold breed table data
		$query = "SELECT * FROM BREED";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			print "Error - the breed search query could not be executed: " . mysqli_error($conn);
			exit;
		}
		
		$num_rows = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		
		//First traversal to see if breed exist
		$exist = FALSE;
		for($row_num = 0; $row_num < $num_rows; $row_num++) {
			$str1 = $row['breed_name'];
			if(strcmp($str1, $breed) == 0){
				$breed = $row['breed_id'];
				$exist = TRUE;
			}
		
		// Move to the next row
		$row = mysqli_fetch_assoc($result);
		}
		
		//If breed does not exist then create breed and set value and traverse again
		if($exist == FALSE){
			
			//Adds new breed to breed table
			$query = "INSERT INTO $dbname.breed(breed_name) VALUES('$breed')";
			$result = mysqli_query($conn, $query);
			if (!$result) {
				print "Error - the breed query could not be executed: " . mysqli_error($conn);
				exit;
			}
			
			$query = "SELECT * FROM BREED";
			// Run query
			$result = mysqli_query($conn, $query);
			if (!$result) {
				print "Error - the breed search query could not be executed: " . mysqli_error($conn);
				exit;
			}
			//Selects and runs to hold breed table data
			$num_rows = mysqli_num_rows($result);
			$row = mysqli_fetch_assoc($result);
		
			$exist = FALSE;
			for($row_num = 0; $row_num < $num_rows; $row_num++) {
				$str1 = $row['breed_name'];
				if(strcmp($str1, $breed) == 0){
					$breed = $row['breed_id'];
					$exist = TRUE;
				}
			$row = mysqli_fetch_assoc($result);
			}
			
		}
		
		//Inserts new post
		$query = "INSERT INTO $dbname.pets (user_id, branch_id, breed_id, section, pet_name, pet_type, color, weight, gender, address, city, state, zipcode, date_found, is_mixed, pet_description)
			VALUES('$_COOKIE[user_id]', '$branch', '$breed', '$section', '$pname', '$ptype', '$color', '$weight', '$gender', '$address', '$city', '$state', '$zip', '$date', '$mixb', '$description')";
		$result = mysqli_query($conn, $query);
		if (!$result) {
			print "Error - the insert query could not be executed: " . mysqli_error($conn);
			exit;	
		}
		?>
		<div class="wrapper">
		<h1>You post has successfully been submitted!</h1>
		</div>
		
		<?php
			include ('footer.php');
		?>
	</body>
	</head>
</html>