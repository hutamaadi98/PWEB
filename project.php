<?php
	session_start();

	$host = "localhost";
	$username = "root";
	$password = "";
	$namadb = "pweb";

	$mysqli = mysqli_connect($host, $username, $password, $namadb);

	if (mysqli_connect_errno($mysqli))
	{
		echo "Gagal Connect!", mysqli_connect_error();
	}
	else
	{
		echo "Connect Sukses! <BR> <BR>";
	}

	if (isset($_POST["submit"]))
		{
			$sql = "SELECT * from admin";
			$stmt = $mysqli->prepare($sql);
			// $katakunci = "%".$katakunci."%";
			// $like = "%".$katakunci."%";
			// $stmt->bind_param('s', $like);
			$stmt->execute();
			$res = $stmt->get_result();  // tambahkan ini

			while ($row = $res->fetch_assoc()){

				$pass = $row["salt"] . md5($_POST["pass"]) . $row["salt"];
				$finalpass = md5($pass);

				if (($_POST["user"] == $row["userid"]) && ($finalpass == $row["password"]))
				{
					$_SESSION["login"] = $_POST["user"];
					header("Location: listMobil.php");
				}
				else
					echo "Login Gagal. <BR>";
		}
	}
?>

<form method="post" action="project.php">
	Username: <input type="text" name="user" /><BR>
	Password: <input type="password" name="pass" /><BR>
	<input type="submit" name="submit" value="Login" />

</form>