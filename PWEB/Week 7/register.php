<?php
	session_start();

	if (isset($_POST["submit"]))
	{
		$salt = "thisissalt";
		$_SESSION["user"] = $_POST["user"];

		$finalpass = $salt . md5($_POST["pass"]) . $salt;
		$_SESSION["pass"] = md5($finalpass);

		$_SESSION["salt"] = $salt;

		print_r($_SESSION);
	}
?>

<form method="post" action="register.php">
	Username: <input type="text" name="user" /><BR>
	Password: <input type="password" name="pass" /><BR>
	<input type="submit" name="submit" value="Daftar" />

</form>