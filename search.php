<!DOCTYPE html>
<html lang="en">
<head>
	<title>Searchs pets</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="layout.css" />
</head>
<body>
		<?php
			include ('navbar.php');
		?>
		
		<div class="wrapper">
			<?php
			
				// Set section to url value or wildcard
				if (isSet($_POST["section"]) && $_POST["section"] != "") {
					$section = $_POST["section"];
				} else {
					$section = '%';
				}
				
				include ('list.php');
			?>
		</div>
		
		<?php
			include ('footer.php');
		?>
</body>
</html>