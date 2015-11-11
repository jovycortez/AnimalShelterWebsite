<!DOCTYPE html>
<?php
/*
if(!isset($_COOKIE["user_id"])){
	header('Location:login.php?login=post');
}
*/
?>

<html lang="en">
	<head>
		<title> Edit Form </title>
		<link rel="stylesheet" type="text/css" href="layout.css" />
	</head>
	<body>
		<?php
			include('kozycorner.dbconfig.inc');
			include ('navbar.php');
			
			if(isset($_POST['update'])){
				
			// Connect to MySQL	
			$conn = mysqli_connect($hostname, $username, $password, $dbname);
			if (mysqli_connect_errno()) {
				print "Connect failed: " . mysqli_connect_error();
					exit;
			}
			
			$breed_id = $_POST['breed_id'];
			$query = "SELECT * FROM breed WHERE breed_id LIKE '$breed_id'";
			$result = mysqli_query($conn, $query);
			if (!$result){
				die('Could not select data: ' . mysql_error());
			}else{
				echo "Successfully updated data 1";
				
				$row = mysqli_fetch_assoc($result);
				$breed = $row['breed_name'];
				echo "$breed";
			}
			
			$pet_id = $_POST['pet_id'];
			$section = $_POST['section'];
			$pet_name = $_POST['pet_name'];
			$pet_type = $_POST['pet_type'];
			
			$is_mixed = $_POST['is_mixed'];
			$gender = $_POST['gender'];
			$color = $_POST['color'];
			$weight = $_POST['weight'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zipcode = $_POST['zipcode'];
			$date_found = $_POST['date_found'];
			$pet_description = $_POST['pet_description'];
			$branch_id = $_POST['branch_id'];
			
			$query = "SELECT * FROM breed";
			$result = mysqli_query($conn, $query);
			if (!$result){
				print "Error - the breed search query could not be executed" . mysqli_error($conn);
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
				$query = "INSERT INTO mydb.breed(breed_name) VALUES('$breed')";
				$result = mysqli_query($conn, $query);
				if (!$result) {
					print "Error - the breed query could not be executed" . mysql_error();
					exit;
				}
			
				$query = "SELECT * FROM BREED";
				// Run query
				$result = mysqli_query($conn, $query);
				if (!$result) {
					print "Error - the breed search query could not be executed" . mysqli_error($conn);
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
			
			// include in $query breed_id='$breed_id' when that is established
			$query = "UPDATE pets SET breed_id = '$breed', section='$section', pet_name='$pet_name', pet_type='$pet_type', is_mixed='$is_mixed', gender='$gender', color='$color', weight='$weight', address='$address', city='$city', state='$state', zipcode='$zipcode', date_found='$date_found', pet_description='$pet_description' WHERE pet_id='$pet_id'";	
			$result = mysqli_query($conn, $query);
			
			if (!$result){
				die('Could not update data: ' . mysql_error());
			}else{
				echo "Successfully updated data 2";
			}
			mysqli_close($conn);
			
			}else
			{
				?>
					<div class="wrapper">
					<form method="post" action="<?php $_PHP_SELF ?>">
					
					<table>
					<tr>
						<td> <input type = "radio"  name = "section" value = "Found" />Found</td>
						<td> <input type = "radio"  name = "section" value = "Lost" />Lost</td>
						<td> <input type = "radio"  name = "section" value = "Rescued" />Rescued</td>
					</tr>
					</table>
				  
					<table>
					<tr>
						<td> Pet ID: </td>
                        <td> <input type="text" name="pet_id" size = "15"></td>
                    </tr>
                  
                    <tr>
						<td> Pet Name: </td>  
						<td> <input type = "text"  name = "pet_name" size = "15" /></td>
					</tr>
                  
                    <tr>
						<td> Pet Type: </td>
						<td> <input type = "text"  name = "pet_type" size = "15" /></td>
					</tr>
					
					<tr>
						<td> Breed: </td>  
						<td> <input type = "text"  name = "breed_id" size = "15" /></td>
					</tr>
					
					<tr>
						<td> Mixed Breed: </td>  
						<td> <input type = "radio"  name = "is_mixed" value = "TRUE" />Yes</td>
					</tr>
					<tr>
						<td></td>
						<td> <input type = "radio"  name = "is_mixed" value = "FALSE" />No</td>
					</tr>
		
					<tr>
						<td> Gender: </td>  
						<td> <input type = "radio"  name = "gender" value = "Male" />Male</td>
					</tr>
					<tr>
						<td></td>
						<td> <input type = "radio"  name = "gender" value = "Female" />Female</td>
					</tr>
		
					<tr>
						<td> Color: </td>  
						<td> <input type = "text"  name = "color" size = "15" /></td>
					</tr>
		
					<tr>
						<td> Weight: </td>  
						<td> <input type = "text"  name = "weight" size = "15" placeholder="Pounds"/></td>
					</tr>
		
					<tr>
						<td> Address: </td>  
						<td> <input type = "text"  name = "address" size = "15" /></td>
					</tr>
		
					<tr>
						<td> City: </td>  
						<td> <input type = "text"  name = "city" size = "15" /></td>
					</tr>
		
					<tr>
						<td> State: </td>  
						<td> <input type = "text"  name = "state" size = "2" maxlength = "2" /></td>
					</tr>
		
					<tr>
						<td> Zip Code: </td>  
						<td> <input type = "text"  name = "zipcode" size = "5" maxlength = "5" /></td>
					</tr>
		
					<tr>
						<td> Date Found: </td>  
						<td> <input type = "text"  name = "date_found" size = "10" maxlength="10" pattern="^(\d{4})-(\d{1,2})-(\d{1,2})" placeholder="YYYY-MM-DD" /></td>
					</tr>

					<tr>
						<td> Description: </td>
						<td> <textarea  name = "pet_description" style="resize:none" rows = "4" cols = "50" placeholder="Briefly describe the pet" /></textarea></td>
					</tr>
					
					<tr>
						<td> Branch: </td>
						<td> <select name = "branch_id">
							<option value="na">Choose a Branch</option>
							<option value="la">Los Angeles</option>
							<option value="atl">Atlanta</option>
							<option value="nyc">New York City</option>
							<option value="dal">Dallas</option>
							<option value="sea">Seattle</option>
						</select>
						</td>
					</tr>
					
					<td>
                        <input name="update" type="submit" id="update" value="Update">
                    </td>
                  
					</table>
					</form>
					</div>
				<?php
			}
			include ('footer.php');			
			/*
			//Links post_id to user
			$userid = $_COOKIE["user_id"];
			$query = "INSERT INTO mydb.users_pets (pet_id, user_id) VALUES ('$petid', '$userid')";
			$result = mysqli_query($conn, $query);
			if (!$result) {
				print "Error - the latest query could not be executed";
					mysql_error();
				exit;	
			}
			*/
		?>
	</body>
</html>