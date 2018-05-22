<html>
<head>
	<h1> Bandingkan Mobil</h1>
</head>
</html>
<?php
	session_start();

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

		$sql = "SELECT mobil.*, merk.nama as nama
		FROM mobil
		INNER JOIN merk ON mobil.idmerk = merk.idmerk";
		$stmt = $mysqli->prepare($sql);
		$stmt->execute();
		$res = $stmt->get_result();

		echo "
		<form action='tesBandingkan.php' method='post'>
		<table border = '1'>	
			<tr> 
				<th>Check</th>
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

		while($row = $res->fetch_assoc()) {
				echo "<tr>  
				<td><input type='checkbox' name='checkbox[]' value='".$row['idmobil']."' id='cekidmobil'></td>
				<td><img width='200' height='150' src='gambar/".$row['idmobil'].".jpg'></td> 
				<td>".$row['nama']."</td>   
				<td>". $row['tipe']."</td>
				<td>".$row['panjang']."</td>   
				<td>". $row['lebar']."</td> 
				<td>".$row['tinggi']."</td>   
				<td>". $row['jarak_sumbu_roda']."</td> 
				<td>".$row['radius_putar']."</td>   
				<td>". $row['harga_min']."</td>   
				<td>". $row['harga_max']."</td>
				<td>". $row['kapasitas_mesin']."</td>
				<td>". $row['kapasitas_tangki']."</td>
				<td>". $row['ukuran_velg']."</td>
				<td>". $row['ukuran_roda']."</td>
				</tr>";
			}

		/* close connection */
		echo"</table> ";
		$mysqli->close();

		echo "<BR><BR>";
		echo "
		<input type='submit' name ='btnsubmit' value = 'Bandingkan' id='bandingkan'> </form>";

		echo "<BR><BR>";
	}

	else
	{
		echo "Akses Ditolak, Silahkan login dulu <BR>";
		echo "<a href='project.php'> Klik disini</a>";
	}
?>

<!-- <script src="jquery/jquery-2.1.4.min.js"></script>

<script>
	$("#bandingkan").click(function() {
		$.post("bandingkanMobil.php",
		{
			tipe: $("#tipe").val(),
			merk: $("#merk").val(),
			panjang: $("#panjang").val(),
			lebar: $("#lebar").val(),
			tinggi: $("#tinggi").val(),
			jaraksumburoda: $("#jaraksumburoda").val(),
			radiusputar: $("#radiusputar").val(),
			hargaminimal: $("#hargaminimal").val(),
			hargamaximal: $("#hargamaximal").val(),
			kapasitasmesin: $("#kapasitasmesin").val(),
			kapasitastangki: $("#kapasitastangki").val(),
			ukuranvelg: $("#ukuranvelg").val(),
			ukuranroda: $("#ukuranroda").val()
		})

		.done(function(data) {
			alert(data);
		})
	})
</script> -->