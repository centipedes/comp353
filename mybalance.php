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
				<center><h2>My Balance</h2></center>
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
					if ($_SESSION['admin']) {
						echo '<a href="./admin.php">Admin</a><br />';
					}
					echo '<a href="./logout.php"> Logout</a><br />';
					
				} else {
					echo '<a href="./register.php"> Register </a><br />';
					echo '<a href="./login.php"> Login </a><br />';
					echo '<a href="./forgotPassword.php"> Forgot your Password? </a><br />';
				}
			?>
			<!-- <a href="/logout.php"> Logout </a><br /> -->
			<!-- END NAV PART -->
			<!-- BEGIN CONTENT -->
		<div id="content-wrap">
			<div id="content">
				<center>
					<h2> Profile </h2>
					<?php
						if(isset($_SESSION["userName"])) {
							echo '<p>Hello, '.$_SESSION["userName"]."</p><br /><br />";
							echo '<a href="./mybalance.php"> My Balance</a><br /><br />';
							echo '<a href="./myratings.php"> My Ratings</a><br /><br />';
							echo '<h4>Home Address</h4>';
							echo '<a href="./editaddress.php"> Edit Address</a><br /><br />';
							echo '<h4>Advanced Settings</h4>';
							echo '<a href="./changeusername.php"> Change Username</a><br /><br />';
							echo '<a href="./changepassword.php"> Change Password</a><br /><br />';
							echo '<a href="./deactivate.php"> Deactivate Profile</a><br /><br /><br /><br />';
							echo '<a href="./index.php"> Back to Home</a><br/><br/><br/><br/>';
							echo '<a href="./logout.php"> Logout</a>';							
						} else {
							echo '<a href="./register.php"> Register </a><br />';
							echo '<a href="./login.php"> Login </a><br />';
							echo '<a href="./forgotPassword.php"> Forgot your Password? </a><br />'; 
						}
					?>
				</center>
			</div>
		</div>	
		<!-- END CONTENT -->
		<!-- END CONTENT -->

			</div>

		</div>	
		<!-- END CONTENT -->
		<!-- BEGIN FOOTER -->
		<div id="footer">
		</div>
		<!-- END FOOTER -->
	</body>

</html>