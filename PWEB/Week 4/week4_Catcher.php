<?php
print_r($_GET);
echo "<BR>";
print_r($_POST);
echo"<BR>";

echo $_GET["user"];

header("location:Viewer.php?user=".$_GET["user"]."&pass=".$_GET["pass"]);

?>