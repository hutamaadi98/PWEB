<?php
	session_start();

	setcookie("testCookie","Data dari Cookies", time()+60);
	echo $_COOKIE["testCookie"]."<br>";

	$_SESSION["testSession"] = "Data dari Session";
	echo $_SESSION["testSession"];
?>