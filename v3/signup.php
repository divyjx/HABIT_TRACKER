<!DOCTYPE html>
<html>
<!--<head>
	<title></title>
</head>-->
<body>
	<h1>SIGNUP</h1>
	<form action="signin.php" method="post">
		Name:
		<input type="text" name="name" required><br>
		Age:
		<input type="number" name="age" required><br>
		Gender:
		<input type="radio" name="male" value="male">Male
		<input type="radio" name="female" value="female">Female<br>
		Email-ID:
		<input type="email" name="email" required><br>
		Username:
		<input type="text" name="username" required><br>
		Password:
		<input type="password" name="password" required><br>
		<!--Confirm password:
		<input type="password" name="password"><br>-->
		<input type="submit" name="SignUp"><br>
	</form>
</body>
</html>