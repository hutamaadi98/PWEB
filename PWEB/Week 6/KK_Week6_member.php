<?php
	session_start();

	if (isset($_SESSION["login"]))
	{
		echo "Welcome member ".$_SESSION["login"];
		echo "<BR>";
		echo "<a href='KK_Week6_logout.php'> LogOut</a>"; 
	}
	else
	{
		echo "Akses Ditolak, Silahkan login dulu";
		echo "<a href='KK_Week6_login.php'> Klik disini</a>";
	}
?>