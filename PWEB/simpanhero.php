<?php
$host = "localhost";
$username = "root";
$password  = "mysql";
$namadb = "dota_f";

$mysqli = new mysqli($host,$username,$password,$namadb);
if ($mysqli->connect_errno)
 {
 	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
 }
 if(isset($_POST['is_ranged']))
 	$is_ranged = "true";
 else
 	$is_ranged = "false";
$sql = "INSERT into heroes (name,type,strength,agility,intelligence,damage,armor,is_ranged) values (
	'".$_POST['name']."',
	'".$_POST['type']."',
	'".$_POST['strength']."',
	'".$_POST['agility']."',
	'".$_POST['intelligence']."',
	'".$_POST['damage']."',
	'".$_POST['armor']."',
	'".$is_ranged."'
	)";
if ( $mysqli->query($sql) === TRUE) {
		echo "New hero has been inserted";
} else {echo "Error :" . $mysqli->error;}
$mysqli->close();

?>