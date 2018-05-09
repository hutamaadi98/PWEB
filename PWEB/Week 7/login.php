<?php
	session_start();

	if (isset($_SESSION["waktu"]))
	{
		$time = strtotime("now")-$_SESSION["waktu"];
		echo "Anda tadi login ". $time ." detik yang lalu <BR>";
	}

	if (isset($_POST["submit"]))
	{
		// $finalpass = $salt . md5($_POST["pass"]) . $salt;
		// $_SESSION["pass"] = md5($finalpass);
		$pass = $_SESSION["salt"] . md5($_POST["pass"]) . $_SESSION["salt"];
		$finalpass = md5($pass);

		if (($_SESSION["user"] == $_POST["user"]) && ($finalpass == $_SESSION["pass"]))
			echo "Login Sukses. <BR>";
		else
			echo "Login Gagal. <BR>";
	
		$_SESSION["waktu"] = strtotime("now");
	}
?>

<form method="post" action="login.php">
	Username: <input type="text" name="user" /><BR>
	Password: <input type="password" name="pass" /><BR>
	<input type="submit" name="submit" value="Login" />

</form>