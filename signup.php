<?php
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

if (isset($_POST ["submit"]))
{
			$pass = $_POST["salt"].md5($_POST["pass"]).$_POST["salt"];
				$finalpass = md5($pass);
			$sql = "INSERT into admin (userid,nama,password,salt) values (
	'".$_POST['userid']."',
	'".$_POST['nama']."',
	'".$finalpass."',
	'".$_POST['salt']."'
	)";
if ( $mysqli->query($sql) === TRUE) {
		echo "New Account has been inserted";
} else {echo "Error :" . $mysqli->error;}
}

	$mysqli->close();
?>