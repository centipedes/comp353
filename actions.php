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
		$query    =    "insert into users(ID,username,password,email, status)values('','$userName','$password','$email', 1)";
		$res    =    mysql_query($query);		
		echo 'Thanks, '.$userName.', you are now registered for Virbizz!';		
		header("Location: index.php");		
		die();
			
	break;

	case 'login-user':
		
		$userName    =    $_POST['user-login']; 
		$password    =    $_POST['pw-login'];
		$password    =    md5($password);
		
		$query = "select * from users where username='$userName' and password='$password'"; 
		$res    =    mysql_query($query);
		$rows = mysql_num_rows($res); 
		//echo $rows;
		if($rows==1) {
			$_SESSION["userName"] = $userName ;
			$_SESSION["password"] = $password ;
		}
		header("Location: index.php");		
		die();

	break;

	default:
		
		echo 'Restricted Page';

} 




?>