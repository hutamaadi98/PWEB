<?php

	$mysqli = new mysqli('localhost','root','','pweb');
	if ($mysqli->connect_errno)
	{
		echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	}

	$sql = "SELECT * FROM merk";
	$stmt = $mysqli->query($sql);

?>

<form>
	<h1> Input Mobil</h1>
	<p> Tipe : <input type="text" name="tipe" id="tipe"></p>
	<p>Merk: 
		<select name="type" id="merk">
			<?php
				while($row = $stmt -> fetch_assoc())
				{
				    echo "<option value='".$row['idmerk']."'>".$row['nama']."</option>";
				}
			?>
		</select>
	<p>Panjang : <input type="text" name="panjang" id="panjang"></p>
	<p>Lebar : <input type="text" name="lebar" id="lebar"></p>
	<p>Tinggi : <input type="text" name="tinggi" id="tinggi"></p>
	<p>Jarak Sumbu Roda : <input type="text" name="jaraksumburoda" id="jaraksumburoda"></p>
	<p>Radius Putar : <input type="text" name="radiusputar" id="radiusputar"></p>
	<p>Harga Minimal : <input type="text" name="hargaminimal" id="hargaminimal"></p>
	<p>Harga Maximal : <input type="text" name="hargamaximal" id="hargamaximal"></p>
	<p>Kapasitas Mesin : <input type="text" name="kapasitasmesin" id="kapasitasmesin"></p>
	<p>Kapasitas Tangki : <input type="text" name="kapasitastangki" id="kapasitastangki"></p>
	<p>Ukuran Velg : <input type="text" name="ukuranvelg" id="ukuranvelg"></p>
	<p>Ukuran Roda : <input type="text" name="ukuranroda" id="ukuranroda"></p>
	<p><input type="button" value="Simpan" id="submit"></p>
</form>

<script src="jquery/jquery-2.1.4.min.js"></script>
<script>
	$("#submit").click(function() {
		$.post("tambahMobil_ajax.php",
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
</script>
