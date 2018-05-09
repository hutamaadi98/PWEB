<?php
echo strtotime("-20 days")."<BR>";
echo strtotime("next year")."<BR>";
echo strtotime("last monday")."<BR>";

echo date("d-M-y")."<BR>";
echo date("D, d-F-Y",strtotime("+ 10 years"))."<BR>";
echo mktime(7,40,0,2,23,2018)."<BR>";
?>


<?php

for($i =0; $i<10; $i++) {
	echo $i."<BR>";
}

?>

<?php
	for($i= 1 ;$i <=6; $i++)
	{
		echo "<BR><img src='dadu/$i.jpg'>";
	}	
?>

<!--contoh untuk mencampur php dan html -->
<?php
	for($i= 1 ;$i <=6; $i++)
	{
?>
	
<!--<img src ='dadu/<?php echo $i?>.jpg'> -->
<BR><img src ='dadu/<?= $i?>.jpg'> 

<?php
	}	
?>


<BR>
	<BR>
<?php
$number = array(1,2,"c" =>3,4,5 );

foreach ($number as $temp) 
{

	echo $temp;
		# code...
}

foreach ($number as $k => $temp) 
{
	
	$temp = $temp * 2;
	$number[$k] = $temp;
	echo $temp;
		# code...
}

print_r($number);
?>