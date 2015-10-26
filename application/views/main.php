<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Wishes Log In</title>

	<style type="text/css">
	span{
		font-size: 12px;
	}
	</style>
</head>
<body>
	<h2>Welcome</h2>

	<?=  $this->session->flashdata("errors")?>
	<h3>Log in</h3>
	<form action = "/users/login" method = "post">
		<p>Email: <input type = "text" name = "email"></p>
		<p>Password: <input type = "password" name = "password"></p>
		<input type = "submit" value = "Log me in!">
	</form>

	<h3>Register</h3>
	<form action = "/users/register" method = "post">
		<p>First Name: <input type = "text" name = "first"></p>
		<p>Username: <input type = "text" name = "username"></p>
		<p>Email: <input type = "text" name = "email"></p>
		<p>Password: <input type = "password" name = "password"></p>
		<span id = "tiny">*Passowrd should be at least 8 characters</span>
		<p>Confirm PW: <input type = "password" name = "confirm"></p>
		<p>Birthday <input type = "date" name = "birthday"></p>

		<input type = "submit" value = "Register!">
	</form>
	<?=  $this->session->flashdata("success")?>
</body>
</html>