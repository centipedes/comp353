<?php
session_start();

include('connDb.php');
if (isset($_SESSION['userName'])) {

	$userID = $_SESSION['id'];
	$query 	= "SELECT * FROM rides WHERE status = 1 AND offerID != '$userID'";
	$res 	= mysql_query($query);
}

?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="./styles/stylesheet.css"/>
		<title> Velocity - View Rides </title>
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
					<?
					if (!isset($_SESSION['userName'])) {
						echo '<p> You are not logged in, you cannot see open rides! </p>';
					} else {
						
						// create table of rides
						$table =  "<table>";
						$table .= "<tr>";
						$table .= "<td>Ride ID</td><td>Driver ID</td><td>Start Destination</td><td>End Destination</td><td></td>";
						$table .= "</tr>";
						
						while($row = mysql_fetch_array($res)) {
						    //$j = $i['whatIwant'];
							$table .= "<tr>";
							$table .= "<td>".$row['ID']."</td><td>".$row['offerID']."</td><td>".$row['start_postal']."</td><td>".$row['end_postal']."</td><td><a href='#'>Take this ride!</a></td>";
							$table .= "</tr>";
						}
						
						$table .= "</table>";
						echo '<h3>Here is a list of rides currently available</h3>';
						echo $table;
						
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
