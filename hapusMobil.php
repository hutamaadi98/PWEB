<?php
	if(!isset($_GET['id']))
	{
		header("location : listMobil.php");
	}
	else
	{
		$idmobil = $_GET['id'];
	}

	if (!is_numeric($idmobil)) //mengecek apakah idnya numeric ato gk
	{
		header("location : listMobil.php");
	}
	
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
		echo "Sukses! <BR> <BR>";
	}

	$sql = "DELETE FROM mobil WHERE idmobil = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('i', $idmobil);
	$stmt->execute();

	header("location: listMobil.php");
?>