<?php
session_start();

include('connDb.php');
if (isset($_SESSION['userName'])) {
	$userId = $_SESSION['id'];
	$queryDriver 	= "SELECT *, (SELECT username FROM users WHERE ID = riderID) as riderUser FROM rides WHERE offerID = '$userId'";
	$queryRider 	= "SELECT *, (SELECT username FROM users WHERE ID = offerID) as driverUser FROM rides WHERE riderID = '$userId'";
	
	echo "<br/>";
	
	$res1 	= mysql_query($queryDriver);
	$res2 	= mysql_query($queryRider);
}
 
?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="./styles/stylesheet.css"/>
		<title> Velocity - Messages </title>
		<style>
		table {
			width: 50%;
		}
		tr:nth-child(even) {background-color: #f2f2f2}
		th, td {
			border-bottom: 1px solid #ddd;
		}
		</style>
	</head>

	<body>
		<!-- BEGIN HEADER -->
		<div id="header">
			<div id="logo">
				<center><h1>My Rides</h1></center>
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
						echo '<p> You are not logged in, you cannot see your rides! </p>';
					} else {
						
						// create table of rides
						if (mysql_num_rows($res1) != 0) {
							echo "<h3>My Rides as a Driver</h3><br />";
							$table =  "<table>";
							$table .= "<tr>";
							// last two columns are message and mark complete
							$table .= "<td>Ride ID</td><td>Driver</td><td>Rider</td><td>Status</td><td></td><td></td>";
							$table .= "</tr>";
							
							while($row = mysql_fetch_array($res1)) {
								
								if (!$row['deleted']) {
									if ($row['status'] == 0) {
										$status = "Open";
									} else if ($row['status'] == 1) {
										$status = "Accepted";
									} else {
										$status = "Complete";
									}
									
									if ($row['riderUser'] == "") {
										$rider = "None Yet";
									} else {
										$rider = $row['riderUser'];
									}
									
									$table .= "<tr>";
									$table .= "<td><a href='./ride.php?id=".$row['ID']."'>".$row['ID']."</a></td><td>You</td><td>".$rider."</td><td>".$status."</td>";
									if ($row['riderUser'] != "") {
										$table .= "<td><a href='./sendMessage.php?sendTo=".$rider."'>Message</a></td><td><a href='#'>Ride Complete</a></td>";
									}								
									$table .= "</tr>";
								}
								
							}
							
							$table .= "</table>";
							
							echo $table;
						}

						if (mysql_num_rows($res2) != 0) {
							echo "<h3>My Rides as a Rider</h3><br />";
							$table =  "<table>";
							$table .= "<tr>";
							$table .= "<td>Ride ID</td><td>Driver</td><td>Rider</td><td>Status</td><td></td>";
							$table .= "</tr>";

							while($row = mysql_fetch_array($res2)) {
								
								if (!$row['deleted']) {
									if ($row['status'] == 0) {
										$status = "Open";
									} else if ($row['status'] == 1) {
										$status = "Accepted";
									} else {
										$status = "Complete";
									}
									
									$table .= "<tr>";
									$table .= "<td><a href='./ride.php?id=".$row['ID']."'>".$row['ID']."</a></td><td>".$row['driverUser']."</td><td>You</td><td>".$status."</td>";
									$table .= "</tr>";
								}
								
								
							}
							
							$table .= "</table>";
							echo $table;
						} 
						
						if (mysql_num_rows($res1) == 0 && mysql_num_rows($res2) == 0) {
							echo "<p>You have no rides!</p><br />";
							echo "<a href='./'>Click here to go home</a>";
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
