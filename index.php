<?php session_start(); ?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="./styles/stylesheet.css"/>
		<title> COMP 353 - Ride Share Y'allllllllll </title>
	</head>

	<body>
		<!-- BEGIN HEADER -->
		<div id="header">
			<div id="logo">
				<center><h1>Ride Share Ap$$$$$$$</h1></center>
			</div>
		</div>
		<!-- END HEADER -->
		<hr style="width:65%;" />
		<!-- BEGIN NAV -->
		<div id="navigation">
		</div>
		<!-- END NAV -->
		<!-- BEGIN CONTENT -->
		<div id="content-wrap">
			
			<div id="content">
			<!-- NAV PART -->
			<?php 
				if(isset($_SESSION["userName"])) {
					echo 'Welcome, '.$_SESSION["userName"]."<br />";
					echo '<a href="./logout.php"> Logout </a><br />';
				} else {
					echo '<a href="./register.php"> Register </a><br />';
					echo '<a href="./login.php"> Login </a><br />';
				}
			?>
			<!-- <a href="/logout.php"> Logout </a><br /> -->
			<!-- END NAV PART -->
			<!-- MAIN -->
			<hr />
			<center>
				
				
			</center>
			<!-- END MAIN -->

			</div>

		</div>	
		<!-- END CONTENT -->
		<!-- BEGIN FOOTER -->
		<div id="footer">
		</div>
		<!-- END FOOTER -->
	</body>

</html>