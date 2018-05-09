<?php
	if ( isset($_POST['submit']))
	{
		echo $_POST['nama']."<BR>";
		echo $_FILES['foto']['name']."<BR>";
		echo $_FILES['foto']['tmp_name']."<BR>";
		echo $_FILES['foto']['type']."<BR>";
		echo $_FILES['foto']['size']."<BR>";
		echo $_FILES['foto']['error']."<BR>";

		if ($_FILES['foto']['type'] == "image/jpeg")
		{
			$dest = "upload_file/".$_POST['nama'].substr($_FILES['foto']['name'],-4);
			move_uploaded_file($_FILES['foto']['tmp_name'], $dest);
		}
		else
			echo "File upload JPG only";
	}
?>
<BR><BR>
<form method="post" enctype="multipart/form-data" action="">
	Nama: <input type="text" name="nama"><BR>
	File: <input type="file" name="foto" accept=".jpg"><BR>
	<input type="submit" name="submit" value="Upload">
</form>

<!-- <html>
	<head>
		<title>File Uploading Form</title>
	</head>
<body>
	<h3>File Upload:</h3>
		Select a file to upload: <br />
<form action="file_uploader.php" method="post" enctype="multipart/form-data">
		<input type="file" name="photo" size="50" /><br />
		<input type="submit" value="Upload File" />
</form>
	</body>
</html> -->
