<!DOCTYPE html>
<!-- post.html is a html full of text -->
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
		<form action = "search.php" method ="post">
		
		<h2>Advanced Search</h2>
		
		<table>
		<tr>
			<td> <input type = "radio"  name = "section" value = "Lost" />Lost</td>
			<td> <input type = "radio"  name = "section" value = "Found" />Found</td>
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
            <td> <input type = "text"  name = "pettype" size = "15" /></td>
        </tr>
		
		<tr>
          <td> Breed: </td>  
          <td> <input type = "text"  name = "breedname" size = "15" /></td>
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
			<td> Date Lost/Found: </td>  
			<td> <input type = "text"  name = "date" size = "10" maxlength="10" pattern="^(\d{4})-(\d{1,2})-(\d{1,2})" placeholder="YYYY-MM-DD" /></td>
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