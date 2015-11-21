<html>
<head>
<title>home</title>
<link type="text/css" rel="stylesheet" href="layout.css"> 
<style type = "text/css">

#center_message{padding-bottom: 30px;
				padding-top: 10px;
}
#center_message p{font-size: 20px;}

#container{text-align: center;
		  border-top: 1px solid #e3e0db;
		  padding-top: 30px;
}
.container1 {
	margin-left: 0px;
    float: left;
    height: 500px;
    padding: 5px;
    width: 310px;
	line-height: 200%;
	display: inline-block;
}
.container1 img{border-radius: 15px;}
.container1 ul { font-size: 13px;
}
.container2 {
	height: 500px;
    padding: 5px;
    width: 310px;
	line-height: 200%;
	display: inline-block;
}
.container2 img{border-radius: 15px;}
.container2 ul{ font-size: 13px;

}	
.container3 {
	
    float: right;
    height: 500px;
    padding: 0px;
    width: 310px;
	line-height: 150%;
	margin-right: 0px;
	display: inline-block;
}

.container3 img{border-radius: 15px;}
.container3 ul{ font-size: 13px;
}	

h1, p {color: #5A5A5A;
	    text-align: center;}
		
ul{ list-style-type: square; 		
   text-align: left;
   
}


</style>


</head>

<body>

<?php include ('navbar.php'); ?>

<div class="wrapper">

<div id="center_message">
<h1> The Lost and Found Pet Center </h1> <!-- center it on layout.cc -->
<p> Search and Post reports in KozyCorner's huge database! </p>
<p> KozyCorner is a non-profit all-volunteer organization.  
Helping reunite pets with people since 2015 as a free community service.</p>
</div>

<div id="container">
<div class="container1 ">
<img src="images/dog1.jpg" class="dog1" alt="dog lying down on grass">
 <p> Did you lose a Pet? </p>
<ul>
	<li> <a class="found" href="PostForm.php">Post a Report </a> </li>
	<li> <a class="found" href="found.php">Search Found Reports</a> </li>
	
    <li> <a class="found" href="http://www.adoptapet.com/blog/free-and-easy-template-lost-or-found-pet-flye">Flyer Template for a Lost Pet</a> </li>
</ul>

</div>

<div class="container2 ">
<img src="images/cat1.jpg" class="cat1" alt="cat sitting next to window" >
<p> Did you find a Pet? </p>
<ul style="text-align: left;">
	<li> <a class="found" href="PostForm.php">Post a Report </a> </li>
	<li> <a class="found" href="lost.php">Search Lost Reports</a> </li>
	
	<li> <a class="found" href="http://www.adoptapet.com/blog/free-and-easy-template-lost-or-found-pet-flye">Flier Template for a Found Pet</a> </li>
</ul> 
</div>

<div class="container3 ">
<img src="images/dog2.jpg" class="puppiesOnGrass" alt="puppies sitting on the grass"  >
<p> Looking for Help? </p>
<p style="text-align: left;"> <a href="whomToContact.php"> Get the list of whom to contact here. </a> </P>
<p style="text-align: left;"> There are many entities that deal with lost and found pets. You can report 
a found or lost pet with them as well.
	
</ul> 
</div>
</div>
<!-- FOOT BEGINS -->
</div>
<?php include ('footer.php'); ?>

</body>
</html>