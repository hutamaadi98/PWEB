<?php
	session_start();

	echo $_COOKIE["testCookie"]."<br>";
	echo $_SESSION["testSession"];
?>