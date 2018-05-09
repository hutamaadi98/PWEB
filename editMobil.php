<?php
	if(!isset($_GET['id']))
	{
		header("location : listMobil.php");
	}
	else
	{
		$mobil_id = $_GET['id'];
	}

	if (!is_numeric($mobil_id)) //mengecek apakah idnya numeric ato gk
	{
		header("location : listMobil.php");
	}

	//Connect database
	$host = "localhost";
	$username = "root";
	$password = "";
	$namadb = "pweb";

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

		$sql = "Update mobil set tipe = ?,panjang = ?,lebar = ?,tinggi = ?,jarak_sumbu_roda = ?,radius_putar = ?,harga_min = ?,harga_max = ?,kapasitas_mesin = ?,kapasitas_tangki = ?,ukuran_velg = ?,kapasitas_tangki = ? Where idmobil=?";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("sddddddddds", $_POST['tipe'], $_POST['panjang'], $_POST['lebar'], $_POST['tinggi'], $_POST['jarak_sumbu_roda'], $_POST['radius_putar'], $_POST['harga_min'], $_POST['harga_max'], $_POST['kapasitas_mesin'], $_POST['kapasitas_tangki'], $_POST['ukuran_velg'], $_POST['ukuran_roda'], $idmobil);
		$stmt->execute();
		$hasil = "Data berhasil disimpan";
	}

	// mulai proses cari data di database
	$stmt = $mysqli->prepare("Select * From mobil Where idmobil=?");
	$stmt->bind_param('i', $idmobil);
	$stmt->execute();
	$res = $stmt->get_result();  // tambahkan ini
	$row = $res->fetch_assoc();
?>	

<form method="POST" action="editMobil.php?id=<?php echo $row['idmobil']; ?>">
	<h1> Edit Mobil</h1>
	<p> <?php echo "$hasil"; ?></p> 
	<p> Tipe Mobil : <input type="text" name="name" value="<?php echo $row['name']; ?>"></p>
	<p>	Merk : 
		<select name="type">
			<option value = "Toyota">Toyota</option>
			<option value = "Daihatsu" <?php if($row['type']=='Intelligence') echo "selected" ?> if>Daihatsu</option>
		</select>
	<p>Strength : <input type="text" name="strength" value="<?php echo $row['strength'];?>"></p>
	<p>Agility : <input type="text" name="agility" value="<?php echo $row['agility'];?>"></p>
	<p>Intelligence : <input type="text" name="intelligence" value="<?php echo $row['intelligence'];?>"></p>
	<p>Damage : <input type="text" name="damage" value="<?php echo $row['damage'];?>"></p>
	<p>Armor : <input type="text" name="armor" value="<?php echo $row['armor'];?>"></p>
	<p>Ranged : <input type="checkbox" name="is_ranged" <?php if($row['is_ranged']=='1') echo "checked"?>></p>
	<p><input type="submit" value="simpan" name="btnsimpan"></p>
</form>