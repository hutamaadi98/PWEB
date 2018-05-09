<!DOCTYPE html>
<html>
<head>
	<title>Quiz A</title>
</head>
<body>
	<h2>Masukkan nama cewek yang kamu taksir</h2>
<form method="post" action="pilihan.php">
	<?php
		for($i=1;$i<=3;$i++) {
			echo "<p>Nama Cewek ".$i." <input type='text' name='cewek[]'></p>";
		}
	?>
	<button type='submit' name='btnsubmit'>Submit</button>
</form>
</body>
</html>