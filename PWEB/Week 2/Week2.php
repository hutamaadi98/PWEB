<?php
	for($i=1; $i<=10;$i++)
	{
		$angka[] = mt_rand(1,100);
	}
	print_r($angka);
	sort($angka);
	echo '<br>';
	if ($angka[0] % 2 == 0)
		echo "<h1><em style='color:green;'> $angka[0] </em></h1>";
	else
		echo "<h1><strong style='color:red;'> $angka[0] </strong></h1>";
?>

<BR><BR>

<?php
	$number = array(1,2,"c"=>3,4,5);

	foreach($number as $k => $temp)
	{
		$temp = $temp*2;
		$number[$k]=$temp;
		echo $temp." ";
	}

	print_r($number);
?>

<br><br>
<?php
	for($i=1;$i<=6;$i++)
	{
?>
	<img src='<?php echo $i?>.jpg'>

<?php
		echo "<img src='$i.jpg'>";
	}
?>

<BR><BR>
<!-- Atau ( atas dan bawah sama ) -->
<?php
	for($i=1;$i<=6;$i++)
	{
		echo "<img src='$i.jpg'>";
		echo "<img src='$i.jpg'>";
	}
?>

<BR><BR>

<?php
	echo strtotime("-20 days")."<BR>";
	echo strtotime("+10 days 1 minute")."<BR>";
	echo strtotime("last monday")."<BR>";

	echo date("d-m-Y")."<BR>";

	echo date("D, d-F-Y", strtotime("Next Month")). "<br>";

	echo mktime(7,40,0,2,23,2018)."<BR>";
?>