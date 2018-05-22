<?php
	$mysqli = new mysqli("localhost","root","","pweb");

	//$nama = $_POST['nama'];
	$sql = "SELECT * FROM merk";
	$result = $mysqli->query($sql);

	while ($row=$result->fetch_assoc())
	{
		echo "<option value='".$row['idmerk']."'>".$row['nama']."</option>";
	}

	$mysqli->close();
?>