<?php

	$arrNama = array_filter($_POST["nama"]);
	
	
	if (empty($arrNama))
	{
		echo "Tidak ada nama yang diinput";
	}
	else
	{
		$jumlah = count($arrNama);
		if ($_POST["pilihan"] == "A")
			sort($arrNama);
		elseif ($_POST["pilihan"] == "D")
			rsort($arrNama);
		elseif ($_POST["pilihan"] == "K")
			shuffle($arrNama);
			
		echo "Ada $jumlah nama yaitu: <BR>";
		foreach($arrNama as $temp)
		{
			echo "$temp <BR>";
		}
	}
?>