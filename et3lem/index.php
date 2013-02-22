<?php
ob_start();session_start();

include_once('fucntions.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Et3lem.com</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="topPan">
	<a href="#"><img src="images/logo.gif" alt="Et3lem.com" width="245" height="37" border="0"	class="logo" title="Et3lem.com"/></a>
	<p>Tutorials online</p>
	<div id="topMenuPan">
	  <div id="topMenuLeftPan"></div>
		<div id="topMenuMiddlePan">
			<?php
			print main_menu();
			?>
		</div>
		<div id="topMenuRightPan"></div>
	</div><div class="inner_copy"></div>
</div>
<div id="bodyPan">

	<!-- ################################ LEF COLUMN #######################################//-->
	<div id="bodyRightPan" style='border:0px solid red;'>
		<h2>All Categories</h2>
			<?php
				print category_links();
			?>
		
		
		<h3><span>latest</span> updates</h3>
		<p class="boldtext">on 02rd Jan 2013</p><p>A tutorial is a method of transferring knowledge and may be used as a part of a learning process. </p><p class="more"><a href="#">more</a></p>
	  <p class="boldtext">on 03rd Feb 2013</p>
		<p>A tutorial is a method of transferring knowledge and may be used as a part of a learning process. </p><p class="more"><a href="#">more</a></p>
	</div>
	<!-- ################################ END OF LEFT COLUMN #######################################//-->
	
	
	
	
	<!-- ################################ MIDDLE COLUMN #######################################//-->
	<div id="bodyLeftPan" style='border:0px solid blue;'>
		<h2><span>why</span> Et3lem.com</h2>
		<p>A tutorial is a method of transferring knowledge and may be used as a part of a learning process. More interactive and specific than a book or a lecture
        A tutorial is a method of transferring knowledge and may be used as a part of a learning process. More interactive and specific than a book or a lectureA tutorial is a method of transferring knowledge and may be used as a part of a learning process. More interactive and specific than a book or a lecture</p>
		<ul>
			<li><a href="#">A tutorial is a method of transferring knowledge</a> </li>
			<li><a href="#">A tutorial is a method of transferring knowledge </a></li>
		</ul>
		<p class="more"><a href="#">more</a></p>
		<h3><span>new</span> books</h3>
		<div id="bookcatagories">
			<div id="namePan">Name</div>
			<div id="pricePan">price</div> 
			<div id="discountPan">discount</div>
			<div id="nameonePan">
				<ul>
					<li>Tutorial_1</li>
					<li>Tutorial_2</li>
					<li>Tutorial_3</li>
					<li>Tutorial_4</li>
					<li>Tutorial_5</li>
					<li>Tutorial_6</li>
					<li>Tutorial_7</li>
					<li>Tutorial_8</li>
					<li>Tutorial_9</li>
				</ul>
			</div>
			<div id="priceonePan">
				<ul>
					<li>$20</li>
					<li>$20</li>
					<li>$25</li>
					<li>$20</li>
					<li>$35</li>
					<li>$30</li>
					<li>$29</li>
					<li>$40</li>
					<li>$25</li>
				</ul>
			</div>
			<div id="discountonePan">
				<ul>
					<li>10%</li>
					<li>10%</li>
					<li>10%</li>
					<li>10%</li>
					<li>15%</li>
					<li>15%</li>
					<li>20%</li>
					<li>20%</li>
					<li>20%</li>
				</ul>
			</div>
		</div>
		<div id="bodyLeftNextPan"><p class="next"><a href="#">next</a></p></div>
	</div>
	<!-- ################################ END OF MIDDLE COLUMN #######################################//-->
	
	
	
	
	
	<!-- ################################ RIGHT COLUMN #######################################//-->
	<div id="bodyRightPan" style=';border:0px solid red;'>
		<h2>
			User Account
		</h2>
		
		<?php
			print login_or_welcome();	
		?>
		
		
		<h3><span>latest</span> updates</h3>
		<p class="boldtext">on 02rd Jan 2013</p><p>A tutorial is a method of transferring knowledge and may be used as a part of a learning process. </p><p class="more"><a href="#">more</a></p>
	  <p class="boldtext">on 03rd Feb 2013</p>
		<p>A tutorial is a method of transferring knowledge and may be used as a part of a learning process. </p><p class="more"><a href="#">more</a></p>
	</div>
	<!-- ################################ END OF RIGHT COLUMN #######################################//-->
	
</div>
<div id="footermainPan">
	<div id="footerPan">
		<ul>
			<li><a href="#">Home</a>| </li>
			<li><a href="#">About us</a>| </li>
			<li><a href="#">Support</a>| </li>
			<li><a href="#">Books</a>| </li>
			<li><a href="#">University</a>| </li>
			<li><a href="#">Blog</a>| </li>
			<li><a href="#">Ideas</a>| </li>
			<li><a href="#">Contact</a> </li>
		</ul>
		<div class="fclear"></div>
		<div class="fcenter">
			<div class="fcenter">Copyright (c) Et3lem.com</div>
			<div class="fright"></div>
			<div class="fclear"></div>
		</div>
	</div>
</div>
</body>
</html>
