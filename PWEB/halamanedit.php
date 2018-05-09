<?php
if(!isset($_GET['id']))
{
header("location:week8.php");
}
$hero_id = $_GET['id'];
if(!is_numeric($hero_id))
header("location:week8.php");

$host = "localhost";
$username = "root";
$password  = "mysql";
$namadb = "dota_f";

$mysqli = new mysqli($host,$username,$password,$namadb);
if ($mysqli->connect_errno)
 {
 	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
 }
//edit Data
 if(isset($_POST['btnsimpan']))
{
	
 	$is_ranged = isset($_POST['is_ranged']);
 $sql = "Update heroes set name = ?,type = ?,strength =?,agility=?,intelligence=?,damage=?,armor=?,is_ranged=? where hero_id=?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssddddddd",$_POST['name'],$_POST['type'],$_POST['strength'],$_POST['agility'],$_POST['intelligence'],$_POST['damage'],
	$_POST['armor'],$is_ranged, $hero_id);
	$stmt->execute();
	$hasil = "Data berhasil disimpan";
}

$stmt = $mysqli->prepare("Select * From heroes Where hero_id=?");
$stmt->bind_param('i', $hero_id);
$stmt->execute();
$res = $stmt->get_result();  // tambahkan ini
$row = $res->fetch_assoc();


?>


<h1>EDIT HERO : </h1>
<form action = "halamanedit.php?id=<?php echo $row['hero_id'];?>" method = "POST">

Nama Hero: <input type = "text" name = "name" value="<?php echo $row['name'];?>"> <BR>
Tipe: <select  name = "type" value= "<?php echo $row['type'];?>">
<option value = "Strength">Strength</option>
<option value = "Agility" <?php if ($row['type'] == 'Agility') echo "selected";?>>Agility</option>
<option value = "Intelligence" <?php if ($row['type'] == 'Intelligence' );?>>Intelligence</option> </select><BR>
Strength <input type = "text" name = "strength" value= "<?php echo $row['strength'];?>"> <BR>
Agility <input type = "text" name = "agility" value= "<?php echo $row['agility'];?>"> <BR>
Intelligence <input type = "text" name = "intelligence" value= "<?php echo $row['intelligence'];?>"> <BR>
Damage <input type = "text" name = "damage" value= "<?php echo $row['damage'];?>"> <BR>
Armor <input type = "text" name = "armor" value= "<?php echo $row['armor'];?>"> <BR>
Ranged <input type = "checkbox" name = "is_ranged" <?php if ($row['is_ranged'] == 1 )echo "checked";?>> <BR>
<input type = "submit" name ="btnsimpan" value = "simpan"> <BR>
<?php

echo $hasil?>