	
	<div id="banner">
		KozyCorner
	</div>

	<div id="navbar">
	<ul>
		<li><a href="index.html">Home</a></li>
		<li><a href="rescued.php">Rescued</a></li>
		<li><a href="found.php">Found</a></li>
		<li><a href="lost.php">Lost</a></li>
		<li><a href="post.html">Report</a></li>
		<li><a href="faq.html">FAQ</a></li>
		<li><a href=\"logout.php\">
		
		<?php
			if (isSet($_COOKIE["user_id"])) {
				print "<li><a href=\"logout.php\">Logout</a></li>";
			} else {
				print "<li><a href=\"login.php\">Login</a></li> ";
				print "<li><a href=\"signup.html\">Register</li>";
			}
		?>
		
	</ul>
	</div>