<?php
	$mysqli = new mysqli("localhost","root","","pweb");

	$tipe = $_POST['tipe'];
	$merk = $_POST['merk'];
	$panjang = $_POST['panjang'];
	$lebar = $_POST['lebar'];
	$tinggi = $_POST['tinggi'];
	$jaraksumburoda = $_POST['jaraksumburoda'];
	$radiusputar = $_POST['radiusputar'];
	$hargaminimal = $_POST['hargaminimal'];
	$hargamaximal = $_POST['hargamaximal'];
	$kapasitasmesin = $_POST['kapasitasmesin'];
	$kapasitastangki = $_POST['kapasitastangki'];
	$ukuranvelg = $_POST['ukuranvelg'];
	$ukuranroda = $_POST['ukuranroda'];
	$idmobil= $_POST['idmobil'];

	echo $idmobil;

	if ($_FILES['foto']['type'] == "image/jpeg")
        {
            $dest = "gambar/".$idmobil.substr($_FILES["foto"]["name"],-4);
            $hasil = move_uploaded_file($_FILES["foto"]["tmp_name"], $dest);
            echo "<img src=".$dest."></img>";
        }
        else
            {
            	echo "Failed";
    }
	$sql = "insert into mobil(idmerk,tipe,panjang,lebar,tinggi,jarak_sumbu_roda,radius_putar,harga_min,harga_max,kapasitas_mesin,kapasitas_tangki,ukuran_velg,ukuran_roda) values('$merk','$tipe','$panjang','$lebar','$tinggi','$jaraksumburoda','$radiusputar','$hargaminimal','$hargamaximal','$kapasitasmesin','$kapasitastangki','$ukuranvelg','$ukuranroda')";
	$hasil = $mysqli->query($sql);
	
	if($hasil == true)
	{
		echo "Berhasil";
	}
	else
	{
		echo "Gagal";
	}

	$mysqli->close();

?>