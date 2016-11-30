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
					<h3> DEACTIVATE YOUR ACCOUNT </h3>
					<br/ ><br/ >
					<?php
						if(isset($_SESSION["userName"])) {
							echo 'Hey '.$_SESSION["userName"].', are you sure you want to deactivate your account?. <br/ ><br/ >';
							echo 'By doing so, you will lose all access to your personal data stored on this account. <br/ ><br/ >';
							echo 'You can always message us and reactivate at a later time, or message us further for permanent deletion.<br/ ><br/ >';
							echo 'Your current balance will be transfered back to your personal billing account listed in your <a href ="./mybalance.php">My Balance</a> page,<br/ ><br/ ><br/ ><br/ >';
							echo 'Click <a href ="./actions.php?actionSelect=deactivate">here</a> to deactivate<br />';			
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

