<?php
session_start();

include('connDb.php');
if (isset($_SESSION['userName'])) {

	$userID = $_SESSION['id'];
	$query 	= "SELECT * FROM messages WHERE receiverID = '$userID'";
	$res 	= mysql_query($query);
}

?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="./styles/stylesheet.css"/>
		<title> Velocity - Messages </title>
	</head>

	<body>
		<!-- BEGIN HEADER -->
		<div id="header">
			<div id="logo">
				<center><h1>Messages</h1></center>
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
					<?
					if (!isset($_SESSION['userName'])) {
						echo '<p> You are not logged in, you cannot see messages! </p>';
					} else {
						echo "<a href='./sendMessage.php'>Send Message</a> <br />";
						// create table of messages
						if (mysql_num_rows($res) != 0) {
							$table =  "<table>";
							$table .= "<tr>";
							$table .= "<td>From</td><td>Message</td><td></td>";
							$table .= "</tr>";
							
							while($row = mysql_fetch_array($res)) {
							    //$j = $i['whatIwant'];
								$table .= "<tr>";
								$table .= "<td>".$row['sendID']."</td><td>".$row['message']."</td><td><a href='./sendMessage.php?sendTo=".$row['sendID']."'>Reply</a></td>";
								$table .= "</tr>";
							}
							
							$table .= "</table>";
							echo '<h3>Here are your messages</h3>';
							echo $table;
						} else {
							echo 'You have no messages! <br />';
						}
						
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
