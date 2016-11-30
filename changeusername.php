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
					<h2> Change Username </h2>
					<p>Please select a new username.</p>
					<form id="change-username" action="actions.php" method="post">
						<label for="new-uname">New Username</label><br />
						<input type="text" name="new-uname" /><br /><br/>
						<input type="hidden" value="change-username" name="actionSelect" />
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
