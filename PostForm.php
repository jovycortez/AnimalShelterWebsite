<!DOCTYPE html>
<!-- post.html is a html full of text -->
<?php
if(!isset($_COOKIE["user_id"])){
	header('Location: login.php?=login=post');
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
		?>

		<div class="wrapper">
		<form action = "post.php" method ="post">
		
		<table>
		<tr>
			<td> <input type = "radio"  name = "section" value = "Found" />Found</td>
			<td> <input type = "radio"  name = "section" value = "Lost" />Lost</td>
			<td> <input type = "radio"  name = "section" value = "Rescued" />Rescued</td>
		</tr>
		</table>
		
		<table>
		<tr>
          <td> Pet Name: </td>  
          <td> <input type = "text"  name = "petname" size = "15" /></td>
        </tr>
		
        <tr>
            <td> Pet Type: </td>
            <td> <input type = "text"  name = "type" size = "15" required /></td>
        </tr>
		
		<tr>
          <td> Breed: </td>  
          <td> <input type = "text"  name = "breed" size = "15" required /></td>
        </tr>
		
		<tr>
			<td> Mixed Breed: </td>  
			<td> <input type = "radio"  name = "mixbreed" value = "TRUE" />Yes</td>
        </tr>
		<tr>
			<td></td>
			<td> <input type = "radio"  name = "mixbreed" value = "FALSE" />No</td>
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
          <td> <input type = "text"  name = "color" size = "15" required /></td>
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
			<td> <input type = "text"  name = "city" size = "15" required /></td>
        </tr>
		
		<tr>
			<td> State: </td>  
			<td> <input type = "text"  name = "state" size = "2" maxlength = "2" required /></td>
        </tr>
		
		<tr>
			<td> Zip Code: </td>  
			<td> <input type = "text"  name = "zipcode" size = "5" maxlength = "5" required /></td>
        </tr>
		
		<tr>
			<td> Date Found: </td>  
			<td> <input type = "text"  name = "date" size = "10" maxlength="10" required pattern="^(\d{4})-(\d{1,2})-(\d{1,2})" placeholder="YYYY-MM-DD" /></td>
        </tr>

        <tr>
			<td> Description: </td>
			<td> <textarea  name = "description" style="resize:none" rows = "4" cols = "50" required placeholder="Briefly describe the pet" /></textarea></td>
        </tr>
		<tr>
			<td> Branch: </td>
			<td> <select name = "branch">
					<option value="na">Choose a Branch</option>
					<option value="la">Los Angeles</option>
					<option value="atl">Atlanta</option>
					<option value="nyc">New York City</option>
					<option value="dal">Dallas</option>
					<option value="sea">Seattle</option>
				</select>
			</td>
        </tr>
		
        </table>
		<input type = "submit" value = "Submit" />
		</form>
		</div>
		<?php
			include ('footer.php');
		?>
	</body>
</html>