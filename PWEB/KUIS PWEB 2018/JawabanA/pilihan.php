<!DOCTYPE html>
<html>
<head>
	<title>Quiz A</title>
</head>
<body>
	<h2>Masukkan berapa besar nilai cintamu</h2>
<form method='post' action='hasil.php'>
	<?php
		$ceweks = $_POST['cewek'];
		foreach($ceweks as $cewek) {
			echo "<p>".$cewek." <input type='text' name='cewek[".$cewek."]'></p>";
		}
	?>
	<button type='submit' name='btnsubmit'>Submit</button>
</form>
</body>
</html>