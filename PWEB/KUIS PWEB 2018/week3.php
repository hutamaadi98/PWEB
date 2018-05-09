<?php
function tambah($a,$b)
{
	$result = $a + $b;
	echo $result;
	return $result;
}

$angka1 = 10;
$angka2 = 20;

$hasil = tambah($angka1,$angka2);
echo "<BR>$hasil";
?> 
