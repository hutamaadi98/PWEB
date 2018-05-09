<?php

$name = array_filter($_POST['nama']);
$len = (int)(count($name));
$option = $_POST['pilihan'];

if(empty($name)){
	echo "Tidak ada nama yang diinput";
}
else {
	echo "Ada $len nama yaitu: <br><br>";
	
	switch ($option) {
		case 'asc': sort($name);
			break;
		case 'desc': rsort($name);
			break;
		case 'rand': shuffle($name);
			break;
		default: break;
	}

	printArray($name);
}

function printArray($array){
	foreach ($array as $key) {
	 	echo "$key <br>";
	}
}