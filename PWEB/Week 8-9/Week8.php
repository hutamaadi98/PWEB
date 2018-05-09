<html>
<head>
	<title></title>
</head>
<body>
	<form>
		<p> Input Keyword : <input type ="text" name = "katakunci">
		<button type="submit">Cari</button></p>
	</form>
<?php
	
	$host = "localhost";
	$username = "root";
	$password = "";
	$namadb = "dota_d";

	$mysqli = mysqli_connect($host, $username, $password, $namadb);

	if (mysqli_connect_errno($mysqli))
	{
		echo "Gagal Connect!", mysqli_connect_error();
	}
	else
	{
		echo "Sukses! <BR> <BR>";
	}

	$katakunci = "";
	if (isset($_GET['katakunci'])) {
		$katakunci = $_GET['katakunci'];
		echo "Pencarian untuk '".$katakunci."' : </p> <BR>";
	}

	$jumlah_per_halaman = 5;
	$start_data = 0;

	if (isset($_GET['start']))
	{
		$start_data = $_GET['start'];
	}

	$sql = "SELECT * from heroes WHERE name Like ?";
	$stmt = $mysqli->prepare($sql);
	// $katakunci = "%".$katakunci."%";
	$like = "%".$katakunci."%";
	$stmt->bind_param('s', $like);
	$stmt->execute();
	$res = $stmt->get_result();  // tambahkan ini

	$jumlah_data = $res->num_rows;
	$jumlah_halaman = ceil($jumlah_data/$jumlah_per_halaman);

	// $sql = "SELECT * from heroes WHERE name Like ? Limit ?,?";
	// $stmt = $mysqli->prepare($sql);
	// // $katakunci = "%".$katakunci."%";
	// $like = "%".$katakunci."%";
	// $stmt->bind_param('sii', $like, $start_data, $jumlah_per_halaman);
	// $stmt->execute();
	// $res = $stmt->get_result();  // tambahkan ini
?>

 <table border='1'> 
 	<tr>
 		<th>Hero ID</th> 
 		<th>Name</th> 
 		<th>Type</th> 
 		<th>Strength</th> 
 		<th>Agility</th> 
 		<th>Intelligence</th>
 		<th>Damage</th> 
 		<th>Armor</th>
 		<th>Is_Ranged</th> 
 		<th>Action</th>
 	</tr>

<?php
	while ($row = $res->fetch_assoc()){
		echo "<tr> 
		<td><img width='50' height='50' src='gambar_hero/".$row['hero_id'].".jpg'></td> 
		<td>" . $row['name'] . "</td> 
		<td>" . $row['type'] . "</td> 
		<td>" . $row['strength'] . "</td> 
		<td>" . $row['agility'] . "</td> 
		<td>" . $row['intelligence'] . "</td> 
		<td>" . $row['damage'] . "</td> 
		<td>" . $row['armor'] . "</td> 
		<td>" . $row['is_ranged'] . "</td> 
		<td> <a href='Week8_halamanEdit.php?id=".$row['hero_id']."'> edit </a> 
			 <a href='halamanUpload.php?id=".$row['hero_id']."'> upload </a>
		     <a href='Week8_halamanDelete.php?id=".$row['hero_id']."'> delete </a> </td>
		</tr>";
	}

	echo "<table>";
	mysqli_close($mysqli);

	// echo "<a href ='week8.php?start=".$start_data."&katakunci=".$katakunci."'> First </a> &nbsp; ";

	// $last = "";
	// for($page=1; $page<=$jumlah_halaman; $page++){
	// 	$st = ($page-1) * $jumlah_per_halaman;
	// 	echo "<a href ='week8.php?start=".$st."&katakunci=".$katakunci."'>".$page."</a> &nbsp; ";
	// 	$last = $st;
	// }

	// echo "<a href ='week8.php?start=".$last."&katakunci=".$katakunci."'> Last </a> &nbsp; ";
?>

</body>
</html>