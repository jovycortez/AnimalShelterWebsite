<!--User Profile-->

<?php
if(isset($_COOKIE["user_id"])){
	header('Location: account.php?login=post');
}
include ('navbar.php');

$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('kozycorner');

$query = "SELECT * FROM employee"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

echo "<table>"; // start a table tag in the HTML

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['name'] . "</td><td>" . $row['age'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML

mysql_close(); //Make sure to close out the database connection

?>

?>

<html>
	<head>
		<title> My Account </title>
	</head>
	
	<body>
		<h2> My Profile </h2>
		
		
		
		




</body>
</html> 
