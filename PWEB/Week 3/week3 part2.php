<?php
class SimpleClass
{
	public static $var = "A default value";

	public function __construct()
	{
		$this->var = "constructor";
	}
	public function displayValue()
	{
		echo $this->var;
	}
	public function __destruct()
	{
		echo "destructor";
	}
}

echo SimpleClass::$var;
SimpleClass::$var = "A";
$obj1 = new SimpleClass;
$obj1->displayValue();
echo $obj1->var;
//unset ($obj1);
?>

<BR>