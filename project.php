<?php

	$host = "localhost";
	$username = "root";
	$password = "";
	$namadb = "pweb";

	$mysqli = mysqli_connect($host, $username, $password, $namadb);

	if (mysqli_connect_errno($mysqli))
	{
		echo "Gagal Connect!", mysqli_connect_error();
	}
	else
	{
		echo "Connect Sukses! <BR> <BR>";
	}

	if (isset($_POST["submit"]))
		{
			$sql = "SELECT * from admin";
			$stmt = $mysqli->prepare($sql);
			// $katakunci = "%".$katakunci."%";
			// $like = "%".$katakunci."%";
			// $stmt->bind_param('s', $like);
			$stmt->execute();
			$res = $stmt->get_result();  // tambahkan ini

			while ($row = $res->fetch_assoc()){

				$pass = $row["salt"] . md5($_POST["pass"]) . $row["salt"];
				$finalpass = md5($pass);

				if (($_POST["user"] == $row["userid"]) && ($finalpass == $row["password"]))
					echo "Login Sukses. <BR>";
				else
					echo "Login Gagal. <BR>";

				// echo "<tr> 
				// <td><img width='50' height='50' src='gambar_hero/".$row['hero_id'].".jpg'></td> 
				// <td>" . $row['name'] . "</td> 
				// <td>" . $row['type'] . "</td> 
				// <td>" . $row['strength'] . "</td> 
				// <td>" . $row['agility'] . "</td> 
				// <td>" . $row['intelligence'] . "</td> 
				// <td>" . $row['damage'] . "</td> 
				// <td>" . $row['armor'] . "</td> 
				// <td>" . $row['is_ranged'] . "</td> 
				// <td> <a href='Week8_halamanEdit.php?id=".$row['hero_id']."'> edit </a> 
				// 	 <a href='halamanUpload.php?id=".$row['hero_id']."'> upload </a>
				//      <a href='Week8_halamanDelete.php?id=".$row['hero_id']."'> delete </a> </td>
				// </tr>";
		}
	}
?>

<form method="post" action="project.php">
	Username: <input type="text" name="user" /><BR>
	Password: <input type="password" name="pass" /><BR>
	<input type="submit" name="submit" value="Login" />

</form>