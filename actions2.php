<?php
session_start();
// Includes

include('connDb.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Action </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/jumbotron.css"/>
  </head>

  <body>

    <div class="container">

    <!-- nav start -->
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-xs-right">
            <li class="nav-item">
              <a class="nav-link " href="./">Home</a>
            </li>
            <? if (isset($_SESSION['userName'])) : ?>
            <li class="nav-item">
              <a class="nav-link" href="./offerRide.php">Offer Ride</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./rides.php">View Ride Offers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./myRides.php">My Rides</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./messages.php">Messages</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./logout.php">Logout</a>
            </li>
            <? else : ?>
            <li class="nav-item">
              <a class="nav-link" href="./register.php">Register <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./login.php">Login</a>
            </li>
            <? endif; ?>
            </ul>
          </nav>
        <h3 class="text-muted">Velocity</h3>
      </div>

      <!-- nav end -->

<?php



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



      <br />



      <footer class="footer">
        <p>&copy; Velocity 2016</p>
      </footer>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
  </body>
</html>
