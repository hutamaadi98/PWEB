<!DOCTYPE html>
<html>
<head>
	<title>Quiz A</title>
</head>
<body>
<?php
$ceweks = $_POST['cewek'];
arsort($ceweks); // diurutkan descending
$namas = array();

foreach($ceweks as $nama => $persen) {
	$namas[] = $nama;
}
echo "Ternyata kamu lebih mencintai ".$namas[0]." daripada ".$namas[1]." dan ".$namas[2];
?>
</body>
</html>