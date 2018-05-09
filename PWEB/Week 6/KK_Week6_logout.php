<?php
	
	session_start();
    // header("Location: KK_Week6_login.php");
    echo $_SESSION["login"]." berhasil logout";
   	unset($_SESSION["login"]);
	echo "<a href='KK_Week6_login.php'> Kembali ke login</a>";
?>

bool setcookie ($name, $value, $expire, $path, $domain, $secure, $httponly)

<?php
// set the cookies
setcookie(“user[email]”, "erdna@staff.ubaya.ac.id");
setcookie("user[name]", "Erdna");
setcookie(“user[gender]”, "female");
if (isset($_COOKIE[“user”])) 
{    foreach ($_COOKIE[“user”] as $name => $value) 
	{      echo "$name : $value <br />\n";  }}
?>

