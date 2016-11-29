<?php
session_start();
// Includes

include('connDb.php');


// Connect to DB

$actionSelect = $_POST['actionSelect'];

switch($actionSelect){

	case 'register-user':
		
		$userName    =    $_POST['user-reg'];
 		$password    =    $_POST['pw-reg'];
		$password    =    md5($password);
		$email       =    $_POST['email-reg'];
		$query    =    "insert into users(username,password,email, status)values('$userName','$password','$email', 1)";
		$res    =    mysql_query($query);		
		echo 'Thanks, '.$userName.', you are now registered for Velocity!';		
		header("Location: index.php");		
		die();
			
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
		
		$query    =    "insert into rides(offerID,start_postal, end_postal, status)values('$offererId','$startPostal','$endPostal', 1)";
		$res    =    mysql_query($query);		
		
		echo 'Thanks, '.$_SESSION['userName'].', your ride has been created. <br />';
		echo 'Click <a href="./">here</a> to go home.';	
	
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
		
		echo 'Restricted Page';

} 




?>
