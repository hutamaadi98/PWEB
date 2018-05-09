<?php

$lampu = array_filter($_POST['lampu']);
$jalan = $_POST['jalan'];
sort($lampu);

$lampus = array();

foreach($lampu as $nama => $persen) {
	$lampus[] = $persen;
}

print_r($lampus);

echo '<p><a href="hasil.php?id=$jalan&user=$lampus[0]">Lampu yang paling cepat menyala</a></p>';
echo '<p><a href="hasil.php?id=$jalan&user=$lampus[2]">Lampu yang paling lama menyala</a></p>';
echo '<p><a href="hasil.php?id=$jalan&user=$lampus[1]">Lampu yang paling menyala di-tengah2</a></p>';
?>
