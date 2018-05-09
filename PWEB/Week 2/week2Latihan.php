<?php
for($i = 1 ; $i<=10 ; $i++)
{
	$angka[]  = mt_rand(1,100);

}
print_r($angka)."<BR>";
sort($angka);
print_r($angka)."<BR>";
echo max($angka)."<BR>";

if(max($angka)%2 == 0)
echo "<em style = 'color:green'>". max($angka)."</em>";
else
echo "<strong style = 'color:red'>".max($angka)."</strong>"
?>