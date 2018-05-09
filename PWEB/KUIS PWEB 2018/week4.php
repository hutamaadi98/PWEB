<form method = "get" action="week4.php">
	Username <input type="text" name="user" value = ""><BR>
	Password <input type="password" name="pass" value = ""><BR>
	Pilihan: 
	<input type="radio" name="text" value="Y" checked> Yes
	<input type="radio" name="text" value="N"> No<BR>
	 <input type="submit" name="submit" value = "LOGIN"><BR>
</form>
<BR>

<form method = "post" action="week4_Catcher.php">
Username <input type="text" name="user" value = ""><BR>
Password <input type="password" name="pass" value = ""><BR>
<input type="submit" name="submit" value = "LOGIN"><BR>
</form>
<BR>

<?php
if(isset($_GET["user"]) == true)
echo $_GET["user"];
echo $_GET["pass"];
echo "<BR>";
?>