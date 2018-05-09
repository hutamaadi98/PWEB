<!DOCTYPE html>

<html>
<head>
	<title>PWEB WEEK 1 </title>
</head>
<body>
	<Center>Hello
	<p>
		<?php echo "<h1>This page is generated from php</h1>"; ?> 
	</p>
	</center>

	<?php
	$a = 10;
	$b = 20;
	$sum = $a+$b;
	echo $a;
	echo $sum ?>
<br>
<?php
	$myteam = "Justice League";
	$yourteam = "The Avengers";
	$myleader = "Batman";
	$yourleader = "Ironman";
	echo "<u> $myteam</u> adalah kelompok pahlawan super pimpinan <b>  \"$myleader\" </b>" ;
	//ini komen
	/* ini komen juga */
 ?>
 <?php
 	echo "<br>";
 	$cek = 10;
 	if ($cek === true)
 		echo"Hore...";
 	else
 		echo "Gagal...";
 ?>

 <?php
 echo "<br>";
$mynumber = 10000.235;
echo number_format($mynumber, 2, ".", ",");
?>

<?php
echo "<br>";
echo "<br>";
$dadu = mt_rand(1,6);
$dadu1 = mt_rand(1,6);
$dadu2 = mt_rand(1,6);
$dadu3 = mt_rand(1,6);
echo"<img src='dadu/$dadu.jpg'/>";
echo"<img src='dadu/$dadu1.jpg'/>";
echo"<img src='dadu/$dadu2.jpg'/>";
echo"<img src='dadu/$dadu3.jpg'/>";

?>
</body>	
</html>