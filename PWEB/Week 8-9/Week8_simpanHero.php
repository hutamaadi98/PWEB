<?php
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

	// echo "<pre>";
	// vardump();
	// echo "</pre>";

	if (isset($_POST['is_ranged']))
	{
		$isranged = "true";
	}
	else
	{
		$isranged = "false";
	}

	$sql = "INSERT INTO heroes(name,type,strength,agility,intelligence,damage,armor,is_ranged) VALUES (
		'".$_POST['name']."', 
		'".$_POST['type']."', 
		'".$_POST['strength']."', 
		'".$_POST['agility']."',
		'".$_POST['intelligence']."',
		'".$_POST['damage']."', 
		'".$_POST['armor']."', 
		".$isranged.")";

	// $sql = "INSERT INTO heroes(name,type,strength,agility,intelligence,damage,armor,is_ranged) VALUES (?,?,?,?,?,?,?,?)";

	// $stmt = $mysqli->prepare($sql);

	// $smt->bind_param("sssdddd", $name, $type, $strength, $agility, $intelligence, $damage, $armor, $is_ranged);

	// $stmt->execute();
	// echo ($stmt->affected rows." Row Inserted.");
	// echo ($stmt->affected rows." Row Inserted and the last id is " . $stmt->insert_id);

	// $stmt->close();

	$res = $mysqli->query($sql);
	echo "HERO " . $_POST['name']. " TERSIMPAN!";
	$mysqli->close();
?>