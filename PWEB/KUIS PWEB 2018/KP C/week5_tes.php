<FORM method="post" action="week5_hasil.php">

<?php
	echo $_POST["tanya"]."<BR>";
	echo "<input type='radio' name='opsi' value='A'>".$_POST["jawabA"]."<BR>";
	echo "<input type='radio' name='opsi' value='B'>".$_POST["jawabB"]."<BR>";
	echo "<input type='radio' name='opsi' value='C'>".$_POST["jawabC"]."<BR>";
	echo "<input type='hidden' name='benar' value='".$_POST["jawabBenar"]."'>";
?>
	<BR>
	<INPUT type="submit" name="submit" value="Submit">
</FORM>