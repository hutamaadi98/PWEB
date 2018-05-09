<?php
	if(isset($_GET["id"]) && isset($_GET["user"]))
	{
		$jalan = $_GET["id"];
		$lampu = $_GET["user"];
		echo "$jalan - $lampu";
	}
?>