<?php
	function tambah($a, $b=0)
	{
		$hasil = $a + $b;
		$a = 20;
		//echo $hasil;
		return $hasil;
	}

	$angka1 = 10;
	$angka2 = 20;

    $hasil = tambah($angka1,$angka2);
    echo "<BR> $hasil";
    echo "<BR> $angka1";

    $hasil = tambah($angka1);
    echo "<BR> $hasil";
?>