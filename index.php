<?php session_start(); ?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="./styles/stylesheet.css"/>
		<title> Velocity - COMP 353 </title>
	</head>

	<body>
		<!-- BEGIN HEADER -->
		<div id="header">
			<div id="logo">
				<center><h1>Velocity</h1></center>
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
					echo '<a href="./offerRide.php"> Offer Ride</a><br />';
					echo '<a href="./rides.php"> View Ride Offers</a><br />';
					echo '<a href="./myRides.php"> My Rides</a><br />';
					echo '<a href="./messages.php"> Messages</a><br />';
					echo '<a href="./profile.php"> Profile</a><br />';
					echo '<a href="./balance.php"> Balance</a><br />';
					echo '<a href="./logout.php"> Logout</a><br />';					
				} else {
					echo '<a href="./register.php"> Register </a><br />';
					echo '<a href="./login.php"> Login </a><br />';
					echo '<a href="./forgotPassword.php"> Forgot your Password? </a><br />';
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
