<html>

	<head>
		<link rel="stylesheet" type="text/css" href="./styles/stylesheet.css"/>
		<title> Virbizz - Online Business Game </title>
	</head>

	<body>
		<!-- BEGIN HEADER -->
		<div id="header">
			<div id="logo">
				<center><h1>Virbizz 1.0</h1></center>
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
					<h2> Login </h2>
					<form id="create-bizz" action="actions.php" method="post">
						<label for="your-user">Username</label><br />
						<input type="text" name="user-login" /><br />
						<label for="your-pw">Password</label><br />
						<input type="password" name="pw-login" /><br />
						<input type="hidden" value="login-user" name="actionSelect" />
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