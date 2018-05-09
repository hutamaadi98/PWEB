<?php
	if(!isset($_GET['id']))
	{
		header("location : week8.php");
	}
	else
	{
		$hero_id = $_GET['id'];
	}

	if (!is_numeric($hero_id)) //mengecek apakah idnya numeric ato gk
	{
		header("location : week8.php");
	}

	//Connect database
	$host = "localhost";
	$username = "root";
	$password = "mysql";
	$namadb = "dota_d";

	$mysqli = mysqli_connect($host, $username, $password, $namadb);

	if (mysqli_connect_errno($mysqli))
	{
		echo "Gagal Connect!", mysqli_connect_error();
	}

	// $res = mysqli_query($mysqli, "SELECT * FROM heroes");
	// atau $res = $mysqli->query("SELECT * from heroes");

	//proses edit data
	$hasil = "";

	if (isset($_POST['btnsimpan'])) //apakah ada yang ngelick tombol simpan
	{
		$isranged = isset($_POST['is_ranged']);

		$sql = "Update heroes set name = ?,type = ?,strength = ?,agility = ?,intelligence = ?,damage = ?,armor = ?,is_ranged = ? Where hero_id=?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("ssddddddd", $_POST['name'], $_POST['type'], $_POST['strength'], $_POST['agility'], $_POST['intelligence'], $_POST['damage'], $_POST['armor'], $isranged, $hero_id);
		$stmt->execute();
		$hasil = "Data berhasil disimpan";
	}

	// mulai proses cari data di database
	$stmt = $mysqli->prepare("Select * From heroes Where hero_id=?");
	$stmt->bind_param('i', $hero_id);
	$stmt->execute();
	$res = $stmt->get_result();  // tambahkan ini
	$row = $res->fetch_assoc();
?>	

<form method="POST" action="Week8_halamanEdit.php?id=<?php echo $row['hero_id']; ?>">
	<h1> Edit Hero</h1>
	<p> <?php echo "$hasil"; ?></p> 
	<p> Nama Hero : <input type="text" name="name" value="<?php echo $row['name']; ?>"></p>
	<p>Tipe: 
		<select name="type">
			<option value = "Strength">Strength</option>
			<option value = "Agility" <?php if($row['type']=='Agility') echo "selected" ?>>Agility</option>
			<option value = "Intelligence" <?php if($row['type']=='Intelligence') echo "selected" ?> if>Intelligence</option>
		</select>
	<p>Strength : <input type="text" name="strength" value="<?php echo $row['strength'];?>"></p>
	<p>Agility : <input type="text" name="agility" value="<?php echo $row['agility'];?>"></p>
	<p>Intelligence : <input type="text" name="intelligence" value="<?php echo $row['intelligence'];?>"></p>
	<p>Damage : <input type="text" name="damage" value="<?php echo $row['damage'];?>"></p>
	<p>Armor : <input type="text" name="armor" value="<?php echo $row['armor'];?>"></p>
	<p>Ranged : <input type="checkbox" name="is_ranged" <?php if($row['is_ranged']=='1') echo "checked"?>></p>
	<p><input type="submit" value="simpan" name="btnsimpan"></p>
</form>



