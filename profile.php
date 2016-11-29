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
						echo 'Hello '.$userName.'';?>
					<form id="edit-profile" action="actions.php" method="post">
						<label for="your-user">Change Username</label><br />
						<input type="text" name="change-user" /><br />
						<input type="hidden" value="changeusergo" name="actionSelect" />
						<input type="submit" name="go" value="Update Password" />
						<label for="email">Update Email</label><br />
						<input type="text" name="change-email" /><br />
						<input type="hidden" value="changeemailgo" name="actionSelect" />
						<input type="submit" name="go" value="Update Email" />
						<label for="email">Update Password</label><br />
						<input type="text" name="change-password" /><br />
						<input type="hidden" value="changepassgo" name="actionSelect" />
						<input type="submit" name="go" value="Update Password" />
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

