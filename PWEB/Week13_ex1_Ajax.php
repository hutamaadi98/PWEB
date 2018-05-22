<?php
	$mysqli = new mysqli("localhost","root","mysql","dota_d");

	$type = $_POST['type'];
	$sql = "SELECT name FROM heroes WHERE type = '".$type."'";
	$result = $mysqli->query($sql);

	while ($row=$result->fetch_assoc())
	{
		echo "<option>".$row['name']."</option>";
	}

	$mysqli->close();
?>