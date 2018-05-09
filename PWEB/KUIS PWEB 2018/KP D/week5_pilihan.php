<?php
	$jalan = $_POST["jalan"];
	$m = $_POST["merah"];
	$k = $_POST["kuning"];
	$h = $_POST["hijau"];
	
	$arr["merah"] = $_POST["merah"];
	$arr["kuning"] = $_POST["kuning"];
	$arr["hijau"] = $_POST["hijau"];
	
	print_r($arr);
	echo "<BR>";
	arsort($arr);
	print_r($arr);
	
	$i=1;
	foreach ($arr as $key=>$value)
	{
		if ($i == 1)
			$palinglama = $key;
		elseif ($i == 2)
			$tengah = $key;
		elseif ($i == 3)
			$palingcepat = $key;
			
		$i++;
	}
	echo "<BR>";
	
	echo "<a href='week5_hasil.php?jalan=$jalan&lampu=$palinglama'>Lampu yang paling lama menyala</a><br>";
	echo "<a href='week5_hasil.php?jalan=$jalan&lampu=$palingcepat'>Lampu yang paling cepat menyala</a><br>";
	echo "<a href='week5_hasil.php?jalan=$jalan&lampu=$tengah'>Lampu yang menyala tengah2</a><br>";

?>