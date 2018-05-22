<?php
	$mysqli = new mysqli('localhost','root','','pweb');
	if ($mysqli->connect_errno)
	{
		echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	}
	$sql = "SELECT idmobil from mobil order by idmobil Desc limit 1";
	$stmt = $mysqli->query($sql);
?>

<form method = "POST" enctype="multipart/form-data" id="formupload">
	<h1> Input Mobil</h1>
	<p> Tipe : <input type="text" name="tipe" id="tipe"></p>
	<p>Merk: 
		<select name="merk" id="merk">
			<option value="">Pilih Merk</option></select></p>
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
	<p>Foto : <input type="file" name="foto" size="50" accept=".jpg" id="foto"></p><BR>
	<p><input type="button" value="Simpan" id="submit"></p>
	<?php
		while($row = $stmt -> fetch_assoc())
		{
			echo "<input type='hidden' name='idmobil' id='idmobil' value='". ($row['idmobil']+1) ."'>";	  
		}
	?> -->
</form>

	<div id="gambar"></div>
<script src="jquery/jquery-2.1.4.min.js"></script>
<script>
	$("#merk").focusin(function() {
		$.post("comboBox.php" , {
			type: $("#merk").val()
		})
		.done(function(data){
			//alert(data);
			$("#merk").html(data);
		})
	});
</script>
<script>
	$("#submit").click(function(){
		var formData = new FormData($("#formupload")[0]);
		$.ajax({
			url:'tambahMobil_ajax.php',
			type:'POST',
			data: formData,
       		async: false,
       		cache: false,
       		contentType: false,
       		enctype: 'multipart/form-data',
       		processData: false,
       		success: function (response) {
       			if (response == 'Failed')
         			alert(response);
         		else
         		{
         			alert(response);
         			$("#gambar").html(response);
       			}
		}
	})
	})
</script>