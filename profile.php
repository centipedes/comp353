<?php
session_start(); ?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="./styles/stylesheet.css"/>
		<title> Velocity </title>
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
				<center>
					<h2> Profile </h2>
					<?php
						if(isset($_SESSION["userName"])) {
							echo 'Hello, '.$_SESSION["userName"]."<br />";
							echo '<a href="./profile/edit-username.php"> Change Username</a><br />';
							echo '<a href="./profile/mybalance.php"> My Balance</a><br />';
							echo '<a href="./profile/edit-address.php"> Edit my Address</a><br />';
							echo '<a href="./profile/edit-billing.php"> Edit my Billing Information</a><br />';
							echo '<a href="./profile/myratings.php"> My Ratings</a><br />';
							echo '<a href="./profile/delete.php"> Deactivate</a><br />';
							echo '<a href="./logout.php"> Logout</a><br />';					
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
		<!-- BEGIN FOOTER -->
		<div id="footer">
		</div>
		<!-- END FOOTER -->
	</body>

</html>

