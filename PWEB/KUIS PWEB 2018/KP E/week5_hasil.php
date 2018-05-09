<?php

	if ($_POST["nama1"] != "") $arrNama[] = $_POST["nama1"];
	if ($_POST["nama2"] != "") $arrNama[] = $_POST["nama2"];
	if ($_POST["nama3"] != "") $arrNama[] = $_POST["nama3"];
	if ($_POST["nama4"] != "") $arrNama[] = $_POST["nama4"];
	if ($_POST["nama5"] != "") $arrNama[] = $_POST["nama5"];

	//print_r($arrNama);
	
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