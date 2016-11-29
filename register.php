<html>	
<head>
</head>
<body>
<center>
	<h2> REGISTER </h2>
	<form id="create-bizz" action="actions.php" method="post">
		<label for="your-user">Username</label><br />
		<input type="text" name="user-reg" /><br />
		<label for="email">EMail</label><br />
		<input type="text" name="email-reg" /><br />
		<label for="your-pw">Password</label><br />
		<input type="password" name="pw-reg" /><br />
		<label for="your-pw">Re-Enter Password</label><br />
		<input type="password" name="passwordRe" /><br />
		<input type="hidden" value="register-user" name="actionSelect" />
		<input type="submit" name="go" value="Submit" />
	</form>
</center>
</body>
</html>