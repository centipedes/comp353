<html>	
<head>
<title>Velocity - Register</title>
</head>
<body>
<center>
	<h2> REGISTER </h2>
	<form id="register" action="actions.php" method="post">
		<label for="user-reg">Username</label><br />
		<input type="text" name="user-reg" /><br />
		<label for="email-reg">Email</label><br />
		<input type="text" name="email-reg" /><br />
		Date of Birth: d/m/y
		<label for="bday"></label><br />
		<input type="text" name="bday" />
		<label for="bmonth"></label>
		<input type="text" name="bmonth" />
		<label for="byear"></label>
		<input type="text" name="byear" /><br />
		<label for="pw-reg">Password</label><br />
		<input type="password" name="pw-reg" /><br />
		<label for="passwordRe">Re-Enter Password</label><br />
		<input type="password" name="passwordRe" /><br />
		<input type="hidden" value="register-user" name="actionSelect" />
		<input type="submit" name="go" value="Continue" />
	</form>
</center>
</body>
</html>