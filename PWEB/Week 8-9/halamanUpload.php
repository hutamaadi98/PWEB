<?php
	if (!isset($_GET['id'])) header("Location: week8.php");
	$hero_id = $_GET['id'];
	if (!is_numeric($hero_id)) header("Location: week8.php");

	if (isset($_POST['submit']))
	{
		if ($_FILES['foto']['type'] == "image/jpeg")
		{
			$dest = "gambar_hero/".$hero_id.".jpg";
			move_uploaded_file($_FILES['foto']['tmp_name'], $dest);

			$src = imagecreatefromjpeg($dest);
			$dst = imagecreatetruecolor(50, 50);
			imagecopyresampled($dst, $src, 0, 0, 0, 0, 50, 50, imagesx($src), imagesy($src));
			imagejpeg($dst, $dest);
		}
	}
?>

<form method="post" enctype="multipart/form-data" action="">
	<input type="file" name="foto">
	<input type="submit" name="submit" value="Upload">
</form>