<html>
<head>
	<h1> Bandingkan Mobil</h1>
</head>
</html>
<?php
session_start();

$name = $_POST['checkbox'];

$total = count($name);

// echo $totalcek;

// echo "<BR><BR>";
// optional
// echo "You chose the following color(s): <br>";

/*foreach ($name as $idmobil){ 
    echo $idmobil. "<br />";
}*/

		if (isset($_SESSION["login"]))
	{
		$host = "localhost";
		$username = "root";
		$password  = "";
		$namadb = "pweb";

		$mysqli = new mysqli($host,$username,$password,$namadb);
		if ($mysqli->connect_errno)
		 {
		 	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
		 }
		 
		echo "<BR>";
		echo "";

		$mobilbanding = array();

		$sql = "SELECT mobil.*, merk.nama as nama
		FROM mobil
		INNER JOIN merk ON mobil.idmerk = merk.idmerk where idmobil = ?";
		$stmt = $mysqli->prepare($sql);

		for($i = 0; $i <= ($total-1) ; $i++)
		{
			$idmobil = $name[$i];
			$stmt->bind_param('d',$idmobil);
			$stmt->execute();
			$res = $stmt->get_result();
			while($row = $res->fetch_assoc()) {
				$mobilbanding[] = $row;
			}
		}

		echo "
		<table border = '1'>	
			<tr> 
				<th>Gambar</th>
				<th>Merk</th> 
				<th>Tipe</th> 
				<th>Panjang</th> 
				<th>Lebar</th> 
				<th>Tinggi</th> 
				<th>Jarak sumbu roda</th> 
				<th>Radius Putar</th> 
				<th>Harga min</th> 
				<th>Harga max</th> 
				<th>Kapasitas mesin</th>
				<th>Kapasitas tangki</th>
				<th>Ukuran velg</th>
				<th>Ukuran roda</th>
			</tr>
		";

	    foreach ($mobilbanding as $row) 
	    { 
	        echo '<tr>';
	        echo '<td><img width="200" height="150" src="gambar/'.$row['idmobil'].'.jpg"></td>';
	        echo '<td>' . $row['nama'] . '</td>';
	        echo '<td>' . $row['tipe'] . '</td>';
	        echo '<td>' . $row['panjang'] . '</td>';
	        echo '<td>' . $row['lebar'] . '</td>';
	        echo '<td>' . $row['tinggi'] . '</td>';
	        echo '<td>' . $row['jarak_sumbu_roda'] . '</td>';
	        echo '<td>' . $row['radius_putar'] . '</td>';
	        echo '<td>' . $row['harga_min'] . '</td>';
	        echo '<td>' . $row['harga_max'] . '</td>';
	        echo '<td>' . $row['kapasitas_mesin'] . '</td>';
	        echo '<td>' . $row['kapasitas_tangki'] . '</td>';
	        echo '<td>' . $row['ukuran_velg'] . '</td>';
	        echo '<td>' . $row['ukuran_roda'] . '</td>';
	        echo '</tr>';
    	}

    	echo"</table>";
		/*echo "
		<table border = '1'>	
			<tr> 
				<th>Gambar</th>
				<th>Merk</th> 
				<th>Tipe</th> 
				<th>Panjang</th> 
				<th>Lebar</th> 
				<th>Tinggi</th> 
				<th>Jarak sumbu roda</th> 
				<th>Radius Putar</th> 
				<th>Harga min</th> 
				<th>Harga max</th> 
				<th>Kapasitas mesin</th>
				<th>Kapasitas tangki</th>
				<th>Ukuran velg</th>
				<th>Ukuran roda</th>
			</tr>
		";

		

		/* close connection 
		echo"</table> ";*/
		$mysqli->close();

		//print_r($mobilbanding);
		echo "<BR><BR>";
		echo "
		<a href='listMobilBandingkan.php'>Kembali</a>";

		echo "<BR><BR>";
	}

	else
	{
		echo "Akses Ditolak, Silahkan login dulu <BR>";
		echo "<a href='project.php'> Klik disini</a>";
	}
?>