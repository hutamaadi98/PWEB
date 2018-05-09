<?php
	if(!isset($_GET['id']))
	{
		header("location : week8.php");
	}
	else
	{
		$hero_id = $_GET['id'];
	}

	if (!is_numeric($hero_id)) //mengecek apakah idnya numeric ato gk
	{
		header("location : week8.php");
	}
	
	$host = "localhost";
	$username = "root";
	$password = "mysql";
	$namadb = "dota_d";

	$mysqli = mysqli_connect($host, $username, $password, $namadb);

	if (mysqli_connect_errno($mysqli))
	{
		echo "Gagal Connect!", mysqli_connect_error();
	}
	else
	{
		echo "Sukses! <BR> <BR>";
	}

	$sql = "DELETE FROM heroes WHERE hero_id = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param('i', $hero_id);
	$stmt->execute();

	header("location: Week8.php");
?>