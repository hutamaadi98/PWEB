<html>
	<head>
		<title>PWEB Week 1</title>
	</head>
	<body>
		Hello! <br>
		<?php 
			echo "<h1> This hello generated from PHP</h1>"; 
		?>
		<?php
			$a = 10;
			$A = "yoho";
			echo "<h1>$a <br>";
			echo "$A </h1>";
		?>
		<?php
			$mt = "Justice League";
			$yt = "The Avengers";
			$ml = "Batman";
			$yl = "Ironman";

			echo "<br>";
			echo "<u>$mt</u> adalah kelompok pahlawan super pimpinan \"<b>$ml</b>\" ";
			echo "<br>";
		?>
		<!-- Exercise 1 -->
		<?php
			$dadu = mt_rand(1,6);
			echo "<img src='$dadu.jpg' />";
		?>
		<!-- Exercise 2 -->
		<?php
			
		?>
	</body>
</html>