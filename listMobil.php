<?php
	session_start();

	if (isset($_SESSION["login"]))
	{
		echo "<html>
 				<form>
					<p>Input Keyword: <input type = 'text' name = 'katakunci' value = ''>
					<input type = 'submit' name ='btnsubmit' value = 'Cari'> <BR></p>
 				</form>";
		$host = "localhost";
		$username = "root";
		$password  = "";
		$namadb = "pweb";

		$mysqli = new mysqli($host,$username,$password,$namadb);
		if ($mysqli->connect_errno)
		 {
		 	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
		 }

		 $katakunci = "";
		 if(isset($_GET['katakunci']))
		 {
		 	$katakunci = $_GET['katakunci'];
		 	echo "<p>Pencarian untuk '".$katakunci."' :</p>";
		 }
		 

		 $jumlah_per_halaman = 5;
		 $start_data = 0;
		 if(isset($_GET['start']))$start_data = $_GET['start'];

		$sql = "SELECT mobil.*
		FROM mobil
		INNER JOIN merk ON mobil.idmerk = merk.idmerk where nama Like ?";
		$stmt = $mysqli->prepare($sql);
		$katakunci2 = "%".$katakunci."%";
		$stmt->bind_param('s',$katakunci2);
		$stmt->execute();
		$res = $stmt->get_result();

		$jumlah_data = $res->num_rows;
		$jumlah_halaman = ceil($jumlah_data/$jumlah_per_halaman);

		$sql = "SELECT mobil.*, merk.nama as nama
		FROM mobil
		INNER JOIN merk ON mobil.idmerk = merk.idmerk where nama Like ? Limit?,?";
		$stmt = $mysqli->prepare($sql);
		$katakunci2 = "%".$katakunci."%";
		$stmt->bind_param('sdd',$katakunci2,$start_data,$jumlah_per_halaman);
		$stmt->execute();
		$res = $stmt->get_result();

		echo "<table border = '1'>	
			<tr> 
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
				<td> <a href='editMobil.php?id=".$row['hero_id']."'> edit </a> 
			 <a href='halamanUpload.php?id=".$row['hero_id']."'> upload </a>
		     <a href='Week8_halamanDelete.php?id=".$row['hero_id']."'> delete </a> </td>
				</tr>";
			}

		/* close connection */
		echo"</table>";
		$mysqli->close();

		for($page = 1; $page<=$jumlah_halaman; $page++)
		{
			$st = ($page-1)* $jumlah_per_halaman;
			echo"<a href = 'listMobil.php?start=".$st."&katakunci=".$katakunci."'>".$page."</a> &nbsp; ";
		}

		echo "<a href='adminLogout.php'> LogOut</a>"; 
	}
	else
	{
		echo "Akses Ditolak, Silahkan login dulu <BR>";
		echo "<a href='project.php'> Klik disini</a>";
	}


?>
