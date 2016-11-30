<?php
session_start();

include('connDb.php');
if (isset($_SESSION['userName'])) {

	$userID = $_SESSION['id'];
	$query 	= "SELECT * FROM messages WHERE receiveID = '$userID'";
	$res 	= mysql_query($query);
}

?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="./styles/stylesheet.css"/>
		<title> Velocity - Send Message </title>
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
					<? if (!isset($_SESSION['userName'])) : ?>
						<p> You are not logged in, you cannot send messages! </p>
					<? else : ?>
						<form id="sendMessage" action="actions.php" method="post">
							<? if (isset($_GET['sendTo'])) : ?>
								<label for="messageTo">To</label><br />
								<input type="text" name="messageTo" value="<? echo $_GET['sendTo'] ?>" /><br />
							<? else : ?>
								<label for="messageTo">To</label><br />
								<input type="text" name="messageTo" /><br />
							<? endif; ?>							
							<label for="message">Message</label><br />
							<textarea name="message" style="resize: none;"></textarea><br />
							<input type="hidden" value="send-message" name="actionSelect" />
							<input type="submit" name="go" value="Submit" />
						</form>
					<? endif; ?>
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
