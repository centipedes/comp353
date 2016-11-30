<html>	
<head>
<title>Velocity - Register</title>
</head>
<body>
<center>
	<h2> Address & Billing </h2>
	<form id="register2" action="actions.php" method="post">
		<!-- For the addresses, we're going to want to utilize Google maps/postal service type thing where 
			they match your civic + postal code to deliver your full address-->
		<p><b>Home Address</b></p>
		<label for="home-pc">Home Postal Code</label><br />
		<input type="text" name="home-pc" /><br />
		<label for="home-civic">Civic Number</label><br />
		<input type="text" name="home-civic" /><br />
		<label for="phonenum">Phone Number</label><br />
		<input type="text" name="phonenum" </input><br />
		<!-- Apt number is an optional form constraint 
		<label for="home-apt">Apartment number</label><br />
		<input type="text" name="home-apt" /><br />-->
		<p><b>Billing Address</b></p>
		<label for="last-name">Last Name</label><br />
		<input type="text" name="last-name" /><br />
		<label for="first-name">First Name</label><br />
		<input type="text" name="first-name" /><br />
		<label for="billing-pc">Billing Postal Code</label><br />
		<input type="text" name="billing-pc" /><br />
		<label for="billing-civic">Civic number</label><br />
		<input type="text" name="billing-civic" /><br />
		<!-- Apt number is an optional form constraint 
		<label for="billing-apt">Apartment number</label><br />
		<input type="text" name="billing-apt" /><br /> -->
		<p><b>Credit Card Information</b></p>
		
		<label for="ccname">Name on Credit Card</label><br />
		<input type="text" name="ccname"/><br />
		<label for="ccnum">Credit Card Number</label><br />
		<input type="text" name="ccnum"/><br />
		<label for="expd">Expiration Date</label><br />
		<input type="text" name="expd"/><br />
		<label for="ccv">CCV</label><br />
		<input type="text" name="ccv" /><br />
		<br/>
		<input type="submit" name="go" value="Submit" />
	</form>
</center>
</body>
</html>
