<html>
<head>
<title>home</title>
<link type="text/css" rel="stylesheet" href="layout.css"> 
<style type = "text/css">


#container{text-align: center;}

.container1 {
	margin-left: 80px;
    float: left;
    height: 450px;
    padding: 5px;
    width: 310px;
	line-height: 150%;
	display: inline-block;
}
.container2 {
	height: 450px;
    padding: 5px;
    width: 310px;
	line-height: 150%;
	display: inline-block;
	
}	
.container3 {
	
    float: right;
    height: 450px;
    padding: 5px;
    width: 310px;
	line-height: 150%;
	margin-right: 80px;
	display: inline-block;
}

h1, h2 {color: #5A5A5A;
	    text-align: center;}
	
</style>


</head>

<body>

<?php include ('navbar.php'); ?>

<div class="wrapper">
<div id="center_message">

<h1> The Lost and Found Pet Center </h1> <!-- center it on layout.cc -->
<h2> Search and Post reports in CozyCorner's huge database! </h2>
<h2> CozyCorner is a non-profit all-volunteer organization.  
Helping reunite pets with people since 2015 as a free community service.</h2>

</div>
<div id="container">
<div class="container1 ">
<img src="images/cat1.jpg" class="cat1" alt="Cat on a window"  >
 <p> Lost a Pet? </p>
<ul style="text-align: left;">
	<li> under construction</li>
	<li> here</li>
	<li> here</li>
</ul>

</div>

<div class="container2 ">
<img src="images/cat2.jpg" class="cat2" alt="Staring Cat" >
<p> Found a Pet? </p>
<ul style="text-align: left;">
	<li> here</li>
	<li> here</li>
	<li> here</li>
</ul> 
</div>

<div class="container3 ">
<img src="images/dogOnGrass.jpg" class="dogOnGrass" alt="dog laying down on the grass"  >
<p> Whom to Contact </p>
<ul style="text-align: left;">
	<li> here</li>
	<li> here</li>
	<li> here</li>
</ul> 
</div>


</div>
<!-- FOOT BEGINS -->

<?php include ('footer.php'); ?>

</body>
</html>