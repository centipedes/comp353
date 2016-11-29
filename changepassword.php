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
					<h2> Change Password </h2>
					<form id="change-pw" action="actions.php" method="post">
						<label for="current-pw">Current Password</label><br />
						<input type="text" name="curr-pw" /><br />
						<label for="new-pw">New Password</label><br />
						<input type="password" name="new-pw" /><br />
						<input type="hidden" value="change-password" name="actionSelect" />
						<input type="submit" name="go" value="Submit" />
					</form>
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
