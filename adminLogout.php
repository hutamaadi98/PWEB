<?php
	session_start();

    echo $_SESSION["login"]." berhasil logout <BR>";
   	unset($_SESSION["login"]);
	echo "<a href='project.php'> Kembali ke login</a>";
?>