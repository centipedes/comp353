<?php
session_start();
// Includes

include('connDb.php');


// Connect to DB

$actionSelect = $_REQUEST['actionSelect'];

switch($actionSelect){

	case 'register-user':
		
		$userName    =    $_POST['user-reg'];
 		$password    =    $_POST['pw-reg'];
		$password    =    md5($password);
		$email       =    $_POST['email-reg'];
		$query    =    "insert into users(username,password,email, status, admin)values('$userName','$password','$email', 1, 0)";
		$res    =    mysql_query($query);		
		echo 'Thanks, '.$userName.', you are now registered for Velocity! <br/>';	
		echo 'Click <a href="./">here</a> to go home.';		
		//header("Location: index.php");		
		//die();
			
	break;

	case 'login-user':
		
		$userName    =    $_POST['user-login']; 
		$password    =    $_POST['pw-login'];
		$password    =    md5($password);
		
		$query 	= "select * from users where username='$userName' and password='$password'"; 
		$res    = mysql_query($query);
		$row	= mysql_fetch_array($res);
		$rows 	= mysql_num_rows($res); 
		//echo $rows;
		if($rows==1) {
			$_SESSION["userName"] = $userName ;
			$_SESSION["password"] = $password ;
			$_SESSION["id"]       = $row["ID"];
			$_SESSION["admin"]    = $row["admin"];
			$_SESSION['status']   = $row['status'];
		} else {
			header("Location: login.php");		
			die();
		}
		header("Location: index.php");		
		die();

	break;
	
	case 'offer-ride':
		
		$startPostal 	= $_POST['startPostal'];
		$endPostal		= $_POST['endPostal'];
		$offererId		= $_SESSION['id'];
		// status 0 = open, 1 = accepted, 2 = completed
		$query    =    "insert into rides(offerID,start_postal, end_postal, status)values('$offererId','$startPostal','$endPostal', 0)";
		$res    =    mysql_query($query);		
		
		echo 'Thanks, '.$_SESSION['userName'].', your ride has been created. <br />';
		echo 'Click <a href="./">here</a> to go home.';	
	
	break;
	
	case 'take-ride':
		
		if (!isset($_SESSION['userName'])) {
			echo "You are not logged in! Please <a href='./login.php'>login</a> here. <br />";
				
		} else {
			$rideID 		= $_GET['rideID'];
			$riderID		= $_SESSION['id'];			
			$query   		= "UPDATE rides SET riderID = ".$riderID.", status = 1 WHERE ID = $rideID";
			$res    		= mysql_query($query);	
			echo 'Thanks, '.$_SESSION['userName'].', you have taken a ride! <br />';
			echo 'Your ride ID is '.$rideID.'. <br/>';
			echo 'Click <a href="./">here</a> to go home.';	
		}

	break;
	
	case 'makeAdmin':
		
		if (!isset($_SESSION['userName'])) {
			echo "You are not logged in! Please <a href='./login.php'>login</a> here. <br />";
		} else if (!$_SESSION['admin']) {
			echo "You are not admin! Bye. <a href='./'>HOME</a><br />";	
		} else {
			$idToPromote	= $_GET['id'];		
			$query   		= "UPDATE users SET admin = 1 WHERE ID = $idToPromote";
			$res    		= mysql_query($query);	
			echo 'User number '.$idToBan.' has been promoted! <br />';
			echo 'Click <a href="./admin.php">here</a> to go back to admin.';	
		}

	break;
	
	case 'ban':
		
		if (!isset($_SESSION['userName'])) {
			echo "You are not logged in! Please <a href='./login.php'>login</a> here. <br />";
		} else if (!$_SESSION['admin']) {
			echo "You are not admin! Bye. <a href='./'>HOME</a><br />";	
		} else {
			$idToBan 		= $_GET['id'];		
			$query   		= "UPDATE users SET status = 0 WHERE ID = $idToBan";
			$res    		= mysql_query($query);	
			echo 'User number '.$idToBan.' has been banned! <br />';
			echo 'Click <a href="./admin.php">here</a> to go back to admin.';	
		}

	break;
	
	case 'unban':
		
		if (!isset($_SESSION['userName'])) {
			echo "You are not logged in! Please <a href='./login.php'>login</a> here. <br />";
		} else if (!$_SESSION['admin']) {
			echo "You are not admin! Bye. <a href='./'>HOME</a><br />";	
		} else {
			$idToUnban 		= $_GET['id'];		
			$query   		= "UPDATE users SET status = 1 WHERE ID = $idToUnban";
			$res    		= mysql_query($query);	
			echo 'User number '.$idToUnban.' has been unbanned! <br />';
			echo 'Click <a href="./admin.php">here</a> to go back to admin.';	
		}

	break;
	
	case 'deleteRide':
		
		if (!isset($_SESSION['userName'])) {
			echo "You are not logged in! Please <a href='./login.php'>login</a> here. <br />";
		} else if (!$_SESSION['admin']) {
			echo "You are not admin! Bye. <a href='./'>HOME</a><br />";	
		} else {
			$rideToDelete	= $_GET['id'];		
			$query   		= "UPDATE rides SET deleted = 1 WHERE ID = $rideToDelete";
			$res    		= mysql_query($query);	
			echo 'Ride number '.$rideToDelete.' has been deleted! <br />';
			echo 'Click <a href="./admin.php">here</a> to go back to admin.';	
		}

	break;
	
	case 'take-ride':
		
		if (!isset($_SESSION['userName'])) {
			echo "You are not logged in! Please <a href='./login.php'>login</a> here. <br />";
				
		} else {
			$rideID 		= $_GET['rideID'];
			$riderID		= $_SESSION['id'];			
			$query   		= "UPDATE rides SET riderID = ".$riderID.", status = 1 WHERE ID = $rideID";
			$res    		= mysql_query($query);	
			echo 'Thanks, '.$_SESSION['userName'].', you have taken a ride! <br />';
			echo 'Your ride ID is '.$rideID.'. <br/>';
			echo 'Click <a href="./">here</a> to go home.';	
		}

	break;

	case 'send-message':
		
		$senderId		= $_SESSION['id'];
		$messageTo	 	= $_POST['messageTo'];
		$message		= $_POST['message'];		
		
		$query    =    "insert into messages(sendID, receiverUsername, message)values('$senderId','$messageTo','$message')";
		$res    =    mysql_query($query);		

		echo 'Your message has been sent to '.$messageTo.'.<br />';
		echo 'Click <a href="./">here</a> to go home.';	
	
	break;
	
	case 'leaveComment':
		
		$commenterId	= $_SESSION['id'];
		$comment	 	= $_POST['comment'];
		$rideId 		= $_POST['rideID'];		
		
		$query    =    "insert into comments(rideID, commenterID, comment)values('$rideId','$commenterId','$comment')";
		$res    =    mysql_query($query);		

		echo 'Your comment has been submitted. <br />';
		echo 'Click <a href="./ride.php?id='.$rideId.'">here</a> to go back.';	
	
	break;
	
	case 'change-password':
		$newPassword		=	$_POST['change-pw'];
		$password			=	md5($newPassword);
		$userID				= 	$_SESSION['id'];
		
		$query		= "update users(password)values('$password') where ID = '$userID'";
		$res		= mysql_query($query);
		
		echo 'Your password has been updated.';
		echo 'Click <a href="./">here</a> to go home.';	
		
	break;
		
		
	default:
		
		echo 'Restricted page, please leave.';

} 




?>
