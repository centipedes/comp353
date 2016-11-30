<?php
session_start();

include('connDb.php');
if (isset($_SESSION['userName'])) {
	$rideID = $_GET['id'];
	$query 	= "SELECT *, (SELECT username FROM users WHERE ID = offerID) as driverUser, (SELECT username FROM users WHERE ID = riderID) as riderUser FROM rides WHERE ID = '$rideID'";
	$commentQuery = "SELECT *, (SELECT username FROM users WHERE ID = commenterID) as commenter FROM comments WHERE rideID = $rideID";
	$res 	= mysql_query($query);
	$resComment = mysql_query($commentQuery);
}
 
?>

<html>

	<head>
		<link rel="stylesheet" type="text/css" href="./styles/stylesheet.css"/>
		<title> Velocity - Ride </title>
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
				<center><h1>Ride #<? echo $rideID; ?></h1></center>
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
						echo '<p> You are not logged in, you cannot see this ride! </p>';
					} else {
						
						if (mysql_num_rows($res) != 0) {
							$table =  "<table>";
							$table .= "<tr>";
							$table .= "<td>ID</td><td>Driver</td><td>Rider</td><td>Status</td>";
							$table .= "</tr>";
							
							while($row = mysql_fetch_array($res)) {
							    
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
								$table .= "<td>".$row['ID']."</td><td>".$row['driverUser']."</td><td>".$rider."</td><td>".$status."</td>";
								$table .= "</tr>";
								
							}
							
							$table .= "</table>";
							echo '<h3>Here are the ride details</h3>';
							echo $table;

						} else {
							echo 'This ride does not exist! <br />';
						}
						
					}
					?>
					
					<!-- ADD COMMENT SECTION -->
					
					<? if (mysql_num_rows($res) != 0) : ?> <!-- ride exists -->
					
					<h4> Leave a comment </h4>
					<?
					
					if (mysql_num_rows($resComment) != 0) {
							$table =  "<table>";
							$table .= "<tr>";
							$table .= "<td>Username</td><td>Comment</td>";
							$table .= "</tr>";
							
							while($row = mysql_fetch_array($resComment)) {
								$table .= "<tr>";
								$table .= "<td>".$row['commenter']."</td><td>".$row['comment']."</td>";
								$table .= "</tr>";
							}
							$table .= "</table>";
							
							echo $table;

						} else {
							echo 'There are no comments yet, add one! <br /> <br /> <br />';
						}
					?>
					<form id="leaveComment" action="actions.php" method="post">							
							<label for="comment">Comment</label><br />
							<textarea name="comment" style="resize: none;"></textarea><br />
							<input type="hidden" value="<? echo $rideID ?>" name="rideID" />
							<input type="hidden" value="leaveComment" name="actionSelect" />
							<input type="submit" name="go" value="Submit" />
					</form>
					
					<? endif; ?>
					
					
					<!-- END COMMENT SECTION -->
					
					
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
