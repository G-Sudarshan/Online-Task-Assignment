<!DOCTYPE html>
<html>
<head>
	<title>Welcome </title>
</head>
<body>
	<center>
		<form action="signup.php" method="POST">

			Name : <input type="text" name="name"><br/><br/>
			Surname : <input type="text" name="surname"><br/><br/>
			Birthdate: <input type="date" name="birthdate"><br/><br/>
			City : <input type="text" name="city"><br/><br/>
			E mail : <input type="email" name="mail"><br/><br/>
			Password <input type="password" name="password"><br/><br/>
			

			 <input type="submit" value="signup">
			

		</form>
             <hr/>
		<form action="login.php" method="POST">
              
              Email/Username : <input type="email" name="mail" ><br/><br/>
              password : <input type="password" name="password"><br/><br/>
			<input type="submit" value="login">


		</form>
	</center>

</body>
</html>