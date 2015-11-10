<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="layout.css">
</head>	
<body>

	<div id="social_media">
	<a id="faceb" href="http://www.facebook.com" style="height: 100px; width: 100px;"> <img src="images/faceb.jpg" class="icons"> </img> </a>
	<a id="twitter" href="https://twitter.com/"> <img src="images/twitter.jpg" class="icons"> </img> </a>
	</div>
	
	<div id="banner">
		KozyCorner
	</div>
	
	<div>
    <img id="pets_image" src="images/AnimalCareBanner.jpg" width="1138" height="150">
	</div>
	
	<div id="navbar">
	<ul>
		<li><a href="index.html">Home</a></li>
		<li><a href="rescued.php">Rescued</a></li>
		<li><a href="found.php">Found</a></li>
		<li><a href="lost.php">Lost</a></li>
		<li><a href="post.html">Report</a></li>
		<li><a href="faq.html">FAQ</a></li>		
		<?php
			if (isSet($_COOKIE["user_id"])) {
				print "<li><a href=\"logout.php\">Logout</a></li>";
			} else {
				print "<li><a href=\"login.php\">Login</a></li>";
				print "<li><a href=\"signup.html\">Register</a></li>";
			}
		?>		
	</ul>
	</div>

</body>
</html>