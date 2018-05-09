<?php
	session_start();

	if (($_POST["user"]=="pweb") && ($_POST["pass"]=="pweb"))
	{
		echo "Login sukses <BR>";

		$_SESSION["login"] = $_POST["user"];
		header("Location: KK_Week6_member.php");
	}
	else
	{
		echo "Login gagal <BR>";
	}
?>