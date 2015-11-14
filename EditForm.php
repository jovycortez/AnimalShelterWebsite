<!DOCTYPE html>
<!-- post.html is a html full of text -->
<?php
if(!isset($_COOKIE["user_id"])){
	header('Location: login.php?login=post');
}
?>

<html lang = "en">
	<head>
		<title>Post Form </title>
		<meta charset = "utf-8" />
		<link rel="stylesheet" type="text/css" href="layout.css" />
	</head>
	
	<body>
		<?php
			include ('navbar.php');
			include('kozycorner.dbconfig.inc');
			
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
				print "Error - the query 1 could not be executed: " . mysqli_error($db);
				exit;
			}
			
			// Get information about $result object
			$row = mysqli_fetch_assoc($result);
			
			//set variables
			$pname = $row['pet_name'];
			$ptype = $row['pet_type'];
			$breed = $row['breed_id'];
			$mix = $row['is_mixed'];
			$color = $row['color'];
			$weight = $row['weight'];
			$gender = $row['gender'];
			$address = $row['address'];
			$city = $row['city'];
			$state = $row['state'];
			$zip = $row['zipcode'];
			$date = $row['date_found'];
			$description = $row['pet_description'];
			$branch = $row['branch_id'];
			
			$image = "images/default.png";
			print "<img src=\"$image\" width=\"200\" height=\"150\" \><br />";
			
			$query = "SELECT * FROM breed
					  WHERE breed_id='$breed'";
					  
			$result = mysqli_query($db, $query);
			if (!$result) {
				print "Error - the query 2 could not be executed: " . mysqli_error($db);
				exit;
			}
			
			$row = mysqli_fetch_assoc($result);
			
			$breed = $row['breed_name'];
		?>
		
		<!--from filled with pre given information-->
		<div class="wrapper">
		<form action = "edit.php" method ="post">
		
		<table>
		<tr>
			<td> <input type = "radio"  name = "section" value = "Found" checked="checked"/>Found</td>
			<td> <input type = "radio"  name = "section" value = "Lost" />Lost</td>
			<td> <input type = "radio"  name = "section" value = "Rescued" />Rescued</td>
		</tr>
		</table>
		
		<table>
		<tr>
          <td> Pet Name: </td>  
          <td> <input type = "text"  name = "petname" size = "15" value = "<?php print $pname;?>" /></td>
        </tr>
		
        <tr>
            <td> Pet Type: </td>
            <td> <input type = "text"  name = "type" size = "15" value = "<?php print $ptype;?>"  required /></td>
        </tr>
		
		<tr>
          <td> Breed: </td>  
          <td> <input type = "text"  name = "breed" size = "15" value = "<?php print $breed;?>" required /></td>
        </tr>
		
		<tr>
			<td> Mixed Breed: </td>  
			<td> <input type = "radio"  name = "mixbreed" value = "TRUE" <?php echo ($mix == 1)?'checked':'' ?>/>Yes</td>
        </tr>
		<tr>
			<td></td>
			<td> <input type = "radio"  name = "mixbreed" value = "FALSE" <?php echo ($mix == 0)?'checked':'' ?>/>No</td>
		</tr>
		
		<tr>
			<td> Gender: </td>  
			<td> <input type = "radio"  name = "gender" value = "Male" <?php echo ($gender =='Male')?'checked':'' ?>/>Male</td>
        </tr>
		<tr>
			<td></td>
			<td> <input type = "radio"  name = "gender" value = "Female" <?php echo ($gender =='Female')?'checked':'' ?> />Female</td>
		</tr>
		
		<tr>
          <td> Color: </td>  
          <td> <input type = "text"  name = "color" size = "15" value = "<?php print $color;?>" required /></td>
        </tr>
		
		<tr>
          <td> Weight: </td>  
          <td> <input type = "text"  name = "weight" size = "15" placeholder="Pounds" value = "<?php print $weight;?>" /></td>
        </tr>
		
		<tr>
			<td> Address: </td>  
			<td> <input type = "text"  name = "address" size = "15" value = "<?php print $address;?>" /></td>
        </tr>
		
		<tr>
			<td> City: </td>  
			<td> <input type = "text"  name = "city" size = "15" value = "<?php print $city;?>" required /></td>
        </tr>
		
		<tr>
			<td> State: </td>  
			<td> <input type = "text"  name = "state" size = "2" maxlength = "2" value = "<?php print $state;?>" required /></td>
        </tr>
		
		<tr>
			<td> Zip Code: </td>  
			<td> <input type = "text"  name = "zipcode" size = "5" maxlength = "5" value = "<?php print $zip;?>" required /></td>
        </tr>
		
		<tr>
			<td> Date Found: </td>  
			<td> <input type = "text"  name = "date" size = "10" maxlength="10" required pattern="^(\d{4})-(\d{1,2})-(\d{1,2})" placeholder="YYYY-MM-DD" value = "<?php print $date;?>" /></td>
        </tr>

        <tr>
			<td> Description: </td>
			<td> <textarea  name = "description" style="resize:none" rows = "4" cols = "50" placeholder="Briefly describe the pet" required /><?php print $description;?> </textarea></td>
        </tr>
		<tr>
			<td> Branch: </td>
			<td> <select name = "branch">
					<option value="na" <?php echo ($branch == 1)?'selected':'' ?>>Choose a Branch</option>
					<option value="la" <?php echo ($branch == 2)?'selected':'' ?>>Los Angeles</option>
					<option value="atl" <?php echo ($branch == 3)?'selected':'' ?>>Atlanta</option>
					<option value="nyc" <?php echo ($branch == 4)?'selected':'' ?>>New York City</option>
					<option value="dal" <?php echo ($branch == 5)?'selected':'' ?>>Dallas</option>
					<option value="sea" <?php echo ($branch == 6)?'selected':'' ?>>Seattle</option>
				</select>
			</td>
        </tr>
		
        </table>
		<input type = "submit" value = "Submit" />
		<input type= "hidden" name ="id" value= "<?php print $petid;?>" />
		</form>
		</div>
		<?php
			include ('footer.php');
		?>
	</body>
</html>